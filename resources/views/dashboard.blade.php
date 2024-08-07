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
            width: 500px;
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

    {{-- Just comment out this for now --}}
    <script src='https://8x8.vc/vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/external_api.js?release=release-5218' async></script>

    <script type="text/javascript">
        window.onload = () => {
            const api = new JitsiMeetExternalAPI("8x8.vc", {
                roomName: "vpaas-magic-cookie-b72a143efed24a1cacc15165973e4565/{{ Auth::user()->name }}",
                parentNode: document.querySelector('#jaas-container'),
                release: "release-5218"
            });
        }
    </script>

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
                            <div id="jaas-container"></div>
                        </div>
                    </div>

                    fffffffffffffffffffffff
            </div>
        </div>
    </div>

    <!-- Interact.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.10.11/dist/interact.min.js"></script>

    <script>
        // Enable dragging and resizing
        interact('#modal-container')
            .draggable({
                handle: '#modal-header', // Make the header the handle for dragging
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
