@props(['type' => 'text', 'label' => null, 'description' => null, 'error' => null])

@php
    $isGroupped = $label || $description || $error;
    $id = 'input-' . uniqid();

    $baseClass =
        "peer relative h-5 w-[38px] rounded-full border after:absolute after:start-[2px] after:top-0.6 after:mt-[1px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-zinc-600 peer-checked:after:translate-x-full peer-checked:after:border-white rtl:peer-checked:after:-translate-x-full dark:border-gray-600";
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
                            'type' => 'checkbox',
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
                'type' => 'checkbox',
                'id' => $id,
                'class' => 'peer sr-only',
            ]) }}>
        <div class="{{ $baseClass }}">
        </div>
    </label>
@endif
