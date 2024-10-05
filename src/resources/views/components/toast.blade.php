<div x-data="{
    title: null,
    description: null,
    show: false, // Set initial visibility to false
    uuid: null,
    type: 'default',
    action: null,
    hasAction: false,
    init() {
        this.reset();
    },
    reset() {
        this.hasAction = false;
        this.action = {
            label: 'Click',
            onClick: () => {}
        };

    },
    handleToastEvent($event) {
        this.reset();
        const uuid = this.generateUUID();
        this.uuid = uuid;
        // Hide first if it's already showing, then display the new toast
        this.show = false;

        setTimeout(() => {
            this.show = true;

            console.log(this.uuid);

            // Extract title and description from the event detail
            const { title, description, action } = $event.detail;
            this.description = description;
            this.title = title;
            if (action) {
                this.action = action;

                if (action.label && action.onClick) {
                    this.hasAction = true;
                }
            }


            // Automatically hide the toast after a certain time
            setTimeout(() => {
                if (uuid === this.uuid)
                    this.show = false

            }, 3000);
        }, 100);
    },
    generateUUID() {

        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            const r = Math.random() * 16 | 0;
            const v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }
}" x-on:show-toast.window="handleToastEvent" x-show="show">
    <div class="fixed bottom-5 right-5 flex w-full max-w-sm items-center gap-5 rounded-md border bg-white px-4 py-2 shadow-md dark:border-gray-500 dark:bg-gray-700 dark:text-white"
        x-transition x-show="show">
        <div class="flex w-full items-center">
            <div class="w-full">
                <x-jui::heading class="!py-0"><span x-text="title"></span></x-jui::heading>
                <x-jui::description><span x-text="description"></span></x-jui::description>
            </div>
            <div style="display: none" x-show='hasAction'>
                <x-jui::button x-text='action.label' @click='action.onClick;show=false'></x-jui::button>
            </div>
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
