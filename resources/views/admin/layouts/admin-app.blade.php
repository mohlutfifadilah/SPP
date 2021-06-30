        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>@yield('title')</title>

            <script src="{{ asset('js/app.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            <!-- Custom fonts for this template-->
            <link href="{{ asset('sb-admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
                type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">
            <!-- jsCalendar v1.4.3 Javascript and CSS from jsdelivr npm cdn -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-jscalendar@1.4.3/source/jsCalendar.min.css"
                integrity="sha384-+OB2CadpqXIt7AheMhNaVI99xKH8j8b+bHC8P5m2tkpFopGBklD3IRvYjPekeWIJ"
                crossorigin="anonymous">
            <!-- Include this in your blade layout -->
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>            
            <link href="https://unpkg.com/easy-autocomplete@1.3.5/dist/easy-autocomplete.min.css" rel="stylesheet" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://unpkg.com/easy-autocomplete@1.3.5/dist/jquery.easy-autocomplete.js"></script>

            <!-- Custom styles for this template-->
            <link href="{{ asset('sb-admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
            <!-- Custom styles for this page -->
            <link href="{{ asset('sb-admin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
            <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" /> -->
            @yield('css')
        </head>

        <body id="page-top">

            <!-- Page Wrapper -->
            <div id="wrapper">
                @include('admin.layouts.sidebar')

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        @include('admin.layouts.nav')

                        @yield('content')
                        @yield('js')
                        @include('admin.layouts.footer')