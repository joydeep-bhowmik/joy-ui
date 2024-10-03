<div x-data="{
    heading: null,
    description: null,
    show: false, // Set initial visibility to false
    handleToastEvent($event) {
        // Hide first if it's already showing, then display the new toast
        this.show = false;
        this.show = true;

        // Extract heading and description from the event detail
        const { heading, description } = $event.detail;
        this.description = description;
        this.heading = heading;

        // Automatically hide the toast after a certain time
        setTimeout(() => this.show = false, 3000);
    }
}" x-on:show-toast.window="handleToastEvent" x-show="show">
    <div class="fixed bottom-5 right-5 flex w-full max-w-sm items-center rounded-md border bg-white px-4 py-2 shadow-md dark:border-gray-500 dark:bg-gray-700 dark:text-white"
        x-transition x-show="show">
        <div class="w-full">
            <x-jui::heading class="!py-0"><span x-text="heading"></span></x-jui::heading>
            <x-jui::description><span x-text="description"></span></x-jui::description>
        </div>
        <div class="ml-auto">
            <button type="button" @click="show=false">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
