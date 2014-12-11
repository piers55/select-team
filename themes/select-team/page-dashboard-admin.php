<?php
    if ( ! is_user_logged_in() ) {
        $location = site_url();
        wp_redirect( $location );
        exit;
    }

    $role = get_current_user_role();
    if( $role == 'subscriber' ) {
        $location = site_url().'/dashboard';
        wp_redirect( $location );
        exit;
    }
   $bp = get_info_current_advisor();
?>
<?php get_header(); ?>

    <div id="dashboard">
        <?php $advisor_info = get_advisor_basic_info(get_current_user_id()); ?>
        <!-- Page Content -->
        <div id="page-content-wrapper" class="[ margin-bottom ]">
            <div class="[ container-fluid ]" id="page-content">
                <a href="#menu-toggle" id="menu-toggle" class="[ hidden-md hidden-lg ]"><i class="[ fa fa-bars fa-2x ]"></i></a>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="profile">
                    <div class="[ col-xs-12 col-sm-7 ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3>Perfil</h3>
                        <?php } else { ?>
                            <h3>Basic Profile</h3>
                        <?php } ?>
                        <form id="userForm" role="form" class="[ row ]" >
                            
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="username">Nombre de usuario</label>
                                    <?php } else { ?>
                                        <label for="username">Username</label>
                                    <?php } ?>
                                    <p><?php echo $advisor_info->user_login; ?></p>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="email">Correo electrónico</label>
                                    <?php } else { ?>
                                        <label for="email">Email</label>
                                    <?php } ?>
                                    <p><?php echo $advisor_info->user_email; ?></p>
                                </div>
                            
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="full_name">Nombre completo</label>
                                    <input type="text" class="[ form-control ]" name="full_name_perfil" >
                                <?php } else { ?>
                                    <label for="full_name">Full name</label>
									<?php if(isset($bp)){ ?>
                                    <input type="text" class="[ form-control ]" name="full_name_perfil" value="<?php echo $bp->full_name; ?>" >
									<?php } else { ?>
										<input type="text" class="[ form-control ]" name="full_name_perfil" >
									<?php } ?>
                                <?php } ?>
                            </div>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <button type="button" class="[ btn btn-primary ]  [ margin-bottom ] [ btn-guardar-profile ]" id="subB">Guardar cambios</button>
                            <?php } else { ?>
                                <button type="button" class="[ btn btn-primary ]  [ margin-bottom ] [ btn-guardar-profile ]" id="subB">Save changes</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="prospects">
                    <div class="[ col-xs-12 col-sm-12 ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3 class="[ margin-bottom ]">Prospectos</h3>
                        <?php } else { ?>
                            <h3 class="[ margin-bottom ]">Prospects</h3>
                        <?php } ?>
                        
                        <div id="filters">
                            <div class=" center block clearfix margin-bottom ui-group prospect-filters">
                                <div class="[ isotope-filters-sports ]">
                                    <div class="[ prospects ] [ margin-bottom clearfix ] [ sportFilter button-group text-center ]" id="sportAll" data-active="">
                                        <button type="button" class="btn btn-primary sport" data-filter="*">All </button>
                                        <button type="button" class="btn btn-primary sport" data-filter=".tennis"><img src="<?php echo THEMEPATH; ?>images/tennis-icon.png" alt=""> <span class="hidden-xs">Tennis</span></button>
                                        <button type="button" class="btn btn-primary sport" data-filter=".golf"><img src="<?php echo THEMEPATH; ?>images/golf-icon.png" alt=""> <span class="hidden-xs">Golf</span></button>
                                        <button type="button" class="btn btn-primary sport" data-filter=".soccer"><img src="<?php echo THEMEPATH; ?>images/soccer-icon.png" alt=""> <span class="hidden-xs">Soccer</span></button>
                                        <button type="button" class="btn btn-primary sport" data-filter=".volleyball"><img src="<?php echo THEMEPATH; ?>images/volleyball-icon.png" alt=""> <span class="hidden-xs">Volleyball</span></button>
                                    </div>
                                    <div class="[ prospects ] [ center margin-bottom ] [ block ] [ clearfix ] [ genderFilter button-group text-center ]" id="genderAll" data-active="">
                                        <button type="button" class="btn btn-primary gender" data-filter="*">All</button>
                                        <button type="button" class="btn btn-primary gender" data-filter=".male">Male</button>
                                        <button type="button" class="btn btn-primary gender" data-filter=".female">Female</button>
                                    </div>
                                </div><!-- isotope-filters -->
                                <div class="[ margin-bottom ] [ sportContainer ] [ isotope-container-sports ]">
                                    <?php
                                    $users = get_users_basic_info(); 

                                    foreach ($users as $key => $user) 
                                        if($user->profile_picture!='') { ?>
                                            <a href="<?php echo site_url('prospects').'?p_id='.$user->id ?>">
                                                <div class="<?php echo $user->gender.' '.$user->sport; ?> player col-xs-5 col-sm-3 col-md-3 col-lg-2 clearfix margin-bottom">
                                                     <?php if ( $user->profile_picture != '' && $user->profile_picture != '-' ) { ?>
                                                    <img src="<?php echo THEMEPATH.'profile_pictures/'.$user->profile_picture ?>" alt="" class="">
                                                    <?php } elseif ($user->gender=='male') { ?>
                                                        <img src="<?php echo THEMEPATH.'profile_pictures/profile-01.png'?>" alt="" class="">
                                                    <?php } elseif ($user->gender=='female') { ?>
                                                        <img src="<?php echo THEMEPATH.'profile_pictures/profile-02.png'?>" alt="" class="">
                                                    <?php } ?>
                                                    <div class=" info">
                                                      <h4 class="center-text"> <?php echo $user->full_name; ?> </h4>
                                                      <p class="center-text">Sport: <span><?php echo $user->sport; ?></span></p>
                                                    </div>
                                                </div>
                                            </a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="advisors">
                    <div class="[ col-xs-12 col-sm-12 ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3 class="[ margin-bottom ]">Agentes</h3>
                        <?php } else { ?>
                            <h3 class="[ margin-bottom ]">Advisors</h3>
                        <?php } ?>
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
							<button class="[ btn btn-primary ] [ margin-bottom ] [ btn-registrar-nuevo ]"><i class="[ fa fa-plus ]"></i> Registrar agente</button>
                        <?php } else { ?>
							<button class="[ btn btn-primary ] [ margin-bottom ] [ btn-registrar-nuevo ]"><i class="[ fa fa-plus ]"></i> Register advisor</button>
                        <?php } ?>
						 <div class="clear"></div>
                        <div class="[ col-xs-12 col-md-6 ] [ hide-form-advisor ]">
                            <form id="userForm" role="form" class="[ row ] [ j-register-advisor ]" >
								<input type="hidden" class="[ form-control ]" name="id">
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="full_name">Nombre completo</label>
                                    <?php } else { ?>
                                        <label for="full_name">Full name</label>
                                    <?php } ?>
                                    <input type="text" class="[ form-control ]" name="full_name">
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="username">Nombre de usuario</label>
                                    <?php } else { ?>
                                        <label for="username">Username</label>
                                    <?php } ?>
                                    <input type="text" class="[ form-control ]" name="username">
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="email">Correo electrónico</label>
                                    <?php } else { ?>
                                        <label for="email">Email</label>
                                    <?php } ?>
                                    <input type="email" class="[ form-control ]" name="email"> 
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="password">Contraseña</label>
                                    <?php } else { ?>
                                        <label for="password">Password</label>
                                    <?php } ?>
                                    <input type="password" class="[ form-control ]" name="password">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="password">Confirmar contraseña</label>
                                    <?php } else { ?>
                                        <label for="password">Password Confirmation</label>
                                    <?php } ?>
									<input type="password" class="[ form-control ]" name="password_confirmation">
                                    <label for="validate" id="validate"></label>   
                                </div>
                                <div class="[ form-group ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ] [ btn-agregar ]" id="subB">Agregar agente</button>
									<button type="submit" class="[ btn btn-primary ]  [ margin-bottom ] [ btn-editar ]">Editar</button>
                                <?php } else { ?>
                                    <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ] [ btn-agregar ]" id="subB">Add Advisor</button>
									<button type="submit" class="[ btn btn-primary ]  [ margin-bottom ] [ btn-editar ]">Edit</button>
                                <?php } ?>
                            </form>
                        </div>
						</div>
						<div class="clear"></div>
						<?php 
							
							$users = get_advisors_basic_info(); 
							foreach ($users as $key => $user) {
						?>
                        <a href="#"><p class="[ col-xs-12 col-sm-6 ]"><i class="fa fa-briefcase"></i> <b><?php echo $user->full_name; ?></b> - <a href="mailto:<?php echo $user->user_email; ?>"><?php echo $user->user_email; ?></a><a href="#" data-id="<?php echo $user->ID; ?>" class="[ edit-advisor ]"> 
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            Editar
                        <?php } else { ?>
                            Edit
                        <?php } ?>
                         </a> </p></a>
					  <?php } ?>
                    
            </div>
        </div><!-- /#page-content-wrapper -->
    </div> <!-- /#dashboard -->
<?php get_footer(); ?>