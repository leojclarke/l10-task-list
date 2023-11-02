<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <title>Laravel 10 Task List</title>
    @yield('styles')
</head>

<body class="container pt-3">
    <h1 class="h1 px-2">@yield('title')</h1>


    {{-- USING ALPINE JS --}}
    {{-- <div x-data="{ flash: true }" class="container-sm">

        @if (session()->has('success'))
                class="position-relative mb-4 px-3 py-4 border border-2 rounded border-success bg-success-subtle text-success"
                role="alert">
                <strong class="fs-5">Success!</strong>
                <div>
                    {{ session('success') }}
                </div>
                <span class="position-absolute top-0 end-0 py-4 px-3">
                    <i @click="flash = false" class="fas fa-x"></i>
                </span>
            </div>
        @endif
        @yield('content')
    </div> --}}

    {{-- USING JQUERY --}}
    <div class="container-sm">

        @if (session()->has('success'))
            <div class="position-relative mb-4 px-3 py-4 border border-2 rounded border-success bg-success-subtle text-success"
                role="alert">
                <strong class="fs-5">Success!</strong>
                <div>
                    {{ session('success') }}
                </div>
                <span class="position-absolute top-0 end-0 py-4 px-3">
                    <i id="close-flash" class="fas fa-x"></i>
                </span>
            </div>
        @endif
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#close-flash').on('click', function() {
                $('.position-relative').fadeOut()
            });
        });

        setTimeout(function() {
            $('.position-relative').fadeOut();
        }, 5000);
    </script>

    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
