<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{url('assets/img/favicon.png')}}" />
    <title>MORUWASA BILLING SYSTEM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{url('css/fontastic.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('css/style.default.css')}}" id="theme-stylesheet">
    <link id="new-stylesheet" rel="stylesheet">
    
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('img/favicon.ico')}}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style type="text/css">
        /* Chart.js */
        
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }
        
        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }
        
        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        .btn-primary {
    color: color-yiq(#2A6481);
    background-color: #2A6481;
    border-color: #2A6481;
    border-color: #2A6481;
}

.btn-primary:hover {
    color: color-yiq(#173658);
    background-color: #173658;
    border-color: #503ce9;
}

.btn-primary:focus,
.btn-primary.focus {
    -webkit-box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
}

.btn-primary.disabled,
.btn-primary:disabled {
    color: color-yiq(#2A6481);
    background-color: #2A6481;
    border-color: #2A6481;
}

.btn-primary:not(:disabled):not(.disabled):active,
.btn-primary:not(:disabled):not(.disabled).active,
.show>.btn-primary.dropdown-toggle {
    color: color-yiq(#503ce9);
    background-color: #503ce9;
    border-color: #4631e7;
}

.btn-primary:not(:disabled):not(.disabled):active:focus,
.btn-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-primary.dropdown-toggle:focus {
    -webkit-box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
}

.btn-outline-primary {
    color: #2A6481;
    background-color: transparent;
    background-image: none;
    border-color: #2A6481;
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #2A6481;
    border-color: #2A6481;
}

.btn-outline-primary:focus,
.btn-outline-primary.focus {
    -webkit-box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
}

.btn-outline-primary.disabled,
.btn-outline-primary:disabled {
    color: #2A6481;
    background-color: transparent;
}

.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show>.btn-outline-primary.dropdown-toggle {
    color: color-yiq(#2A6481);
    background-color: #2A6481;
    border-color: #2A6481;
}

.btn-outline-primary:not(:disabled):not(.disabled):active:focus,
.btn-outline-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-primary.dropdown-toggle:focus {
    -webkit-box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
    box-shadow: 0 0 0 0.2rem rgba(121, 106, 238, 0.5);
}

a {
    color: #2A6481;
    text-decoration: none;
}

a:focus,
a:hover {
    color: #173658;
    text-decoration: underline;
}
.login-page .form-holder {
    width: 80%;
    border-radius: 5px;
    overflow: hidden;
    margin-bottom: 50px;
}

.login-page .form-holder .info {
    background: #2A6481;
    color: #fff;
}

@media (max-width: 991px) {
    .login-page .info,
    .login-page .form {
        min-height: auto !important;
    }
    .login-page .info {
        padding-top: 100px !important;
        padding-bottom: 100px !important;
    }
    .login-page .form-holder {
        width: 100%;
    }
}

.login-page .form-holder .info {
    background: #2A6481;
    color: #fff;
}
    </style>
</head>