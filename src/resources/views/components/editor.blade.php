@props([
    'type' => 'text',
    'placeholder' => null,
    'value' => null,
    'label' => null,
    'description' => null,
    'error' => null,
])

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

        <div class="min-h-36 dark:ring-whit w-full appearance-none rounded-lg border border-zinc-200 border-b-zinc-300/80 bg-white text-sm leading-[1.375rem] text-zinc-700 placeholder-zinc-400 shadow-sm ring-black focus-within:border-black focus-within:ring-1 disabled:border-b-zinc-200 disabled:text-zinc-500 disabled:placeholder-zinc-400/70 disabled:shadow-none dark:border-white/10 dark:bg-white/10 dark:text-zinc-300 dark:placeholder-zinc-400 dark:shadow-none dark:outline-white/10 dark:focus-within:ring-2 dark:focus-within:ring-white dark:disabled:border-white/5 dark:disabled:bg-white/[7%] dark:disabled:text-zinc-400 dark:disabled:placeholder-zinc-500"
            wire:ignore>
            <div {{ $attributes->merge(['class' => 'mt-2 border-0qq']) }} x-data="{
                init() {
                    const toolbarOptions = [
                        ['bold', 'italic'], // toggled buttons
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['image']
                    ];
                    quill = new Quill(this.$refs.quillEditor, {
                        modules: {
                            toolbar: toolbarOptions
                        },
                        theme: 'bubble',
                        placeholder: @js($placeholder)
                    });
                    quill.on('text-change', function() {
                        $dispatch('input', quill.root.innerHTML);
                    });
                }
            }" x-ref="quillEditor"
                wire:model='text'>
                {!! $value ?? $slot !!}
            </div>
        </div>

        @if ($error)
            <x-jui::error>{{ $error }}</x-jui::error>
        @endif

    </x-jui::field>
@else
    <div class="min-h-36 w-full appearance-none rounded-lg border border-zinc-200 border-b-zinc-300/80 bg-white text-sm leading-[1.375rem] text-zinc-700 placeholder-zinc-400 shadow-sm disabled:border-b-zinc-200 disabled:text-zinc-500 disabled:placeholder-zinc-400/70 disabled:shadow-none dark:border-white/10 dark:bg-white/10 dark:text-zinc-300 dark:placeholder-zinc-400 dark:shadow-none dark:outline-white/10 dark:focus:ring-2 dark:disabled:border-white/5 dark:disabled:bg-white/[7%] dark:disabled:text-zinc-400 dark:disabled:placeholder-zinc-500"
        wire:ignore>
        <div {{ $attributes->merge(['class' => 'mt-2 border-0qq']) }} x-data="{
            init() {
                const toolbarOptions = [
                    ['bold', 'italic'], // toggled buttons
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['image']
                ];
                quill = new Quill(this.$refs.quillEditor, {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'bubble',
                });
                quill.on('text-change', function() {
                    $dispatch('input', quill.root.innerHTML);
                });
            }
        }" x-ref="quillEditor"
            wire:model='text'>
            {!! $value ?? $slot !!}
        </div>
    </div>
@endif
