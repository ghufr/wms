<nav class="navbar navbar-expand-lg navbar-light bg-light px-md-5 position-fixed shadow-sm" id="top-navbar">
	<div class="d-flex justify-content-between align-items-center w-100">
		<div>
			{{-- <button class="btn align-middle" type="button" id="menu-toggle">
				<span class="navbar-toggler-icon"></span>
			</button> --}}
			<h5 class="mb-0 font-weight-bold">
				@yield('title')
			</h5>

		</div>
		<div>
			<div class="dropdown">
				<button class="btn btn-light" type="button" data-toggle="dropdown">
					<span class="font-weight-bold mr-2">
						Ghufron F
					</span>
					<img class="img-fluid rounded-circle" width="32px" height="32px" src="https://via.placeholder.com/60" alt="Profile">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
					</svg>
				</button>
					<div class="dropdown-menu border-0 shadow">
						<a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
						<!-- <a href="#">Profile</a> -->
						<div class="dropdown-divider"></div>
						<a class="dropdown-item text-danger" href="{{ route('auth.logout') }}">Logout</a>

					</div>
			</div>
		</div>
	</div>
</nav>