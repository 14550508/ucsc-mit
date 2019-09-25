<body>
	<div class="preloader">
		<img src="<?= base_url() ?>public/img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= base_url() ?>">
					<img src="<?= base_url(); ?>/public/img/logo.png">
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
				<?php if($this->session->userdata('is_logged_in') == TRUE ){ ?>
				 <li><a href="<?= base_url(); ?><?= $this->session->userdata('username'); ?>" class="btn btn-green">My Profile</a></li>
                    <li><a href="<?= base_url() ?>usersAuth/logout" class="btn btn-blue">Logout</a></li>
				<?php } else { ?> 
					<li><a href="#" data-toggle="modal" data-target="#login" class="btn btn-green">Login</a></li>
				<?php } ?>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>