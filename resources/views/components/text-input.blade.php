@props([
    'type' => 'text',
    'label' => '',
    'required' => true,
    'placeholder' => '',
])

<div {{ $attributes(['class' => 'mb-4']) }}>
    <div
        @error($attributes->whereStartsWith('wire:model')->first())
            class = 'flex items-center rounded-2xl border-2 px-3 py-2 border-red-400'
        @else
            class = 'flex items-center rounded-2xl border-2 px-3 py-2'
        @enderror>
        <input {{ $attributes->whereStartsWith('wire:model') }}
            name="{{ $attributes->whereStartsWith('wire:model')->first() }}" class="border-none pl-2 outline-none"
            required="{{ $required }}" type="{{ $type }}" placeholder="{{ $label }}" />
    </div>
    @error($attributes->whereStartsWith('wire:model')->first())
        <span class="px-3 text-xs text-red-500">{{ $message }}</span>
    @enderror
</div>
