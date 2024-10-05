@props(['type' => 'text', 'label' => null, 'description' => null, 'error' => null])

@php
    $isGroupped = $label || $description || $error;
    $id = 'input-' . uniqid();

    $baseClass =
        'peer border size-5 border-8 border-slate-100 rounded-full  dark:border-slate-600 peer-checked:border-zinc-600 dark:peer-checked:border-white';
@endphp

@if ($isGroupped)
    <x-jui::field>
        <div class="flex w-full">
            <div class="w-full">
                @if ($label)
                    <x-jui::label for="{{ $id }}">{{ $label }}</x-jui::label>
                @endif

                @if ($description)
                    <x-jui::description class="mt-1">{{ $description }}</x-jui::description>
                @endif
            </div>
            <div class="ml-auto w-fit">

                <label class="mb-5 inline-flex cursor-pointer items-center" for="{{ $id }}">
                    <input
                        {{ $attributes->merge([
                            'type' => 'radio',
                            'id' => $id,
                            'class' => 'peer sr-only',
                        ]) }}>
                    <div class="{{ $baseClass }}">
                    </div>
                </label>
            </div>
        </div>

        @if ($error)
            <x-jui::error>{{ $error }}</x-jui::error>
        @endif

    </x-jui::field>
@else
    <label class="mb-5 inline-flex cursor-pointer items-center" for="{{ $id }}">
        <input
            {{ $attributes->merge([
                'type' => 'radio',
                'id' => $id,
                'class' => 'peer sr-only',
            ]) }}>
        <div class="{{ $baseClass }}">
        </div>
    </label>
@endif
