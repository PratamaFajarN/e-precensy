<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('admin/asset/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('admin/asset/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('admin/asset/vendors/css/vendor.bundle.base.css') }}">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css' rel='stylesheet' />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ url('admin/asset/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('admin/asset/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="{{ url('admin/asset/text/css" href="js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('admin/asset/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="{{ url('admin/asset/images/favicon.png') }}" />
    <link rel="stylesheet" href="sweetalert2.min.css">


    <!-- Optional theme -->
    <link rel="stylesheet"  href="{{ url('admin/asset/css/newdatepicker.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
</head>

<body>
      @yield("login")
    @include("dashboard.header")

    @include("dashboard.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            @yield("content")
            @yield("konten")



            @include("dashboard.footer")

            {{--Library VUE JS--}}

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
            <script src='https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js'></script>

            <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
            <script src="{{ url('admin/asset/vendors/js/vendor.bundle.base.js')}}"></script>

            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="{{ url('admin/asset/vendors/chart.js/Chart.min.js')}}"></script>
            <script src="{{ url('admin/asset/vendors/datatables.net/jquery.dataTables.js')}}"></script>
            <script src="{{ url('admin/asset/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
            <script src="{{ url('admin/asset/js/dataTables.select.min.js')}}"></script>

            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="{{ url('admin/asset/js/off-canvas.js')}}"></script>
            <script src="{{ url('admin/asset/js/hoverable-collapse.js')}}"></script>
            <script src="{{ url('admin/asset/js/template.js')}}"></script>
            <script src="{{ url('admin/asset/js/settings.js')}}"></script>
            <script src="{{ url('admin/asset/js/todolist.js')}}"></script>
            <!-- endinject -->
            <!-- Custom js for this page-->
            <script src="{{ url('admin/asset/js/dashboard.js')}}"></script>
            <script src="{{ url('admin/asset/js/Chart.roundedBarCharts.js')}}"></script>



            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
            </script>


            <!-- End custom js for this page-->

            <script type="text/javascript" charset="utf8"
                src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
            @yield("script")

</body>

</html>
