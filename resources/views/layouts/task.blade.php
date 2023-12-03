<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="title" content="@yield('metaTitle') | Task Manager">
    <meta name="description" content="@yield('metaDescription')" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Title -->
    <title>@yield('metaTitle') | Task Manager</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('/images/icons/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('/images/icons/apple-icon-precomposed.png') }}">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- Additional Styles and Scripts -->
    <style type="text/css">
        .error {
            color: red;
        }

        .cursor-pointer {
            cursor: pointer;
        }

    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.datepicker').datepicker();
            $('.trigger-info').click(function () {
                var info = $(this).closest('.row-task-main').next('.row-task-info');
                $('.row-task-info').not(info).hide();
                if (info.is(':visible')) {
                    info.slideUp('fast');
                } else {
                    info.slideDown('slow');
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

