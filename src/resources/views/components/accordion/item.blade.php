@props(['heading'])

<div {{ $attributes->merge(['class' => 'w-full accordion-item py-2']) }}>
    <button class="w-full" type="button" @click='expand($el)'>
        <div class="flex items-center">
            <div class="flex w-full items-center gap-2">
                @isset($icon)
                    {{ $icon }}
                @endisset
                <x-jui::heading>{{ $heading }}</x-jui::heading>
            </div>

            <span class="ml-auto">
                <svg class="size-4 accordion-svg transition-all duration-300 ease-in-out dark:text-white"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                    </path>
                </svg>
            </span>
        </div>

    </button>
    <x-jui::description class="accordion-item-content transition-all duration-500 ease-in-out"
        style="overflow:hidden;max-height: 0px">
        {{ $slot }}
    </x-jui::description>

</div>
