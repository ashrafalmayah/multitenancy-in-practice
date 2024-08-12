@section('title', 'Create a new account')

<div class="h-screen md:flex">
    <div
        class="i relative hidden w-1/2 items-center justify-around overflow-hidden bg-gradient-to-tr from-blue-800 to-purple-700 md:flex">

        <div class="absolute -bottom-32 -left-40 h-80 w-80 rounded-full border-4 border-t-8 border-opacity-30"></div>
        <div class="absolute -bottom-40 -left-20 h-80 w-80 rounded-full border-4 border-t-8 border-opacity-30"></div>
        <div class="absolute -right-0 -top-40 h-80 w-80 rounded-full border-4 border-t-8 border-opacity-30"></div>
        <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full border-4 border-t-8 border-opacity-30"></div>
    </div>
    <div class="flex items-center justify-center bg-white py-10 md:w-1/2">
        <form wire:submit.prevent="register" class="bg-white">
            <h1 class="mb-1 text-2xl font-bold text-gray-800">Start your free trial</h1>
            <x-text-input
                wire:model.live="name"
                type="text"
                label="Name"
                :required="true"
                class="" />
            <x-text-input
                wire:model.live="companyName"
                type="text"
                label="Company Name"
                :required="true"
                class="" />
            <x-text-input
                wire:model.live="email"
                type="text"
                label="Email"
                :required="true"
                class="" />
            <x-text-input
                wire:model.live="password"
                type="text"
                label="Password"
                :required="true"
                class="" />
            <button type="submit"
                class="mb-2 mt-4 block w-full rounded-2xl bg-indigo-600 py-2 font-semibold text-white">Register</button>
            {{-- <ul class="list-inside list-disc mt-4">
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-500">{{ $error }}</li>
                @endforeach
            </ul> --}}
        </form>
    </div>
</div>
