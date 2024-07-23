




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
   






<div class="container-fluid" id="jaas-container" style="height: 100vh;"></div>

<script src="https://8x8.vc/vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/external_api.js" async></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const domain = "8x8.vc";
        const options = {
            roomName: "{{ $roomName }}",
            width: "100%",
            height: "100%",
            parentNode: document.querySelector('#jaas-container')
        };
        const api = new JitsiMeetExternalAPI(domain, options);

        api.addEventListener('videoConferenceJoined', function() {
            console.log('Local User Joined');
        });
    });
</script>







   
</div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
