<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<title>@yield('title')</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('/images/logo-login.png')}}" />
	<link rel="canonical" href="https://demo-basic.adminkit.io/" />
	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/@adminkit/core@latest/dist/css/app.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
	@yield('header')
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{route('dashboard_user')}}">
					<span class="align-middle">Manajemen Desa</span>
				</a>

				<ul class="sidebar-nav">
					@auth
					@if(Route::is('penduduk','tambah_penduduk','data_penduduk','data_rukun_tetangga'))
					<li class="sidebar-item" data-bs-toggle="pill">
						<a class="sidebar-link" href="{{route('penduduk')}}">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route ('data_penduduk') }}">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Total Penduduk</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route ('data_rukun_tetangga') }}">
							<i class="align-middle" data-feather="home"></i> <span class="align-middle">Rukun Tetangga</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route ('user') }}">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Jumlah Keluarga</span>
						</a>
					</li>
					@elseif(Route::is('anggaran'))

					@elseif(Route::is('spk'))

					@else
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route ('user') }}">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('dashboard_user')}}">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					@endif
					@else
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('dashboard')}}">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					@endauth
				</ul>
				@auth

				@else
				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<a class="sidebar-link" href="{{route('login')}}">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Log In</span>
						</a>
					</div>
				</div>
				@endauth
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<ul class="navbar-nav ms-auto">
							<!-- Authentication Links -->
							@guest
							@if (Route::has('login'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							@endif

							@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
							@endif
							@else
							<!-- Button trigger modal -->
							<button id="button-modal-nav" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-master">
								{{ Auth::user()->name }}
							</button>

							<!-- Modal -->
							<div class="modal fade" id="modal-master" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">{{ Auth::user()->name }}</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="card-body text-center">
												<img src="{{asset('storage/'.Auth::user()->image)}}" alt="avatar" class="rounded-circle " style="width: 150px;">
												<h5 class="my-3">{{ Auth::user()->name }}</h5>
												<p class="text-muted mb-1">{{ Auth::user()->jabatan }}</p>
												<p class="text-muted mb-4">{{ Auth::user()->NIP }}</p>
											</div>
										</div>
										<div class="modal-footer">
											<a class="btn btn-primary" href="{{ route('user') }}">Reset Password {{ Auth::user()->name }}</a>
											<button type="button" class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
												{{ __('Logout') }} {{ Auth::user()->name }}
											</button>
											<a href="{{route('edit_user')}}" type="button" class="btn btn-success">Edit {{ Auth::user()->name }}</a>
										</div>
									</div>
								</div>
							</div>

							<!-- Hidden File -->
							<li class="nav-item dropdown" style="display: none;">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</div>
							</li>
							<!-- Hidden File -->
							@endguest
						</ul>
					</ul>
				</div>
			</nav>
			@yield('navbar')

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Dimas Wisnu Wirawan</strong></a>&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script type="text/javascript">
		$(".sidebar-nav a").on("click", function() {
			$(".sidebar-nav").find(".active").removeClass("active");
			$(this).parent().addClass("active");
		});
	</script>
	<script src="js/app.js"></script>
	<script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	@yield('footer')

</body>

</html>