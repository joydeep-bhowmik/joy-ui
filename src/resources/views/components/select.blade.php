@props(['label' => null, 'description' => null, 'error' => null])

@php
    $isGroupped = $label || $description || $error;
    $id = 'input-' . uniqid();
@endphp

@if ($isGroupped)
    <x-jui::field>
        @if ($label)
            <x-jui::label for="{{ $id }}">{{ $label }}</x-jui::label>
        @endif

        @if ($description)
            <x-jui::description>{{ $description }}</x-jui::description>
        @endif

        <select
            {{ $attributes->merge([
                'class' =>
                    'w-full block border rounded-lg block disabled:shadow-none dark:shadow-none appearance-none text-sm p-3 min-h-10 leading-[1.375rem] bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 disabled:text-zinc-500 placeholder-zinc-400 disabled:placeholder-zinc-400/70 dark:text-zinc-300 dark:disabled:text-zinc-400 dark:placeholder-zinc-400 dark:disabled:placeholder-zinc-500 shadow-sm border-zinc-200 border-b-zinc-300/80 disabled:border-b-zinc-200 dark:outline-white/10 dark:border-white/10 dark:disabled:border-white/5 dark:focus:ring-2 ',
            ]) }}>{{ $slot }}</select>

        @if ($error)
            <x-jui::error>{{ $error }}</x-jui::error>
        @endif

    </x-jui::field>
@else
    <section
        {{ $attributes->merge([
            'class' =>
                'w-full block border rounded-lg block disabled:shadow-none dark:shadow-none appearance-none text-sm p-3 min-h-10 leading-[1.375rem] bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 disabled:text-zinc-500 placeholder-zinc-400 disabled:placeholder-zinc-400/70 dark:text-zinc-300 dark:disabled:text-zinc-400 dark:placeholder-zinc-400 dark:disabled:placeholder-zinc-500 shadow-sm border-zinc-200 border-b-zinc-300/80 disabled:border-b-zinc-200 dark:outline-white/10 dark:border-white/10 dark:disabled:border-white/5 dark:focus:ring-2 ',
        ]) }}>
        {{ $slot }}</select>

@endif
