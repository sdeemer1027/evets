




<x-app-layout>
{{--     
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
--}}





    <div class="py-1">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-light-grey-transparent overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
    <h1>Welcome to Your Jitsi Room</h1>
    <p>Click the button below to enter your room.</p>
    <a href="{{ route('jitsi.room', ['roomName' => $roomName]) }}" class="btn btn-primary">Enter My Room</a>
</div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
