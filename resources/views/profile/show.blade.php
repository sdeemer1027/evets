<x-app-layout>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .parent-container {
            position: relative; /* Reference for absolute positioning */
            width: 90vw;
            height: 90vh;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            overflow: hidden; /* Hide overflow */
        }
        #jaas-container {
            position: absolute; /* Allows it to be moved around */
            width: 600px;
            height: 600px;
            background-color: lightblue;
            border: 1px solid #ccc;
            resize: both;
            overflow: auto;
        }
        #jaas-container-header {
            background-color: darkblue;
            color: white;
            padding: 5px;
            cursor: move; /* Indicate draggable */
            text-align: center;
        }



        .card {
            position: absolute; /* Allows it to be moved around */
            width: 600px;
            height: 500px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            cursor: move; /* Indicate draggable */
            text-align: center;
        }
        .card-body {
            padding: 1px;
            overflow: auto;
        }
    </style>
    <script src='https://8x8.vc/vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/external_api.js?release=release-5218' async></script>

    <script type="text/javascript">
        window.onload = () => {
            const api = new JitsiMeetExternalAPI("8x8.vc", {
                roomName: "vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/{{$user->name}}",
 //               configOverwrite: { toolbarButtons: ['hangup', 'microphone', 'camera'],
//
//                },
//                logoImageUrl: "/srdlogo.png",
//                height: 600,
                parentNode: document.querySelector('#jaas-container'),
                release: "release-5218"
            });

        }
    </script>


    <div class="py-1">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-light-grey-transparent overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <div class="parent-container">

                            <div class="card">
                                <div class="card-header">
                                    <h3>Move Me</h3>
                                </div>
                                <div class="card-body">


                                    <div id="jaas-container"></div>
                                </div>

                            </div>


                        </div>




                </div>
            </div>
        </div>
    </div>





    <!-- Interact.js Library   https://cdn.jsdelivr.net/npm/interactjs@1.10.11/dist  -->
    <script src="/interact.min.js"></script>

    <script>
        interact('#jaas-container')
            .draggable({
                // Use the header as the handle for dragging
                handle: '#jaas-container-header',
                listeners: {
                    move(event) {
                        const target = event.target;
                        let x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                        let y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                        // Ensure the container stays within the parent container's bounds
                        const parent = target.parentElement;
                        const parentRect = parent.getBoundingClientRect();
                        const targetRect = target.getBoundingClientRect();

                        // Limit movement within parent container
                        if (x < 0) x = 0;
                        if (y < 0) y = 0;
                        if (x + targetRect.width > parentRect.width) x = parentRect.width - targetRect.width;
                        if (y + targetRect.height > parentRect.height) y = parentRect.height - targetRect.height;

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

                        // Adjust position to maintain container within the parent bounds
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
