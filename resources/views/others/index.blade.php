<x-app-layout>



    <div class="py-1 main-container">
        <div class="bg-light-grey-transparent">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}<br><br><rb><br><br>
                    <div id="modal-container">
                        <div id="modal-header">
                            <span id="modal-title">Team Communication</span>
                        </div>
                        <div id="modal-content">
                            <!-- Add your content here -->

                            @foreach($users as $them)
                                <a href="/profile/{{$them->id}}"> {{$them->id}} - {{$them->name}}</a> - {{$them->email}} <BR>

                                @endforeach




{{--$users--}}
                        </div>
                    </div>


            </div>
        </div>
    </div>


</x-app-layout>
