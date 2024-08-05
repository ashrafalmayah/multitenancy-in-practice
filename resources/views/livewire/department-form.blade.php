<div class="flex justify-center items-stretch gap-2">
    <input wire:model="name" type="text">
    <button wire:click="submit" class="bg-blue-600 px-6 text-white hover:bg-blue-500">Submit</button>
    @if ($success)
        <div>Saved</div>
    @endif
</div>
