@props(['name'])
<span x-data @click="$dispatch('open-modal',`{{ $name }}`)">
    {{ $slot }}
</span>
