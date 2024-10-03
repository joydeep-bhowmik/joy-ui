@props(['message'])
<div {{ $attributes->merge(['class' => 'font-medium text-red-500 text-xs first-letter:uppercase']) }}>
    {{ $message }}</div>
