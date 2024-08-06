<x-app-layout>


    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .py-1 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
        .sm\\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        .lg\\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }
        .bg-light-grey-transparent {
            background-color: rgba(211, 211, 211, 0.5);
        }
        .overflow-hidden {
            overflow: hidden;
        }
        .shadow-sm {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .sm\\:rounded-lg {
            border-radius: 0.5rem;
        }
        .p-6 {
            padding: 1.5rem;
        }
        .text-gray-900 {
            color: #1a202c;
        }
        #jaas-container {
            width: 200px;
            height: 150px;
            background-color: lightblue;
            border: 1px solid #ccc;
            resize: both;
            overflow: auto;
            position: absolute; /* Absolute positioning for movement */
        }
        #jaas-container-header {
            background-color: darkblue;
            color: white;
            padding: 5px;
            cursor: move; /* Indicate that it is movable */
        }
    </style>

    <script src='https://8x8.vc/vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/external_api.js?release=release-5218' async></script>

    <script type="text/javascript">
        window.onload = () => {
            const api = new JitsiMeetExternalAPI("8x8.vc", {
                roomName: "vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/{{ Auth::user()->name }}",
 //               configOverwrite: { toolbarButtons: ['hangup', 'microphone', 'camera'],
//
//                },
//                logoImageUrl: "/srdlogo.png",
               // height: 700,
                parentNode: document.querySelector('#jaas-container'),
                release: "release-5218"
            });

        }
    </script>




    <div class="py-1">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-light-grey-transparent overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}<br><br><rb><br><br>

                        <div id="jaas-container">
                            <div id="jaas-container-header">Move Me</div>
                            <!-- Add your content here -->
                        </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Interact.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.10.11/dist/interact.min.js"></script>

    <script>
        // Enable dragging and resizing
        interact('#jaas-container')
            .draggable({
                handle: '#jaas-container-header', // Make the header the handle for dragging
                listeners: {
                    move(event) {
                        const target = event.target;
                        const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                        const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                        target.style.transform = `translate(${x}px, ${y}px)`;

                        target.setAttribute('data-x', x);
                        target.setAttribute('data-y', y);
                    }
                }
            })
            .resizable({
                edges: { left: true, right: true, bottom: true, top: true },
                listeners: {
                    move(event) {
                        const target = event.target;
                        let x = parseFloat(target.getAttribute('data-x')) || 0;
                        let y = parseFloat(target.getAttribute('data-y')) || 0;

                        target.style.width = `${event.rect.width}px`;
                        target.style.height = `${event.rect.height}px`;

                        x += event.deltaRect.left;
                        y += event.deltaRect.top;

                        target.style.transform = `translate(${x}px, ${y}px)`;

                        target.setAttribute('data-x', x);
                        target.setAttribute('data-y', y);
                    }
                }
            });
    </script>
</x-app-layout>
