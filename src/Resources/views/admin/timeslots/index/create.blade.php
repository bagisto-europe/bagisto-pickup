@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-create-timeslot-form-template"
    >
        <x-admin::form
            v-slot="{ meta, errors, handleSubmit }"
            as="div"
        >
            <form @submit="handleSubmit($event, create)">
                <!-- Pickup Timeslot Create Modal -->
                <x-admin::drawer position="right" ref="timeslotCreateModal">
                    <!-- Modal Header -->
                    <x-slot:header>
                        <p class="text-lg font-bold text-gray-800 dark:text-white">
                            @lang('pickup::app.admin.settings.pickup.timeslots.create.title')
                        </p>
                    </x-slot>

                    <!-- Modal Content -->
                    <x-slot:content class="!p-5">
                        <!-- Inventory Source -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('pickup::app.admin.settings.pickup.timeslots.create.inventory_source')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control type="select" name="inventory_source" rules="required">
                                <option value="" disabled selected></option>
                                @foreach($inventorySources as $source)
                                    <option value="{{ $source->id }}">{{ $source->name }}</option>
                                @endforeach
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="inventory_source" />
                        </x-admin::form.control-group>

                        <!-- Pickup Day -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('pickup::app.admin.settings.pickup.timeslots.create.pickup_day')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"  
                                id="pickup_day"
                                name="pickup_day"
                                rules="required"
                                :label="trans('pickup::app.admin.settings.pickup.timeslots.create.pickup_day')"
                                :placeholder="trans('pickup::app.admin.settings.pickup.timeslots.create.pickup_day')"
                            >

                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="pickup_day" />
                        </x-admin::form.control-group>

                        <!-- Start Time -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('pickup::app.admin.settings.pickup.timeslots.create.start_time')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="time"
                                id="start_time"
                                name="start_time"
                                rules="required"
                                :label="trans('pickup::app.admin.settings.pickup.timeslots.create.start_time')"
                            />

                            <x-admin::form.control-group.error control-name="start_time" />
                        </x-admin::form.control-group>

                        <!-- End Time -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('pickup::app.admin.settings.pickup.timeslots.create.end_time')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="time"
                                id="end_time"
                                name="end_time"
                                rules="required"
                                :label="trans('pickup::app.admin.settings.pickup.timeslots.create.end_time')"
                            />

                            <x-admin::form.control-group.error control-name="end_time" />
                        </x-admin::form.control-group>

                        <!-- Pickup Quota -->
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('pickup::app.admin.settings.pickup.timeslots.create.pickup_quota')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="number"
                                id="pickup_quota"
                                name="pickup_quota"
                                rules="required"
                                :label="trans('pickup::app.admin.settings.pickup.timeslots.create.pickup_quota')"
                                placeholder="e.g. 100"
                            />

                            <x-admin::form.control-group.error control-name="pickup_quota" />
                        </x-admin::form.control-group>


                        <!-- Save Button -->
                        <x-admin::button
                            button-type="submit"
                            class="primary-button justify-center"
                            :title="trans('pickup::app.admin.settings.pickup.timeslots.create.save-btn')"
                            ::loading="isLoading"
                            ::disabled="isLoading"
                        />

                    </x-slot>
                </x-admin::drawer>
            </form>
        </x-admin::form>
    </script>

    <script type="module">
        app.component('v-create-timeslot-form', {
            template: '#v-create-timeslot-form-template',

            data() {
                return {
                    isLoading: false,
                };
            },

            methods: {
                openModal() {
                    this.$refs.timeslotCreateModal.open(); // Open modal when called
                },

                create(params, {
                    resetForm,
                    setErrors
                }) {
                    this.isLoading = true;

                    this.$axios.post("{{ route('admin.settings.pickup.timeslot.store') }}", params)
                        .then((response) => {
                            this.$refs.timeslotCreateModal.close();

                            this.$emit('timeslot-created', response.data.data);
                            this.$emitter.emit('add-flash', {
                                type: 'success',
                                message: response.data.message
                            });

                            resetForm();
                            this.isLoading = false;
                        })
                        .catch(error => {
                            this.isLoading = false;
                            if (error.response.status == 422) {
                                setErrors(error.response.data.errors);
                            } else {
                                this.$emitter.emit('add-flash', { type: 'error',  message: response.data.message });
                            }
                        });
                }
            }
        });
    </script>
@endPushOnce
