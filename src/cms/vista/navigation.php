<?php
if($roluser=='SUPERADMIN'){
	$muestra_menu = ' style="display: block;" ';
}else{
	$muestra_menu = ' style="display: none;" ';
}
?>
<div class="primary-menu">
   <nav class="navbar navbar-expand-lg align-items-center">
	  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
		<div class="offcanvas-header border-bottom">
			<div class="d-flex align-items-center">
				<div class="">
					<img src="assets/images/cropped-logo-clinica-montefiori-32x32.png" class="logo-icon" alt="Clínica Montefiori">
				</div>
				<div class="">
					<h4 class="logo-text">Clínica Montefiori</h4>
				</div>
			</div>
		  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
		  <ul class="navbar-nav align-items-center flex-grow-1">
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
					<div class="parent-icon"><i class='bx bx-home-alt'></i>
					</div>
					<div class="menu-title d-flex align-items-center">Dashboard </div>
					<div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
				</a>
				<ul class="dropdown-menu scroll-menu ps ps--active-y">
					<?php 
					    $caracter = "-add";    					
						foreach ($rol_page_user as $permipage) {
							$parte_posterior = strstr($permipage, $caracter);
							if($parte_posterior!='-add'){
					?>
					<li><a class="dropdown-item" href="<?php echo urls_page_cms($permipage); ?>"><i class='bx bx-bar-chart-alt-2'></i><?php echo ($permipage); ?></a></li>
					<?php 
							} 
						}
					?>
				</ul>
			</li>
	  
		  <li class="nav-item dropdown" <?php echo $muestra_menu; ?> >
			<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
				<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
				</div>
				<div class="menu-title d-flex align-items-center">APIS</div>
				<div class="ms-auto dropy-icon"><i class='bx bx-chevron-down'></i></div>
			</a>
			<ul class="dropdown-menu">
				<li> <a class="dropdown-item" href="medicos"><i class='bx bx-message-square-dots'></i>Médicos</a>
				</li>
				<li> <a class="dropdown-item" href="especialidades"><i class='bx bx-book-content'></i>Especialidades</a>
				</li>
				<li> <a class="dropdown-item" href="nosotros"><i class='bx bx-info-square'></i>Página Nosotros</a>
				</li>					
			</ul>
		  </li>
			  

		  </ul>
		</div>
	  </div>
  </nav>
</div>