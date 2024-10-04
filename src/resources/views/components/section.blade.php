@props(['title' => null])
<section
    {{ $attributes->merge(['class' => 'w-full  rounded-md border bg-white px-4 py-2 dark:border-gray-700 dark:bg-gray-800']) }}>
    @if ($title)
        <header>
            <x-jui::heading>{{ $title }}</x-jui::heading>
        </header>
    @endif
    <main class="dark:text-white">
        {{ $slot }}
    </main>
</section>
