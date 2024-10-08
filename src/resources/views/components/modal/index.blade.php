@props(['title' => null, 'description' => null, 'name' => null, 'show' => false, 'closeable' => true])
<div x-data="{
    show: @js($show),
    handleOpenEvent($event) {
        const name = $event.detail;
        if (name === @js($name)) {
            this.show = true
        }
    },
    handleCloseEvent($event) {
        const name = $event.detail;
        if (name === @js($name)) {
            this.show = false
        }
    }

}" x-show="show">
    <div class="opacity-55 fixed inset-0 grid place-items-center bg-black backdrop-blur-3xl" style="display: none"
        x-on:close-all-modal.window="show=false" x-on:close-modal.window="handleCloseEvent" x-show="show"
        x-on:open-modal.window="handleOpenEvent">

    </div>

    <div class="fixed bottom-0 left-0 right-0 grid h-fit place-items-center lg:inset-0 lg:h-full">
        <div class="w-full max-w-md rounded-md border bg-white p-3 dark:border-gray-700 dark:bg-gray-800"
            style="display: none" @click.outside="show=false" x-show="show" x-transition>
            <div class="p-3 pt-1">
                <div class="flex items-center">
                    <div>
                        @isset($title)
                            <x-jui::heading class="my-0 font-medium first-letter:uppercase"
                                size="lg">{{ $title }}</x-jui::heading>
                        @endisset

                    </div>
                    @if ($closeable)
                        <div class="ml-auto dark:text-white">
                            <button class="rounded-lg p-2 focus:bg-slate-200 dark:focus:bg-slate-700" type="button"
                                @click="show=false">
                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
                @isset($description)
                    <x-jui::description>{{ $description }}</x-jui::description>
                @endisset
            </div>
            <div class="max-h-screen overflow-y-auto">
                {{ $slot }}
            </div>
            @isset($footer)
                <div class="flex gap-4 p-2">
                    <div class="item-center ml-auto flex gap-2"> {{ $footer }}</div>
                </div>
            @endisset
        </div>
    </div>
</div>
