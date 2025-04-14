<x-admin::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        @lang('pickup::app.admin.settings.pickup.timeslots.index.title')
    </x-slot:title>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6 max-sm:flex-wrap max-sm:gap-y-4">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
            @lang('pickup::app.admin.settings.pickup.timeslots.index.title')
        </h1>

        <!-- Grouped Action Buttons -->
        <div class="flex gap-4">
            @include('pickup::admin.timeslots.index.create')
            <button class="primary-button" @click="$refs.createTimeslotsComponent.openModal()">
                @lang('pickup::app.admin.settings.pickup.timeslots.index.add-button')
            </button>
        </div>
    </div>

    <v-create-timeslot-form ref="createTimeslotsComponent"
        @timeslot-created="$refs.groupedTimeslotComponent.refreshData()"></v-create-timeslot-form>

    <v-grouped-timeslots ref="groupedTimeslotComponent"></v-grouped-timeslots>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-grouped-timeslots-template">
        <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
            <!-- Left Component -->
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                <!-- Empty State -->
                <div v-if="Object.keys(grouped).length === 0" class="pt-5 text-center py-16 text-gray-500 dark:text-gray-400">
                    <i class="icon icon-calendar text-5xl mb-4"></i>
                    <p class="text-lg font-semibold">@lang('pickup::app.admin.settings.pickup.timeslots.index.no-timeslots')</p>

                </div>              

                <!-- Timeslots per inventory -->
                <div 
                    v-for="(inventoryGroup, inventoryId) in grouped" 
                    :key="inventoryId" 
                    class="bg-white p-2 dark:bg-gray-800 hover:shadow-2xl transition-all duration-300"
                    v-else
                >
                    <h2 class="font-semibold mb-2 text-gray-800 dark:text-white">
                        @lang('pickup::app.admin.settings.pickup.timeslots.index.datagrid.inventory_source'): @{{ inventoryGroup.inventory_name }}
                    </h2>
                
                    <div v-for="(slots, day) in inventoryGroup.days" :key="day" class="mb-2">
                        <x-admin::accordion :is-active="true">
                            <x-slot:header >
                                <h3 class="font-semibold text-gray-700 dark:text-white">
                                    @{{ day }}
                                </h3>
                            </x-slot>
                            
                            <x-slot:content>
                                <div class="space-y-2 pl-4">
                                    <div 
                                        v-for="slot in slots" 
                                        :key="slot.id" 
                                        class="flex justify-between items-center bg-gray-100 dark:bg-gray-950 mb-2 px-4 py-3 border dark:border-gray-800 rounded shadow-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition duration-200"
                                    >
                                        <div>
                                            <div class="font-medium text-gray-800 dark:text-white">
                                                @{{ slot.start_time }} – @{{ slot.end_time }}
                                            </div>
                                            
                                            <div class="text-sm text-gray-500 dark:text-gray-300">
                                                @lang('pickup::app.admin.settings.pickup.timeslots.index.datagrid.pickup_quota'): @{{ slot.pickup_quota }}
                                            </div>
                                        </div>
                            
                                        <div class="space-x-2">
                                            <button class="text-blue-600" @click="edit(slot)">
                                                <i class="icon icon-edit"></i>
                                            </button>
                                            
                                            <button 
                                                class="text-red-600" 
                                                @click="remove(slot.id)" 
                                                title="@lang('pickup::app.admin.settings.pickup.timeslots.index.delete')" 
                                                aria-label="@lang('pickup::app.admin.settings.pickup.timeslots.index.delete')"
                                            >
                                                <i class="icon icon-delete"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </x-slot>
                        </x-admin::accordion>
                    </div>
                </div>
            </div>
    
            <!-- Right Component -->
            <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
                <h3 class="font-medium text-gray-800 dark:text-white mb-5 flex items-center">
                    <i class="icon icon-filter mr-2"></i>
                    @lang('pickup::app.admin.settings.pickup.timeslots.index.filter.title')
                </h3>

                <div class="flex justify-between">
                    <button class="text-sm text-blue-600" @click="clearFilters">@lang('pickup::app.admin.settings.pickup.timeslots.index.filter.clear')</button>
                </div>

                <!-- Inventory Source Filter -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">@lang('pickup::app.admin.settings.pickup.timeslots.index.filter.inventory_source')</label>
                    <div class="bg-white dark:bg-gray-900 p-3 rounded border dark:border-gray-700 max-h-[180px] overflow-y-auto">
                        <label class="flex items-center py-2 border-b dark:border-gray-700">
                            <input 
                                type="checkbox" 
                                value=""
                                v-model="selectedInventorySource" 
                                class="mr-2 w-4 h-4 accent-blue-600"
                            >
                            <span class="">All Inventories</span>
                        </label>
                        <label v-for="inventory in inventorySources" :key="inventory.id" class="flex items-center py-1 text-gray-600">
                            <input 
                                type="checkbox" 
                                :value="inventory.id" 
                                v-model="selectedInventorySource" 
                                class="mr-2 w-4 h-4 accent-blue-600"
                            >
                            @{{ inventory.name }}
                        </label>
                    </div>
                </div>
                
                {{-- Day Filter --}}
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">@lang('pickup::app.admin.settings.pickup.timeslots.index.filter.day')</label>
                    <div class="bg-white dark:bg-gray-900 p-3 rounded border dark:border-gray-700">
                        <label class="flex items-center py-2 border-b dark:border-gray-700">
                            <input 
                                type="checkbox" 
                                value=""
                                v-model="selectedDays" 
                                class="mr-2 w-4 h-4 accent-gray-200"
                            >
                            <span class="">All Days</span>
                        </label>
                        
                        <div class="flex flex-col gap-1">
                            <label v-for="(name, index) in weekDays" :key="index" class="flex items-center py-1 text-gray-600">
                                <input 
                                    type="checkbox" 
                                    :value="index.toString()" 
                                    v-model="selectedDays" 
                                    class="mr-2 w-4 h-4 accent-gray-200"
                                >
                                @{{ name }}
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('pickup::admin.timeslots.index.edit')
    </script>

    <script type="module">
        app.component('v-grouped-timeslots', {
            template: '#v-grouped-timeslots-template',
            props: ['timeslots', 'inventorySources'],

            data() {
                return {
                    grouped: {},
                    selectedInventorySource: [""],
                    selectedDays: [""],
                    editSlot: null,
                    isEditModalActive: false,
                    weekDays: @json(trans('pickup::app.week_days')),
                    inventorySources: @json($inventorySources),
                    timeslots: @json($timeslots),
                };
            },

            mounted() {
                console.log("GroupedTimeslots component mounted");
                console.log("Inventory Sources:", this.inventorySources);

                this.groupByInventoryAndDay();
            },

            watch: {
                selectedInventorySource: {
                    handler() {
                        this.groupByInventoryAndDay();
                    },
                    deep: true
                },

                selectedDays: {
                    handler() {
                        console.log("Selected Days changed:", this.selectedDays);
                        this.groupByInventoryAndDay();
                    },

                    deep: true
                }
            },

            methods: {
                isFirstDay(daysObject, currentDay) {
                    const firstDay = Object.keys(daysObject)[0];

                    return currentDay === parseInt(firstDay);
                },

                edit(slot) {
                    this.editSlot = {
                        ...slot
                    };
                    this.$refs.editModal.open();
                },

                closeEditModal() {
                    this.isEditModalActive = false;
                    this.editSlot = null;
                },

                updateTimeslot() {
                    this.$axios.post("{{ route('admin.settings.pickup.timeslot.update') }}", this.editSlot)
                        .then(response => {
                            this.$emitter.emit('add-flash', {
                                type: 'success',
                                message: response.data.message
                            });

                            this.isEditModalActive = false;
                            this.editSlot = null;

                            this.groupByInventoryAndDay();
                        })
                        .catch((error) => {
                            this.$emitter.emit('add-flash', {
                                type: 'error',
                                message: 'Failed to update timeslot. ' + (error.response?.data?.message || ''),
                                }
                            );
                        });
                },

                groupByInventoryAndDay() {
                    console.log('Applying filters...');
                    console.log('Selected inventory sources:', this.selectedInventorySource);
                    console.log('Selected days:', this.selectedDays);

                    const grouped = {};

                    // Determine whether to show all inventories or all days based on selected filters
                    const showAllInventories = this.selectedInventorySource.includes("");
                    const showAllDays = this.selectedDays.includes("");

                    this.timeslots.forEach(slot => {
                        const inventoryId = slot.inventory_source_id;
                        const day = this.getDayName(slot.pickup_day);
                        const dayIndex = slot.pickup_day.toString();

                        // Apply the inventory filter: if "All Inventories" is not selected, filter by the selected inventory
                        if (!showAllInventories && !this.selectedInventorySource.includes(inventoryId)) {
                            return;
                        }

                        // Apply the day filter: if "All Days" is not selected, filter by the selected days

                        if (!showAllDays && !this.selectedDays.includes(dayIndex)) {
                            return;
                        }
                        
                        // Initialize the inventory group if it doesn't exist
                        if (!grouped[inventoryId]) {
                            grouped[inventoryId] = {
                                inventory_name: slot.inventory.name,
                                days: {},
                            };
                        }

                        // Initialize the day array if it doesn't exist for the inventory
                        if (!grouped[inventoryId].days[day]) {
                            grouped[inventoryId].days[day] = [];
                        }

                        // Add the slot to the corresponding day
                        grouped[inventoryId].days[day].push(slot);
                    });

                    // Assign the grouped result to the component's grouped data
                    this.grouped = grouped;
                    console.log('Filtered groups:', this.grouped);
                },

                getDayName(day) {
                    return this.weekDays[day] || 'Unknown';
                },

                remove(id) {
                    if (confirm('Are you sure you want to delete this timeslot?')) {
                        this.$axios.post("{{ route('admin.settings.pickup.timeslot.delete') }}", {
                            id: id
                        })
                        .then(response => {
                            this.$emitter.emit('add-flash', {
                                type: 'success',
                                message: response.data.message
                            });

                            this.removeFromGrouped(id);
                        })
                        .catch(() => {
                            this.$emitter.emit('add-flash', {
                                type: 'error',
                                message: 'Failed to delete timeslot.'
                            });
                        });
                    }
                },

                removeFromGrouped(id) {
                    for (const inventoryId in this.grouped) {
                        const inventoryGroup = this.grouped[inventoryId];

                        for (const day in inventoryGroup.days) {
                            const originalLength = inventoryGroup.days[day].length;

                            inventoryGroup.days[day] = inventoryGroup.days[day].filter(slot => slot.id !== id);

                            // If all slots for this day were removed, remove the day group
                            if (inventoryGroup.days[day].length === 0) {
                                delete inventoryGroup.days[day];
                            }

                            // If the entire inventory group is now empty, delete it
                            if (Object.keys(inventoryGroup.days).length === 0) {
                                delete this.grouped[inventoryId];
                            }

                            // Break once found and removed
                            if (originalLength !== inventoryGroup.days[day]?.length) {
                                return;
                            }
                        }
                    }
                },

                clearFilters() {
                    this.selectedInventorySource = [""];
                    this.selectedDays = [""];

                    this.groupByInventoryAndDay();
                },

                refreshData() {
                    // Fetch fresh data instead of reloading page

                    this.$axios.get("{{ route('admin.settings.pickup.timeslot.index') }}")
                        .then(response => {
                            // Update the timeslots data
                            this.timeslots = response.data.timeslots;
                            this.groupByInventoryAndDay();
                        })
                        .catch(error => {
                            console.error('Failed to refresh data:', error);

                            this.$emitter.emit('add-flash', {
                                type: 'error',
                                message: 'Failed to refresh timeslot data.'
                            });
                        });
                }
            }
        })
    </script>
    @endPushOnce
</x-admin::layouts>
