@props(['value'])
<label
    {{ $attributes->merge(['class' => 'text-sm font-medium select-none text-zinc-800 dark:text-white first-letter:uppercase']) }}>{{ $value ?? $slot }}</label>
