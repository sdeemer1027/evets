<x-app-layout>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%; /* Ensure html and body take full height */
        }
        .py-1 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .main-container {
            width: 90%;
            height: 90%;
            margin: 0 auto; /* Center horizontally */
            position: absolute;
            top: 50%; /* Center vertically */
            left: 50%;
            transform: translate(-50%, -50%); /* Center vertically and horizontally */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bg-light-grey-transparent {
            background-color: rgba(211, 211, 211, 0.5);
            width: 100%;
            height: 100%;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
        }
        .p-6 {
            padding: 1.5rem;
        }
        .text-gray-900 {
            color: #1a202c;
        }
        #jaas-container {
            width: 95%;
            height: 95%;
            background-color: white;
            border: 1px solid #ccc;
            resize: both;
            overflow: auto;
            position: absolute; /* Absolute positioning for movement */
        }
        #modal-container {
            width: 700px;
            height: 500px;
            position: relative;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }
        #modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #333;
            color: white;
            padding: 5px;
            cursor: move;
        }
        #modal-content {
            padding: 10px;
        }
    </style>




    <script src='https://8x8.vc/vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/external_api.js?release=release-5218' async></script>


    <script type="text/javascript">
        window.onload = () => {
            const api = new JitsiMeetExternalAPI("8x8.vc", {
                roomName: "vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/{{$user->name}}",

                parentNode: document.querySelector('#jaas-container'),
                release: "release-5218"
            });

        }
    </script>


    <div class="py-1">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-light-grey-transparent overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="modal-container">
                        <div id="modal-header">
                            <span id="modal-title">Team Communication</span>
                        </div>
                        <div id="modal-content">
                            <!-- Add your content here -->
                            <div id="jaas-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
