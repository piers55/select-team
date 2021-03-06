<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Select Team</title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.png">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<!--FONT AWESOME-->
	    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	    <!--TYPEKIT-->
	    <script src="//use.typekit.net/nwo2lbv.js"></script>
	    <script>try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
	</head>
	<?php $page_slug; if(is_page()) { $page_slug = 'page-'.$post->post_name; } ?>

	<body <?php

		if(is_page()){
			body_class($page_slug);
		} else {
			body_class();
		}

		if ( is_user_logged_in() ){
			$role = get_current_user_role();

			if ( $role == 'subscriber' ){
				$dashboard = 'dashboard';
				$user = get_user_basic_info(get_current_user_id()); 
			} else {
				$dashboard = 'dashboard-admin';
				$user = get_advisor_basic_info(get_current_user_id()); 
			}
		}

		?> >
	    <div class="[ container-fluid ]">
	    	<?php if( !is_page('dashboard') AND !is_page('dashboard-admin') AND !is_page('register-advisor') AND !is_page('admin-advisor-single') ) { ?>
				<header class="[ clearfix ] [ header__frontend ]">
					<nav class="[ hidden-md hidden-lg ] [ navbar navbar-default ]" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="[ navbar-header ]">
						  <button type="button" class="[ navbar-toggle collapsed ]" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="[ sr-only ]"></span>
							<i class="[ fa fa-bars ]"></i>
						  </button>
						  <a class="[ navbar-brand ]" href="<?php echo site_url(); ?>"><img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/logo-select-team-mobile.png" alt=""></a>
						</div>
						<div class="[ collapse navbar-collapse navbar-mobile ]" id="bs-example-navbar-collapse-1">
							<ul class="[ nav navbar-nav ]">
								<li class="[ menu ]"><a href="<?php echo site_url('acerca'); ?>">About</a></li>
								<li class="[ menu ]"><a href="<?php echo site_url('prospecto'); ?>">Prospects</a></li>
								<li class="[ menu ]"><a href="<?php echo site_url('padre'); ?>">Parents</a></li>
								<li class="[ menu ]"><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
								<li class="[ menu ]">
									<?php if ( ! is_user_logged_in() ) { ?>
										<?php if (qtrans_getLanguage() == 'es'){ ?>
											<a href="" data-toggle="modal" data-target="#login"><i class="[ fa fa-sign-in ]"></i> Inicia sesión</a>
										<?php } else { ?>
											<a href="" data-toggle="modal" data-target="#login"><i class="[ fa fa-sign-in ]"></i> Login</a>
										<?php } ?>
									<?php } else { 
									?>
										<p><a href="'<?php echo site_url('.$dashboard.'); ?>'"><i class="fa fa-user"></i></a></p>
										<p> <i class="[ fa fa-sign-out ]"></i> Mi cuenta<a href="<?php echo  esc_url( wp_logout_url(site_url()) ); ?>"> Logout</a> </p>
									<?php } ?>
								</li>
								<li class="[ menu ]">
									<?php echo qtrans_generateLanguageSelectCode('text'); ?>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</nav>
					<div class="[ container ] [ hidden-xs hidden-sm ] [ header-top ] [ clearfix ]">
						<input type="hidden" id="current_url" value="<?php echo site_url(); ?>"/>
						<h1>
							<a
								<?php if (qtrans_getLanguage() == 'es'){ ?>
									href="<?php echo site_url('es/'); ?>"
								<?php } else { ?>
									href="<?php echo site_url('en/'); ?>"
								<?php } ?>
							>
								<img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/logo-select-team.png" alt="Select Team"/>
							</a>
						</h1><ul class="[ desktop-nav ] [ clearfix ]">
							<li><a class="[ center block ] <?php if( get_post_type() == 'acerca' ){ echo 'active'; } ?>"
								<?php if (qtrans_getLanguage() == 'es'){ ?>
									href="<?php echo site_url('es/acerca/'); ?>">
									Acerca
								<?php } else { ?>
									href="<?php echo site_url('en/acerca/'); ?>">
									About
								<?php } ?>
							</a></li>
							<li><a class="[ center block ] <?php if( get_post_type() == 'prospecto' ){ echo 'active'; } ?>"
								<?php if (qtrans_getLanguage() == 'es'){ ?>
									 href="<?php echo site_url('es/prospecto/'); ?>">
									Prospectos
								<?php } else { ?>
									href="<?php echo site_url('en/prospecto/'); ?>">
									Prospects
								<?php } ?>
							</a></li>
							<li><a class="[ center block ] <?php if( get_post_type() == 'padre' ){ echo 'active'; } ?>"
								<?php if (qtrans_getLanguage() == 'es'){ ?>
									href="<?php echo site_url('es/padre/'); ?>">
									Padres
								<?php } else { ?>
									href="<?php echo site_url('en/padre/'); ?>">
									Parents
								<?php } ?>
							</a></li>
							<li><a class="[ center block ] <?php if( is_page('contacto') ){ echo 'active'; } ?>"
								<?php if (qtrans_getLanguage() == 'es'){ ?>
									href="<?php echo site_url('es/contact/'); ?>">
									Contacto
								<?php } else { ?>
									href="<?php echo site_url('en/contact/'); ?>">
									Contact
								<?php } ?>
							</a></li>
						</ul>
						<div class="[ registro ]">
							<?php if ( ! is_user_logged_in() ) { ?>
								<?php if (qtrans_getLanguage() == 'es'){ ?>
									<a href="" data-toggle="modal" data-target="#login"> <i class="[ fa fa-sign-in ]"></i> Inicia sesión</a>
								<?php } else { ?>
									<a href="" data-toggle="modal" data-target="#login"> <i class="[ fa fa-sign-in ]"></i> Login</a>
								<?php } ?>
							<?php } else { ?>
								<p><a href="<?php echo site_url().'/'.$dashboard ?>"><i class="fa fa-user"></i> Mi cuenta</a></p>
								<p> <i class="[ fa fa-sign-out ]"></i> <a href="<?php echo esc_url( wp_logout_url(site_url()) ); ?>"> Logout</a> </p>
							<?php } ?>
								<div class="clear"></div>
							<?php echo qtrans_generateLanguageSelectCode('text'); ?>
						</div>
					</div>
					<?php if(is_home()){ ?>
						<div class="start-screen">
							<img class="[ img-responsive ] [ center block ]" src="<?php echo THEMEPATH; ?>images/logo-select-team.png" alt="">
							<?php if (qtrans_getLanguage() == 'es'){ ?>
								<h2 class="[ text-center ][ center block ][ margin-bottom ]">Select Team crea oportunidades de beca para atletas estudiantes para jugar y estudiar en universidades de Estados Unidos.</h2>
							<?php } else { ?>
								<h2 class="[ text-center ][ center block ][ margin-bottom ]">We can help you get an athletic scholarship in the USA!</h2>
							<?php } ?>
							<div class="[ row ] [ banner-sports ] [ hidden-xs ]">
								<img class="" src="<?php echo THEMEPATH; ?>images/start-screen-01.jpg" alt="">
								<img class="" src="<?php echo THEMEPATH; ?>images/start-screen-02.jpg" alt="">
								<img class="" src="<?php echo THEMEPATH; ?>images/start-screen-03.jpg" alt="">
								<img class="" src="<?php echo THEMEPATH; ?>images/start-screen-04.jpg" alt="">
							</div>
							
						</div>
						<div class="[ header-bottom ]">
							<div class="[ container ]">
								<p class="[ text-center ] [ col-xs-12 col-md-9 ] [ center block ]">
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										Select Team crea oportunidades de beca para atletas estudiantes para jugar y estudiar en universidades de Estados Unidos.
									<?php } else { ?>
										Select Team creates scholarship opportunities for student athletes to play sports and study at universities in the United States.
									<?php } ?>
								</p>
								<img class="[ col-xs-6 col-sm-5 col-md-2 ] [ center block ]" src="<?php echo THEMEPATH; ?>images/icon-sports.png" alt="">
							</div>
						</div>
					<?php } ?>
				</header>
	        	<div class="[ content ] [ clearfix ]">
	        <?php } else { ?>
	        	<header id="sidebar-wrapper" class="[ header__dashboard ]">
	        		<div class="relative">
						<ul class="sidebar-nav">
							<li class="header__dashboard__top">
								<h1>
									<a
										<?php if (qtrans_getLanguage() == 'es'){ ?>
											href="<?php echo site_url('es/'); ?>"
										<?php } else { ?>
											href="<?php echo site_url('en/'); ?>"
										<?php } ?>
									>
										<img class="[ img-responsive ]" src="<?php echo THEMEPATH; ?>images/logo-select-team.png" alt="Select Team"/>
									</a>
								</h1>
								<?php if ( ! is_user_logged_in() ) { ?>
									<a class="[ text-center ]" href="" data-toggle="modal" data-target="#login"><i class="[ fa fa-sign-in ]"></i> Login</a>
								<?php } else { ?>
									<a class="[ text-center ]" href="<?php echo esc_url( wp_logout_url(site_url()) ); ?>"><i class="[ fa fa-sign-out ]"></i> Logout</a>
								<?php } ?>
								<?php echo qtrans_generateLanguageSelectCode('text'); ?>
							</li>
							
							<!-- Para el dashboard de usario -->
							<?php 
							if($role == 'subscriber'){
							?>
								<li class="sidebar-brand">
									<a class="[ js-page-scroll ]"><i class="fa fa-cogs"></i> Dashboard</a>
								</li>
								<li>
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-profile ]"><i class="fa fa-user"></i> Perfil</a>
									<?php } else { ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-profile ]"><i class="fa fa-user"></i> Profile</a>
									<?php } ?>
								</li>
								<li>
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-curriculum ]"><i class="fa fa-file-o"></i> Currículum</a>
									<?php } else { ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-curriculum ]"><i class="fa fa-file-o"></i> Curriculum</a>
									<?php } ?>
								</li>
								<li>
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-messages ]"><i class="fa fa-envelope-o"></i> Mensajes</a>
									<?php } else { ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-messages ]"><i class="fa fa-envelope-o"></i> Messages</a>
									<?php } ?>
								</li>
								<li class="j-download">
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<a href="#" type="download"><i class="fa fa-download"></i> Manual de aplicante</a>
									<?php } else { ?>
										<a href="#" type="download"><i class="fa fa-download"></i> Applicant manual</a>
									<?php } ?>
								</li>
							<?php } else { ?>
								<!-- Para el dashboard de admin -->
								<li>
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-profile-admin ]"><i class="fa fa-user"></i> Perfil</a>
									<?php } else { ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-profile-admin ]"><i class="fa fa-user"></i> Profile</a>
									<?php } ?>
								</li>
								<li>
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-prospects ]"><i class="fa fa-file-o"></i> Prospectos</a>
									<?php } else { ?>
										<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-prospects ]"><i class="fa fa-file-o"></i> Prospects</a>
									<?php } ?>
								</li>
								<?php if( $role != 'author' ) { ?>
									<li>
										<?php if (qtrans_getLanguage() == 'es'){ ?>
											<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-advisors ]"><i class="fa fa-briefcase"></i> Agentes</a>
										<?php } else { ?>
											<a href="#" class="[ js-page-scroll ] [ dashboard-menu ] [ js-advisors ]"><i class="fa fa-briefcase"></i> Advisors</a>
										<?php } ?>
									</li>
								<?php } ?>
								<li>
									<?php if (qtrans_getLanguage() == 'es'){ ?>
										<a href="#messages" class="[ js-page-scroll ] [ dashboard-menu ] [ js-messages-admin ]"><i class="fa fa-envelope-o"></i> Mensajes</a>
									<?php } else { ?>
										<a href="#messages" class="[ js-page-scroll ] [ dashboard-menu ] [ js-messages-admin ]"><i class="fa fa-envelope-o"></i> Messages</a>
									<?php } ?>
								</li>
							<?php }  ?>
							<!-- Para el register usuario o advisor -->
						</ul>
						<div class="[ dashboard__privacy-policy ] [ clearfix ]">
							<?php if (qtrans_getLanguage() == 'es'){ ?>
								<a class="[ btn btn-success ] [ center block ]" href="<?php echo site_url('privacy-policy'); ?>">Aviso de Privacidad.</a>
				            	<p class="[ col-xs-12 ] [ text-center ]" href="">Todos los derechos reservados. <br class="[ hidden-sm hidden-md hidden-lg ]"> Select Team Becas 2014</p>
							<?php } else { ?>
								<a class="[ btn btn-success ] [ center block ]" href="<?php echo site_url('privacy-policy'); ?>">Privacy Policy</a>
				            	<p class="[ col-xs-12 ] [ text-center ]" href="">All rights reserved. <br class="[ hidden-sm hidden-md hidden-lg ]"> Select Team Becas 2014</p>
							<?php } ?>
						</div>
					</div>
	        	</header> <!-- /#sidebar-wrapper -->
	        	<div class="[ content content__dashboard ] [ clearfix ]">
	        <?php } ?>