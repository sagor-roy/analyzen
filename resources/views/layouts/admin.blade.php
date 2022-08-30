<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="main">
        <!-- sidebar -->
        @include('admin.partials.sidebar')
        <!-- main content -->
        <div class="main-body">
            <!-- navbar -->
            @include('admin.partials.navbar')
            <!-- content -->
            @yield('content')
            <!-- content end-->
        </div>
    </div>

    <!--js script -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script></script>
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

        // In your Javascript (external.js resource or <script> tag)
        $(document).ready(function() {
            $('#select_two').select2({
                placeholder: "Select a Candidate",
            });
        });
    </script>
    {!! Toastr::message() !!}
</body>

</html>
