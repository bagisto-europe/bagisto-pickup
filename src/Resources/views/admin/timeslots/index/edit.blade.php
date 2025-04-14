<x-admin::modal ref="editModal" ::is-active="isEditModalActive">
    <x-slot:header class="dark:text-white">
        @lang('pickup::app.admin.settings.pickup.timeslots.edit.title')
    </x-slot:header>

    <x-slot:content>
        <form @submit.prevent="updateTimeslot">
            <div class="mb-4">
                <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    @lang('pickup::app.admin.settings.pickup.timeslots.edit.start_time')
                </label>

                <input type="time" v-model="editSlot.start_time" id="start_time"
                    class="w-full mt-1 border rounded px-3 py-2 dark:bg-gray-800 dark:text-white" />
            </div>

            <div class="mb-4">
                <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    @lang('pickup::app.admin.settings.pickup.timeslots.edit.end_time')
                </label>

                <input type="time" v-model="editSlot.end_time" id="end_time"
                    class="w-full mt-1 border rounded px-3 py-2 dark:bg-gray-800 dark:text-white" />
            </div>

            <div class="mb-4">
                <label for="pickup_quota" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    @lang('pickup::app.admin.settings.pickup.timeslots.edit.pickup_quota')
                </label>

                <input type="number" v-model="editSlot.pickup_quota" id="pickup_quota"
                    class="w-full mt-1 border rounded px-3 py-2 dark:bg-gray-800 dark:text-white" />
            </div>

            <div class="flex justify-end gap-2">
                <button type="submit" class="primary-button">
                    @lang('pickup::app.admin.settings.pickup.timeslots.edit.save-btn')
                </button>
            </div>
        </form>
    </x-slot:content>
</x-admin::modal>
