<?php $this->load->view("templates/header.php") ?>

	<!-- Navbar -->
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="<?= base_url(); ?>admin">Claire Skin</a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Profil Image/Logout -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
				 aria-expanded="false">
					<img src="<?=base_url()?>assets/img/img3.png" alt="" class="rounded-circle">
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
				</div>
			</li>
		</ul>
		<!-- end Profil Image/Logout -->

	</nav>
	<!-- end Navbar -->

	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="sidebar navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="<?=base_url();?>admin">
					<!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
					<span>Dashboard</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url();?>produk">
					<!-- <i class="fas fa-fw fa-chart-area"></i> -->
					<span>Produk</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=base_url();?>pesanan">
					<!-- <i class="fas fa-fw fa-chart-area"></i> -->
					<span>Pesanan</span></a>
			</li>
			<!-- <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
				 aria-expanded="false">
					<i class="fas fa-fw fa-folder"></i>
					<span>Pages</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<h6 class="dropdown-header">Login Screens:</h6>
					<a class="dropdown-item" href="login.html">Login</a>
					<a class="dropdown-item" href="register.html">Register</a>
					<a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
					<div class="dropdown-divider"></div>
					<h6 class="dropdown-header">Other Pages:</h6>
					<a class="dropdown-item" href="404.html">404 Page</a>
					<a class="dropdown-item" href="blank.html">Blank Page</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="charts.html">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Charts</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tables.html">
					<i class="fas fa-fw fa-table"></i>
					<span>Tables</span></a>
			</li> -->
		</ul>
		<!-- end Sidebar -->

		<!-- content-wrapper -->
		<div id="content-wrapper">