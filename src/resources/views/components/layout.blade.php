@props(['type' => 'form', 'heading' => null])
@php
    $baseStyle = 'grid-cols-1';

    if ($type === 'form') {
        $baseStyle = 'lg:grid-cols-[70%_30%] grid-cols-1';
    }
    if ($type === 'rs-4-col') {
        $baseStyle = 'lg:grid-cols-4 grid-cols-1';
    }
    if ($type === 'rs-3-col') {
        $baseStyle = 'lg:grid-cols-3 grid-cols-1';
    }
@endphp
<div {{ $attributes->merge(['class' => 'grid gap-5 ' . $baseStyle]) }}>
    {{ $slot }}
</div>
