<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="main">
        <!-- sidebar -->
        @include('candidate.partials.sidebar')
        <!-- main content -->
        <div class="main-body">
            <!-- navbar -->
            @include('candidate.partials.navbar')
            <!-- content -->
            @yield('content')
            <!-- content end-->
        </div>
    </div>

    <!--js script -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Script -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    @yield('script')
    {!! Toastr::message() !!}
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('button#menu-bar').on('click', function() {
                $('div.main-body').css('margin-left', '75px');
                $('nav.fixed-navbar').css('margin-left', '75px');
                $('div.sidebar').css('max-width', '75px');
                $('div.sidebar > ul > li').css('opacity', '0');
            });
        });
    </script>
</body>
</html>
