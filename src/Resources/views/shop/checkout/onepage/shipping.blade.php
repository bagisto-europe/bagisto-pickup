{!! view_render_event('bagisto.shop.checkout.onepage.shipping.before') !!}

<v-shipping-methods :methods="shippingMethods" @processing="stepForward" @processed="stepProcessed">
    <!-- Shipping Method Shimmer Effect -->
    <x-shop::shimmer.checkout.onepage.shipping-method />
</v-shipping-methods>

{!! view_render_event('bagisto.shop.checkout.onepage.shipping.after') !!}

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-shipping-methods-template"
    >
        <div class="mb-7 max-md:mb-0">
            <template v-if="!methods">
                <!-- Shipping Method Shimmer Effect -->
                <x-shop::shimmer.checkout.onepage.shipping-method />
            </template>

            <template v-else>
                <!-- Accordion Blade Component -->
                <x-shop::accordion class="overflow-hidden !border-b-0 max-md:rounded-lg max-md:!border-none max-md:!bg-gray-100">
                    <!-- Accordion Blade Component Header -->
                    <x-slot:header class="px-0 py-4 max-md:p-3 max-md:text-sm max-md:font-medium max-sm:p-2">
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl font-medium max-md:text-base">
                                @lang('shop::app.checkout.onepage.shipping.shipping-method')
                            </h2>
                        </div>
                    </x-slot>

                    <!-- Accordion Blade Component Content -->
                    <x-slot:content class="mt-8 !p-0 max-md:mt-0 max-md:rounded-t-none max-md:border max-md:border-t-0 max-md:!p-4">
                        <div class="flex flex-wrap gap-8 max-md:gap-4 max-sm:gap-2.5">
                            <template v-for="method in methods">
                                {!! view_render_event('bagisto.shop.checkout.onepage.shipping.before') !!}

                                <div
                                    class="relative max-w-[218px] select-none max-md:max-w-full max-md:flex-auto"
                                    v-for="rate in method.rates"
                                >
                                    <input
                                        type="radio"
                                        name="shipping_method"
                                        :id="rate.method"
                                        :value="rate.method"
                                        class="peer hidden"
                                        @change="store(rate.method)"
                                    >

                                    <label
                                        class="icon-radio-unselect peer-checked:icon-radio-select absolute top-5 cursor-pointer text-2xl text-navyBlue ltr:right-5 rtl:left-5"
                                        :for="rate.method"
                                    >
                                    </label>

                                    <label
                                        class="block cursor-pointer rounded-xl border border-zinc-200 p-5 max-sm:flex max-sm:gap-4 max-sm:rounded-lg max-sm:px-4 max-sm:py-2.5"
                                        :for="rate.method"
                                    >
                                        <span class="icon-flate-rate text-6xl text-navyBlue max-sm:text-5xl"></span>

                                        <div>
                                            <p class="mt-1.5 text-2xl font-semibold max-md:text-base">
                                                @{{ rate.base_formatted_price }}
                                            </p>

                                            <p class="mt-2.5 text-xs font-medium max-md:mt-1 max-sm:mt-0 max-sm:font-normal max-sm:text-zinc-500">
                                                <span class="font-medium">@{{ rate.method_title }}</span> - @{{ rate.method_description }}
                                            </p>
                                        </div>
                                    </label>
                                </div>

                                {!! view_render_event('bagisto.shop.checkout.onepage.shipping.after') !!}
                            </template>
                        </div>

                        @include('pickup::shop.checkout.onepage.pickup-options')
                    </x-slot>
                </x-shop::accordion>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-shipping-methods', {
            template: '#v-shipping-methods-template',

            data() {
                return {
                    pickupLocation: null,
                    pickupDate: null,
                    availableStores: [],
                    availableTimeslots: [],
                    selectedTimeslot: null,
                    showStorePickupOption: false,
                    noTimeslotsAvailable: false,
                };
            },

            props: {
                methods: {
                    type: Array,
                    required: true,
                    default: () => [],
                },
            },

            watch: {
                pickupDate(newDate) {
                    if (!newDate) return;
                    console.log("Pickup date updated to", newDate);

                    this.getAvailableTimeslots();
                }
            },


            methods: {
                getAvailableStores() {
                    this.$axios.get("{{ route('checkout.pickup.locations') }}")
                        .then(response => {
                            this.availableStores = response.data.locations;
                            if (this.availableStores.length > 0) {
                                this.showStorePickupOption = true;

                                if (this.availableStores.length === 1) {
                                    this.pickupLocation = this.availableStores[0].id;
                                    this.storePickup(this.availableStores[0].id);
                                }

                            }
                        })
                        .catch(error => {
                            console.error("Error fetching pickup locations:", error);
                        });
                },

                getAvailableTimeslots() {
                    if (!this.pickupDate) return;
                    this.noTimeslotsAvailable = false;
                    this.isTimeslotLoading = true;

                    console.log("Fetching available timeslots for date:", this.pickupDate);
                    console.log("Fetching available timeslots for location:", this.pickupLocation);

                    this.$axios.get("{{ route('checkout.pickup.timeslots') }}", {
                        params: {
                            pickup_location: this.pickupLocation,

                            pickup_date: this.pickupDate,
                        }
                    })
                    .then(response => {
                        this.availableTimeslots = response.data;


                        if (this.availableTimeslots.length === 0) {
                            this.noTimeslotsAvailable = true;
                        } else {
                            this.noTimeslotsAvailable = false;
                        }

                        console.log("Available Timeslots:", this.availableTimeslots);

                    })
                    .catch(error => {
                        console.error("Error fetching available timeslots:", error);
                    });
                },

                store(selectedMethod) {
                    this.$emit('processing', 'payment');

                    let data = {
                        shipping_method: selectedMethod,
                    };

                    if (selectedMethod === 'pickup') {
                        this.getAvailableStores();

                        data.pickup_location = this.pickupLocation;
                        data.pickup_timeslot = this.selectedTimeslot;
                    } else {
                        this.showStorePickupOption = false;
                    }

                    this.$axios.post("{{ route('shop.checkout.onepage.shipping_methods.store') }}", data)
                        .then(response => {
                            if (response.data.redirect_url) {
                                window.location.href = response.data.redirect_url;
                            } else {
                                this.$emit('processed', response.data.payment_methods);
                            }
                        })
                        .catch(error => {
                            this.$emit('processing', 'shipping');
                            if (error.response.data.redirect_url) {
                                window.location.href = error.response.data.redirect_url;
                            }
                        });
                },

                storePickup(selectedLocation) {
                    this.pickupDate = null;
                    this.availableTimeslots = [];
                    this.selectedTimeslot = null;
                    this.noTimeslotsAvailable = false;
                },

                formatPickupTime(time) {
                     return time.slice(0, 5);
                },

                storePickupTimeSlot(selectedTimeslot) {
                    if (!this.pickupLocation || !this.pickupDate || !selectedTimeslot) return;
                    this.selectedTimeslot = selectedTimeslot;
                    console.log("Selected Timeslot:", this.selectedTimeslot);

                    const data = {
                        pickup_location: this.pickupLocation,
                        pickup_date: this.pickupDate,
                        pickup_time: this.selectedTimeslot,
                    };

                    this.$axios.post("{{ route('checkout.pickup.store') }}", data)
                        .then(response => {
                            console.log("Pickup details stored successfully:", response.data);
                        })
                        .catch(error => {
                            console.error("Error storing pickup details:", error);
                        });
                },

            },
        });
    </script>
@endPushOnce
