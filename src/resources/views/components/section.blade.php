@props(['title' => null])
<section
    {{ $attributes->merge(['class' => 'w-full  rounded-md border bg-white px-4 py-2 dark:border-gray-700 dark:bg-gray-800']) }}>

    <div class="flex items-center">
        @if ($title)
            <header class="w-full">
                <x-jui::heading>{{ $title }}</x-jui::heading>
            </header>
        @endif

        @isset($action)
            <div class="ml-auto">{{ $action }}</div>
        @endisset
    </div>
    <main class="dark:text-white">
        {{ $slot }}
    </main>
</section>
