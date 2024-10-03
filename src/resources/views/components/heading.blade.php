@props(['size' => 'nr'])
@php
    $fontSize = '14px';
    if ($size === 'lg') {
        $fontSize = '16px';
    }
    if ($size === 'xl') {
        $fontSize = '24px';
    }
@endphp
<h2 style="font-size:{{ $fontSize }}" {{ $attributes->merge(['class' => 'dark:text-white my-2 font-medium']) }}>
    {{ $slot }}</h2>
