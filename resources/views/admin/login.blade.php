<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" >
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png') }}" >
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >

    <title>Amaze - Bootstrap Admin Dashboard Template</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' name='viewport' >
    <meta name="viewport" content="width=device-width" >

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" >

    <!--  Paper Dashboard CSS    -->
    <link href="{{ asset('admin/assets/css/amaze.css') }}" rel="stylesheet" >

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('admin/assets/css/demo.css') }}" rel="stylesheet" >

    <!--     Fonts and icons     -->
    <link href="{{ asset('admin/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/font-muli.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('admin/assets/css/themify-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/assets/vendors/sweetalert/css/sweetalert2.min.css') }}" rel="Stylesheet" >
</head>

<body>
<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page"  data-color="blue">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">

                        <form method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}
                            <div class="card card-login card-hidden">
                                <div class="header text-center">
                                    <h3 class="title">Login</h3>
                                </div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" placeholder="Enter email" class="form-control input-no-border" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" class="form-control input-no-border" name="password">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-rose btn-wd btn-lg">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('admin/assets/vendors/jquery-3.1.1.min.js') }}../" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('admin/assets/vendors/jquery.validate.min.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('admin/assets/vendors/moment.min.js') }}"></script>
<!--  Charts Plugin -->
<script src="{{ asset('admin/assets/vendors/chartist.min.js') }}"></script>
<!--  Plugin for the Wizard -->
<script src="{{ asset('admin/assets/vendors/jquery.bootstrap-wizard.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('admin/assets/vendors/bootstrap-notify.js') }}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{ asset('admin/assets/vendors/bootstrap-datetimepicker.js') }}"></script>
<!-- Vector Map plugin -->
<script src="{{ asset('admin/assets/vendors/jquery-jvectormap.js') }}"></script>
<!-- Sliders Plugin -->
<script src="{{ asset('admin/assets/vendors/nouislider.min.js') }}"></script>
<!-- Select Plugin -->
<script src="{{ asset('admin/assets/vendors/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{ asset('admin/assets/vendors/jquery.datatables.js') }}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('admin/assets/vendors/sweetalert/js/sweetalert2.min.js') }}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('admin/assets/vendors/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{ asset('admin/assets/vendors/fullcalendar.min.js') }}"></script>
<!-- TagsInput Plugin -->
<script src="{{ asset('admin/assets/vendors/jquery.tagsinput.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('admin/assets/js/amaze.js') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('admin/assets/js/demo.js') }}"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>
</body>
</html>
