<!-- Store Pickup Option -->
<div v-if="showStorePickupOption" class="bg-white border border-zinc-200 rounded-xl p-6 shadow-sm mt-6">


    <h3 class="text-lg font-semibold mb-2">@lang('pickup::app.shop.checkout.onepage.shipping.pickup.title')</h3>
    <p class="text-sm text-gray-600 mb-2">@lang('pickup::app.shop.checkout.onepage.shipping.pickup.pickup_location')</p>


    <!-- List of Store Pickup Locations -->
    <ul class="space-y-3">
        <li
            v-for="location in availableStores"
            :key="location.id"
            class="flex items-center mb-4 gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer transition duration-200 hover:bg-gray-100"
            :class="{
                'bg-gray-100': pickupLocation === location.id
            }"
            @click="storePickup(location.id)"
        >
            <input
                type="radio"
                name="pickup_location"
                :id="'pickup-' + location.id"
                :value="location.id"
                class=""
                v-model="pickupLocation"
            />

            <label :for="'pickup-' + location.id" class="w-full flex justify-between items-center cursor-pointer">
                <span class="text-gray-700 text-sm font-medium">
                    <p class="font-bold">@{{ location.name }}</p>
                    <p>@{{ location.street }},  @{{ location.postcode }} @{{ location.city }}, @{{ location.state }} @{{ location.country }}</p>
                </span>
            </label>
        </li>
    </ul>

    <x-shop::form.control-group class="mt-4">
        <p class="text-sm text-gray-600 mb-2">
            @lang('pickup::app.shop.checkout.onepage.shipping.pickup.pickup_date')
        </p>

        <x-shop::form.control-group.control
                type="date"
                name="pickup_date"
                v-model="pickupDate"
                data-min-date="today"
                placeholder="{{ __('pickup::app.shop.checkout.onepage.shipping.pickup.pickup_date') }}"
                rules="required"
            />
        <x-shop::form.control-group.error control-name="pickup_date" />
    </x-shop::form.control-group>

    <div v-if="availableTimeslots.length > 0" class="mt-4">
        <p class="text-sm text-gray-600 mb-2">@lang('pickup::app.shop.checkout.onepage.shipping.pickup.pickup_time')</p>
        <div class="space-y-2 mt-2">
            <div
                v-for="timeslot in availableTimeslots"
                :key="timeslot.id"
                class="flex items-center mb-4 gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer transition duration-200 hover:bg-gray-100"
                :class="{ 'bg-gray-100': selectedTimeslot === timeslot.id }"
                @change="storePickupTimeSlot(timeslot.id)"
            >
                <input
                    type="radio"
                    name="pickup_timeslot"
                    :id="'timeslot-' + timeslot.id"
                    :value="timeslot.id"
                    v-model="selectedTimeslot"
                />

                <label :for="'timeslot-' + timeslot.id" class="w-full flex cursor-pointer justify-between items-center">
                    <span class="text-gray-700 text-sm font-medium">
                        <p class="font-bold">@{{ formatPickupTime(timeslot.start_time) }} - @{{ formatPickupTime(timeslot.end_time) }}</p>
                    </span>
                </label>
            </div>
        </div>
    </div>

    <div v-if="noTimeslotsAvailable" class="mt-4 text-wrap text-red-600">
        <p class="text-sm">@lang('pickup::app.shop.checkout.onepage.shipping.pickup.no_time_slots')</p>
    </div>
</div>
