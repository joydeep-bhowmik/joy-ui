@props(['variant' => 'default', 'wireTarget' => ''])

@php

    $baseClasses = 'relative inline-flex items-center  font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 
        focus:ring-2 disabled:cursor-default disabled:pointer-events-none h-10 text-xs rounded-lg px-3 shadow-sm group-[]/button:-ml-[1px] group-[]/button:first:ml-0 ';

    $variantClasses = match ($variant) {
        'danger'
            => 'bg-red-700 text-white border border-red-500 hover:bg-red-600 dark:bg-red-700 dark:text-white dark:hover:bg-red-500 dark:border-red-600 focus:ring-red-600',
        'primary'
            => 'bg-black text-white border border-black hover:bg-gray-800 dark:bg-white dark:text-black dark:hover:bg-gray-200 dark:border-gray-300 focus:ring-gray-600',
        'default'
            => 'bg-slate-100 hover:bg-zinc-50 dark:bg-zinc-700 dark:hover:bg-zinc-600/75 text-zinc-800 dark:text-white border border-zinc-200 hover:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-600 dark:hover:border-zinc-600',
        'ghost' => 'bg-transparent shadow-none focus:bg-slate-200 dark:text-white dark:focus:bg-slate-700',
        default => '',
    };
@endphp

<button {{ $attributes->merge(['class' => "$baseClasses $variantClasses"]) }} wire:loading.attr='disabled'
    wire:loading.class='opacity-55' wire:target='{{ $wireTarget }}'>
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        <svg class="size-4 animate-spin" wire:loading wire:target='{{ $wireTarget }}' xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M18.364 5.63604L16.9497 7.05025C15.683 5.7835 13.933 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19C15.866 19 19 15.866 19 12H21C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C14.4853 3 16.7353 4.00736 18.364 5.63604Z">
            </path>
        </svg>
    </div>
    <span wire:loading.class='invisible' wire:target='{{ $wireTarget }}'>{{ $slot }}</span>
</button>
