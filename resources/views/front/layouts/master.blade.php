<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Employee Self Service Data</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ URL::asset('assets/modules/jqvmap/dist/jqvmap.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/weather-icon/css/weather-icons.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/summernote/summernote-bs4.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/datatables/datatables.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/select2/dist/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/jquery-selectric/selectric.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/mycss.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/components.css')}}">
    
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>

            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="{{ url('/') }}" class="navbar-brand sidebar-gone-hide">BCreative Kontrakan</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ url('jeniskamar') }}"
                                class="nav-link">Kamar</a></li>
                        <li class="nav-item"><a href="{{ url('ketentuan') }}"
                                class="nav-link">Ketentuan</a></li>
                    </ul>
                </div>
                {{-- <ul class="navbar-nav navbar-right ml-auto">
                    <figure class="avatar ">
                        <img src="{{ URL::asset('user-images/' . Auth::user()->profile_pic) }}" alt="...">
                    </figure>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">Logged {{ \Carbon\Carbon::parse(Auth::user()->last_login_at)->diffForHumans() }}
                        </div>
                        <a href="{{ url('myprofile') }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
            
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </div>
                    </li>
                </ul> --}}
            </nav>
            
            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item active">
                        <li class="nav-item">
                            <a href="/cuti" class="nav-link"><i
                                    class="fas fa-online"></i><span>Test1</span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')
            <footer class="main-footer">
                <div class="footer-left">
                    Employee Self Service &copy; 2020 <div class="bullet"></div> Design By stisla
                </div>                
            </footer>
        </div>
    </div>

    @yield('script')
    <!-- General JS Scripts -->
    <script src="{{ URL::asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/modules/popper.js')}}"></script>
    <script src="{{ URL::asset('assets/modules/tooltip.js')}}"></script>
    <script src="{{ URL::asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ URL::asset('assets/modules/moment.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{ URL::asset('assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/chart.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/datatables/datatables.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
	<script src="{{ URL::asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{ URL::asset('assets/modules/sweetalert/sweetalert.min.js')}}"></script>
    
    <!-- Page Specific JS File -->
    <script src="{{ URL::asset('assets/js/page/index-0.js')}}"></script>
	<script src="{{ URL::asset('assets/js/page/modules-datatables.js')}}"></script>
    <script src="{{ URL::asset('assets/js/page/forms-advanced-forms.js')}}"></script>
    
    <!-- Template JS File -->
    <script src="{{ URL::asset('assets/js/scripts.js')}}"></script>
    <script src="{{ URL::asset('assets/js/custom.js')}}"></script>
</body>

</html>