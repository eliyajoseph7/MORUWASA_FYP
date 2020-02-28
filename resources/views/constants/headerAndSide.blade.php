

@section('content')
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> MORUWASA BILLING</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/datatable/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/datatable/dataTables.bootstrap4.min.css') }}">
    
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet"> -->
    

    <!-- Toastr style -->
    <link href="{{ url('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ url('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ url('css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css')}} " rel="stylesheet">
    {!! Charts::assets() !!}

    

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                      <div class="dropdown profile-element">
                      <img src="{{ url('img/logo.png') }}" width="130" height="100"  alt="logo">
                            
                            
                        </div>
                        <div class="logo-element">
                            MWS+
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{url ('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</a>
                        
                    </li>
                    
                    <li>
                        <a href="{{ url('/customers') }}"><i class="fa fa-users"></i> <span class="nav-label">Customers</span><span class="fa arrow"></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/domestic') }}">Domestic</a></li>
                            <li><a href="{{ url('/industry') }}">Industries</a></li>
                            <li><a href="{{ url('/institution') }}">Institution</a></li>
                            <li><a href="{{ url('/commercial') }}">Commercial</a></li>
                            <li><a href="{{ url('/tank') }}">Tanks</a></li>
                                                        
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map-signs"></i> <span class="nav-label">Activities</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/newMeter') }}">Register meter</a></li>
                            <li><a href="{{ url('/addCustomer') }}">Add customer</a></li>
                            
                            
                        </ul>
                    </li>
                    <!--<li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning float-right">16/24</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="mailbox.html">Inbox</a></li>
                            <li><a href="mail_detail.html">Email view</a></li>
                            <li><a href="mail_compose.html">Compose email</a></li>
                            <li><a href="email_template.html">Email templates</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Register Metre</span>  </a>
                    </li>
                    <li>
                        <a href="{{ url('/quality') }}"><i class="fa fa-flask"></i> <span class="nav-label">Water Quality</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/activities') }}"><i class="fa fa-edit"></i> <span class="nav-label">Activities</span></a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Activities</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/activities') }}">Projects</a></li>
                            <li><a href="">Calender</a></li>
                            <li><a href="{{ url('/tasks') }}">Tasks</a></li>
                            <li><a href="form_file_upload.html">File Upload</a></li>
                            <li><a href="form_editors.html">Text Editor</a></li>
                            <li><a href="form_autocomplete.html">Autocomplete</a></li>
                            <li><a href="form_markdown.html">Markdown</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                        
                    </li>      -->
                </ul>

            </div>
        </nav>
    </div>

    
    <div id="page-wrapper" class="gray-bg dashbard-1">
    
        <!-- Top bar -->
        <div id="app" class="row border-bottom">
        <nav class="navbar navbar-static-top navbar-expand-md navbar-light bg-white " style="margin-bottom: 1%">
            
                
        <div class="navbar-header mr-lg-auto">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        
                 <div>
                    <ul class="nav navbar-top-links navbar-right">
                        <!-- Authentication Links -->
                         @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}  <span class="caret"></span> 
                                 </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                
        </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        </div>
    <!-- Top bar end -->
    




 <!-- Mainly scripts -->
 <script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.js')}}"></script>
    <script src="{{url('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{url('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.pie.js')}}"></script>

    <!-- Peity -->
    <script src="{{url('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{url('js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{url('js/inspinia.js')}}"></script>
    <script src="{{url('js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{url('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- GITTER -->
    <script src="{{url('js/plugins/gritter/jquery.gritter.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{url('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{url('js/demo/sparkline-demo.js')}}"></script>

    <!-- ChartJS-->
    <script src="{{url('js/plugins/chartJs/Chart.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{url('js/plugins/toastr/toastr.min.js')}}"></script>


     