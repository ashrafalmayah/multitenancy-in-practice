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
            <div class="mb-4 flex items-center rounded-2xl border-2 px-3 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd" />
                </svg>
                <input class="border-none pl-2 outline-none" wire:model="name" type="text" placeholder="Name" />
            </div>
            <div class="mb-4 flex items-center rounded-2xl border-2 px-3 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                </svg>
                <input class="border-none pl-2 outline-none" wire:model="companyName" type="text" placeholder="Company Name" />
            </div>
            <div class="mb-4 flex items-center rounded-2xl border-2 px-3 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
                <input class="border-none pl-2 outline-none" wire:model="email" type="text" placeholder="Email Address" />
            </div>
            <div x-data="{ showPassword: false }" class="relative flex items-center rounded-2xl border-2 px-3 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>
                <input class="border-none pl-2 outline-none" wire:model="password" :type="showPassword ? 'text' : 'password'"
                    placeholder="Password" />
                <span @click="showPassword = !showPassword" x-html="showPassword ? 'Hide' : 'Show'"
                    class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-sm text-gray-500 select-none"></span>
            </div>
            <button type="submit"
                class="mb-2 mt-4 block w-full rounded-2xl bg-indigo-600 py-2 font-semibold text-white">Register</button>
            <ul class="list-inside list-disc mt-4">
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </form>
    </div>
</div>
