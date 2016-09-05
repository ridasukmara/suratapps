<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Aplikasi Surat
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    @if((Auth::user() && Auth::user()->isAdmin() || (Auth::guard('pegawais')->user())  ))

                    	@if((Auth::guard('pegawais')->user() && Auth::guard('pegawais')->user()->hak_akses()=='1' ))
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Surat <span class="caret"></span></a>
	                        <ul class="dropdown-menu">
	                            <li><a href="{{ url('/admin/klasifikasis') }}">Klasifikasi Surat</a></li>
	                            <li><a href="{{ url('/admin/sifatsurats') }}">Sifat Surat</a></li>                
	                            <li><a href="{{ url('/admin/haraps') }}">Harap</a></li> 
	                        </ul>             
	                    </li> 
	                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Surat Masuk<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        	@if(Auth::guard('pegawais')->user() && Auth::guard('pegawais')->user()->hak_akses()=='1' )
                            <li><a href="{{ url('suratmasuks/create') }}">Tambah Surat Masuk</a></li>
                            @endif
                            <li><a href="{{ url('suratmasuks') }}">Lihat Surat Masuk</a></li>                
                        </ul>             
                    </li>    

                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agenda<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/agendasuratmasuks') }}">Agenda Surat Masuk</a></li>
                            <li><a href="{{ url('admin/agendasuratkeluars') }}">Agenda Surat Keluar</a></li>                
                        </ul>             
                    </li>    

                    @endif
                    @if(Auth::user() && Auth::user()->isAdmin()==1)
                    


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Pegawai <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/admin/pegawais/create') }}">Tambah</a></li>
                            <li><a href="{{ url('/admin/pegawais') }}">Lihat</a></li>                
                        </ul>             
                    </li>    
                    @endif                    
                </ul>
                
                
                @if (( !Auth::guard('pegawais')->user() && !Auth::user() ))
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                         <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/login') }}">Admin</a></li>
                            <li><a href="{{ url('pegawai/login') }}">Pegawai</a></li>
                        </ul>             
                    </li>    
                </ul>
                @else
                <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->                    
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if(Auth::user() && Auth::user()->isAdmin())
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                @elseif(Auth::guard('pegawais'))
                                    {{ Auth::guard('pegawais')->user()->nama_pegawai }} <span class="caret"></span>
                                @endif
                            </a>
                            

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user() && Auth::user()->isAdmin())
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                @elseif(Auth::guard('pegawais')->user())
                                    <li><a href="{{ url('pegawai/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                @endif
                                
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>            
        </div>        
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
  

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <!-- jQuery -->
<script src="{{ URL::asset('js/jquery.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready (function(){
    	$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    	$(".alert").slideUp(500);
		});
	});
</script>
</body>
</html>
