<header>
		<div class="topbar d-flex align-items-center">
			<nav class="navbar navbar-expand gap-3">
				<div class="topbar-logo-header d-none d-lg-flex">
					<div class="">
						<img src="assets/images/cropped-logo-clinica-montefiori-32x32.png" class="logo-icon" alt="Clínica Montefiori">
					</div>
					<div class="">
						<h4 class="logo-text">Clínica Montefiori</h4>
					</div>
				</div>
				<div class="mobile-toggle-menu d-block d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"><i class='bx bx-menu'></i></div>
				  <div class="top-menu ms-auto">
					<ul class="navbar-nav align-items-center gap-1"></ul>
				</div>

				<div class="user-box dropdown px-3">
					<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="assets/images/avatars/avatar-19.png" class="user-img" alt="user avatar">
						<div class="user-info">
							<p class="user-name mb-0"><?php echo $usuario; ?></p>
							<p class="designattion mb-0"><?php echo $roluser; ?></p>
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li><a class="dropdown-item d-flex align-items-center" href="perfil-de-usuario"><i class="bx bx-user fs-5"></i><span>Perfil de Usuario</span></a>
						</li>
						<li><a class="dropdown-item d-flex align-items-center" href="./salir"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
						</li>
					</ul>
				</div>

			</nav>
		</div>
</header>