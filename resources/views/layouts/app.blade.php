<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Evets.Pet</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .navbar-custom {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .navbar-brand-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        @media (max-width: 768px) {
            .navbar-brand-center {
                position: static;
                transform: none;
                order: 1;
                width: 100%;
                text-align: center;
            }
        }
        .main-background {
            position: relative;
            z-index: 1;
            height: 100vh; /* Optional: Adjust based on your layout needs */
        }
        .main-background::before {
            content: "";
            background-image: url('/bg/bright-room-interior_305343-7846.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.75; /* 50% transparency */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .bg-light-grey-transparent {
            background-color: rgba(245, 245, 245, 0.8); /* Light grey with 50% opacity */
        }
        .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - (.5rem * 2));
        }
        .modal-resizable {
            resize: both;
            overflow: auto;
        }
        .modal-fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1050;
        }
        .modal-header .btn {
            padding: 0.2rem 0.5rem;
            margin-left: 0.5rem;
        }
    </style>

    <style>html, body, #jaas-container { width: 100%; }</style>
{{-- Auth::user()->name --}}



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">


    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="main-background">

            {{ $slot }}
        </main>
    </div>







<!-- Modal -->
    <div class="modal fade" id="jaasModal" tabindex="-1" aria-labelledby="jaasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-resizable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jaasModalLabel">Evets.Pet</h5>
                    <button type="button" class="btn btn-secondary" id="minimizeBtn" title="Minimize"><i class="fas fa-window-minimize"></i></button>
                    <button type="button" class="btn btn-secondary" id="maximizeBtn" title="Maximize"><i class="fas fa-window-maximize"></i></button>
                    <button type="button" class="btn btn-secondary d-none" id="restoreBtn" title="Restore"><i class="fas fa-window-restore"></i></button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="jaas-container"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            let isFullscreen = false;

            $('#jaasModal').on('shown.bs.modal', function() {
                $('#maximizeBtn').removeClass('d-none');
                $('#restoreBtn').addClass('d-none');
            });

            $('#minimizeBtn').click(function() {
                $('#jaasModal .modal-dialog').toggleClass('modal-lg modal-sm');
            });

            $('#maximizeBtn').click(function() {
                $('#jaasModal .modal-dialog').addClass('modal-fullscreen');
                $('#maximizeBtn').addClass('d-none');
                $('#restoreBtn').removeClass('d-none');
            });

            $('#restoreBtn').click(function() {
                $('#jaasModal .modal-dialog').removeClass('modal-fullscreen');
                $('#restoreBtn').addClass('d-none');
                $('#maximizeBtn').removeClass('d-none');
            });
        });
    </script>
</body>
</html>
