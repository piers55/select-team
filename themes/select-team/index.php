
<?php 
//header("Location: ".site_url()."\?login=paused");
get_header(); ?>

    <div class="[ grid ]">
        <?php 
        if ( is_user_logged_in() ) { ?>
            <figure class="[ effect-sadie ] [ col-xs-12 ] [ bg-prospect ] [ j-already-prospect ]">
                <div class="[ screen ]"></div>
                <figcaption>
                    <h2 class="">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            Ir a mi cuenta
                        <?php } else { ?>
                            Go to my dashboard
                        <?php } ?>
                    </h2>
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <a href="<?php echo site_url('es/dashboard/') ?>"></a>
                    <?php } else { ?>
                        <a href="<?php echo site_url('en/dashboard/') ?>"></a>
                    <?php } ?>
                </figcaption>
            </figure>
        <?php } else { ?>
            <figure class="[ effect-sadie ] [ col-xs-6 ] [ bg-prospect ]" data-cards="prospect">
                <div class="[ screen ]"></div>
                <figcaption>
                    <h2 class="">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            Convertirse en prospecto
                        <?php } else { ?>
                            Become a prospect
                        <?php } ?>
                    </h2>
                    <a href="#"></a>
                </figcaption>
            </figure>
            <figure class="[ effect-sadie ] [ col-xs-6 ] [ bg-coach ]" data-cards="coach">
                <div class="[ screen ]"></div>
                <figcaption>
                    <h2 class="[ center block ] [  ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            Soy coach
                        <?php } else { ?>
                            I am a coach
                        <?php } ?>
                    </h2>
                    <a href="#"></a>
                </figcaption>
            </figure>
        <?php } ?>
    </div>
    <div class="[ cards cards-prospect cards-xs ] [ is-closed ]">
        <div class="card-close">
            <i class="fa fa-times"></i>
        </div>
        <div class="[ card card-2 ] [ is-closed ]">
            <form id="theForm" class="[ simform ] [ center block ]" autocomplete="off">
                <div class="simform-inner">
                    <ol class="questions">
                        <li>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q1">¿Cuál es tu nombre?</label></span>
                            <?php } else { ?>
                                <span><label for="q1">What's your name?</label></span>
                            <?php } ?>
                            <input id="q1" name="q1" type="text"/>
                        </li>
                        <li>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q2">Género</label></span>
                                <select class="[ form-control ]" id="q2" name="q2">
                                    <option value="chooseOne">Selecciona uno</option>
                                    <option value="female">Mujer</option>
                                    <option value="male">Hombre</option>
                                </select>
                            <?php } else { ?>
                                <span><label for="q2">Gender</label></span>
                                <select class="[ form-control ]" id="q2" name="q2">
                                    <option value="chooseOne">Choose one</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                </select>
                            <?php } ?>
                        </li>
                        <li>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q3">¿Cuándo naciste?</label></span>
                            <?php } else { ?>
                                <span><label for="q3">When were you born?</label></span>
                            <?php } ?>
                            <input type="text" id="datepicker" name="q3" >
                        </li>
                        <li>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q4">¿Cuál es tu e-mail?</label></span>
                            <?php } else { ?>
                                <span><label for="q4">What's your e-mail address?</label></span>
                            <?php } ?>
                            <input id="q6" name="q4" type="email" class="[ required email ]" />
                        </li>
                        <li>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q5">¿Qué deporte practicas?</label></span>
                                <select class="[ form-control ]" id="q5" name="q5">
                                    <option value="chooseOne">Selecciona uno</option>
                                    <option value="tennis">Tennis</option>
                                    <option value="golf">Golf</option>
                                    <option value="soccer">Soccer</option>
                                    <option value="volleyball">Volleyball</option>
                                </select>
                            <?php } else { ?>
                                <span><label for="q5">What sport do you practice?</label></span>
                                <select class="[ form-control ]" id="q5" name="q5">
                                    <option value="chooseOne">Choose one</option>
                                    <option value="tennis">Tennis</option>
                                    <option value="golf">Golf</option>
                                    <option value="soccer">Soccer</option>
                                    <option value="volleyball">Volleyball</option>
                                </select>
                            <?php } ?>
                        </li>
                        <!-- GOLF -->
                        <li class="[ js-sport js-golf ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q6">¿Cuál es tu puntaje promedio?</label></span>
                            <?php } else { ?>
                                <span><label for="q6">What's your average score?</label></span>
                            <?php } ?>
                            <select class="[ form-control ]" id="q6" name="q6">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <option value="chooseOne">Selecciona uno</option>
                                    <option value="-66">Menos de 66</option>
                                <?php } else { ?>
                                    <option value="chooseOne">Choose one</option>
                                    <option value="-66">Under 66</option>
                                <?php } ?>
                                <option value="66-67">66-67</option>
                                <option value="68-70">68-70</option>
                                <option value="71-73">71-73</option>
                                <option value="74-76">74-76</option>
                                <option value="77-79">77-79</option>
                                <option value="80-82">80-82</option>
                                <option value="83-85">83-85</option>
                                <option value="86-88">86-88</option>
                                <option value="89-90">89-90</option>
                            </select>
                        </li>
                        <!-- VOLLEYBALL -->
                        <li class="[ js-sport js-volleyball ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q7">¿Qué posición eres?</label></span>
                            <?php } else { ?>
                                <span><label for="q7">What's your position?</label></span>
                            <?php } ?>
                            <select class="[ form-control ]" id="q7" name="q7">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <option value="chooseOne">Selecciona uno</option>
                                <?php } else { ?>
                                    <option value="chooseOne">Choose one</option>
                                <?php } ?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </li>
                        <li class="[ js-sport js-volleyball ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q8">¿Cuánto mides? (en centimetros)</label></span>
                            <?php } else { ?>
                                <span><label for="q8">What's your height? (in centimeters)</label></span>
                            <?php } ?>
                            <input id="q8" name="q8" type="number"/>
                        </li>
                        <!-- TENNIS -->
                        <li class="[ js-sport js-tennis ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q9">¿Eres zurdo o diestro?</label></span>
                                <select class="[ form-control ]" id="q9" name="q9">
                                    <option value="chooseOne">Selecciona uno</option>
                                    <option value="rightHand">Diestro</option>
                                    <option value="leftHand">Zurdo</option>
                                </select>
                            <?php } else { ?>
                                <span><label for="q9">Are you left or right handed?</label></span>
                                <select class="[ form-control ]" id="q9" name="q9">
                                    <option value="chooseOne">Choose one</option>
                                    <option value="rightHand">Right handed</option>
                                    <option value="leftHand">Left handed</option>
                                </select>
                            <?php } ?>
                        </li>
                        <li class="[ js-sport js-tennis ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <span><label for="q10">¿Cuál es tu ranking FMT? (sólo jugadores mexicanos)</label></span>
                            <?php } else { ?>
                                <span><label for="q10">What's your FMT ranking? (Mexican players only)</label></span>
                            <?php } ?>
                            <input id="q10" name="q10" type="number"/>
                        </li>
                        <li class="[ js-sport js-tennis ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <span><label for="q11">¿Has jugado un torneo ATP?</label></span>
                            <select class="[ form-control ]" id="q11" name="q11">
                                <option value="chooseOne">Selecciona uno</option>
                                <option value="yes">Sí </option>
                                <option value="no">No </option>
                            </select>
                            <?php } else { ?>
                                <span><label for="q11">Have you ever played an ATP tournament?</label></span>
                                <select class="[ form-control ]" id="q11" name="q11">
                                    <option value="chooseOne">Choose one</option>
                                   <option value="yes">Yes </option>
                                <option value="no">No </option>
                                </select>
                            <?php } ?>

                        </li>
                        <!-- SOCCER -->
                        <li class="[ js-sport js-soccer ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q12">¿Qué posición eres?</label></span>
                                <select class="[ form-control ]" id="q12" name="q12">
                                    <option value="chooseOne">Selecciona uno</option>
                                    <option value="goal-keeper">Portero</option>
                                    <option value="defender">Defensa</option>
                                    <option value="midfielder">Medio</option>
                                    <option value="forward">Delantero</option>
                                </select>
                            <?php } else { ?>
                                <span><label for="q12">What's your position?</label></span>
                                <select class="[ form-control ]" id="q12" name="q12">
                                    <option value="chooseOne">Choose one</option>
                                    <option value="goal-keeper">Goal keeper</option>
                                    <option value="defender">Defender</option>
                                    <option value="midfielder">Midfielder</option>
                                    <option value="forward">Forward</option>
                                </select>
                            <?php } ?>
                        </li>
                        <li class="[ js-sport js-soccer ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q13">¿Cuánto mides? (en centimetros)</label></span>
                            <?php } else { ?>
                                <span><label for="q13">What's your height? (in centimeters)</label></span>
                            <?php } ?>
                            <input id="q13" name="q13" type="number"/>
                        </li>
                    </ol><!-- /questions -->
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <button class="submit" type="submit">Enviar</button>
                    <?php } else { ?>
                        <button class="submit" type="submit">Send</button>
                    <?php } ?>
                    <div class="controls">
                        <div class="progress"></div>
                        <button class="[ next ] [ right ]"></button>
                        <span class="number">
                            <span class="number-current"></span>
                            <span class="number-total"></span>
                        </span>
                        <span class="error-message"></span>
                    </div><!-- / controls -->
                </div><!-- /simform-inner -->
                <span class="final-message"></span>
            </form><!-- /simform -->
        </div>
        <div class="card">
            <p class="simform">
                <?php if (qtrans_getLanguage() == 'es'){ ?>
                    Como prospecto, tu perfil aparecerá en Select Team para que los coaches lo vean, te contacten y hablen sobre becas deportivas en sus universidades en Estados Unidos.
                <?php } else { ?>
                    As a prospect, your profile will be listed in Select Team for coaches to view, get in touch, and talk about sport scholarships at their universities in the United States.
                <?php } ?>
            </p>
            <button class="[ btn btn-primary ][ btn-card-next ] [ js-next-card ]" data-card="card-2">
                <?php if (qtrans_getLanguage() == 'es'){ ?>
                    Siguiente
                <?php } else { ?>
                    Next
                <?php } ?>
                <i class="fa fa-arrow-right"></i>
            </button>
        </div>
    </div><!-- cards prospect -->
    <div class="[ cards cards-coach cards-xs ] [ is-closed ]">
        <div class="card-close">
            <i class="fa fa-times"></i>
        </div>
        <div class="[ card card-2 ] [ is-closed ]">
            <form id="theForm2" class="[ simform ] [ center block ]" autocomplete="off">
                <div class="simform-inner">
                    <ol class="questions">
                        <li>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q1">¿Cuál es tu nombre?</label></span>
                            <?php } else { ?>
                                <span><label for="q1">What's your name?</label></span>
                            <?php } ?>
                            <input id="q1" name="q1" type="text"/>
                        </li>
                        <li>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q5">¿Cuál es tu e-mail?</label></span>
                            <?php } else { ?>
                                <span><label for="q5">What's your e-mail address?</label></span>
                            <?php } ?>
                            <input id="q2" name="q2" type="email" class="" />
                        </li>
                        <li>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q3">¿En qué deporte estás interesado/a?</label></span>
                                <select class="[ form-control ]" id="q3" name="q3">
                                    <option value="chooseOne" selected disabled>Deporte</option>
                            <?php } else { ?>
                                <span><label for="q3">Which sport are you interested in?</label></span>
                                <select class="[ form-control ]" id="q3" name="q3">
                                    <option value="chooseOne" selected disabled>Sport</option>
                            <?php } ?>
                                    <option value="tennis">Tennis</option>
                                    <option value="golf">Golf</option>
                                    <option value="soccer">Soccer</option>
                                    <option value="volleyball">Volleyball</option>
                                </select>
                        </li>
                        <!-- GOLF -->
                        <li class="[ js-sport js-golf ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q4">¿Cuál es el puntaje pomedio que estás buscando?</label></span>
                            <?php } else { ?>
                                <span><label for="q4">What's the average score you are looking for?</label></span>
                            <?php } ?>
                            <select class="[ form-control ]" id="q4" name="q4">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <option value="chooseOne" selected disabled>Selecciona uno</option>
                                    <option value="-66">Menos de 66</option>
                                <?php } else { ?>
                                    <option value="chooseOne" selected disabled>Choose one</option>
                                    <option value="-66">Under 66</option>
                                <?php } ?>
                                <option value="66-67">66-67</option>
                                <option value="68-70">68-70</option>
                                <option value="71-73">71-73</option>
                                <option value="74-76">74-76</option>
                                <option value="77-79">77-79</option>
                                <option value="80-82">80-82</option>
                                <option value="83-85">83-85</option>
                                <option value="86-88">86-88</option>
                                <option value="89-90">89-90</option>
                            </select>
                        </li>
                        <!-- VOLLEYBALL -->
                        <li class="[ js-sport js-volleyball ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q5">¿Qué posición debe ser el jugador?</label></span>
                            <?php } else { ?>
                                <span><label for="q5">What position does the player have to play?</label></span>
                            <?php } ?>
                            <select class="[ form-control ]" id="q5" name="q5">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <option value="chooseOne" selected disabled>Selecciona uno</option>
                                <?php } else { ?>
                                    <option value="chooseOne" selected disabled>Choose One</option>
                                <?php } ?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </li>
                        <!-- TENNIS -->
                        <li class="[ js-sport js-tennis ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q6">¿Prefieres un jugar diestro o zurdo?</label></span>
                                <select class="[ form-control ]" id="q6" name="q6">
                                    <option value="chooseOne" selected disabled>Selecciona uno</option>
                                    <option value="rightHand">Diestro</option>
                                    <option value="leftHand">Zurdo</option>
                                </select>
                            <?php } else { ?>
                                <span><label for="q6">Do you prefer a left or right handed player?</label></span>
                                <select class="[ form-control ]" id="q6" name="q6">
                                    <option value="chooseOne" selected disabled>Choose one</option>
                                    <option value="rightHand">Right handed</option>
                                    <option value="leftHand">Left handed</option>
                                </select>
                            <?php } ?>
                        </li>
                        <li class="[ js-sport js-tennis ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <span><label for="q7">¿Qué ranking de FMT estás buscand? (sólo para jugadores mexicanos)</label></span>
                            <?php } else { ?>
                                <span><label for="q7">What FMT ranking are you looking for? (for mexican players only)</label></span>
                            <?php } ?>
                            <input id="q7" name="q7" type="text"/>
                        </li>
                        <!-- SOCCER -->
                        <li class="[ js-sport js-soccer ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <span><label for="q8">¿Qué posición debe ser el jugador?</label></span>
                                <select class="[ form-control ]" id="q8" name="q8">
                                    <option value="chooseOne" selected disabled>Selecciona uno</option>
                                    <option value="goal-keeper">Portero</option>
                                    <option value="defender">Defensa</option>
                                    <option value="midfielder">Medio</option>
                                    <option value="forward">Delantero</option>
                                </select>
                            <?php } else { ?>
                                <span><label for="q8">What position does the player have to play?</label></span>
                                <select class="[ form-control ]" id="q8" name="q8">
                                    <option value="chooseOne" selected disabled>Choose one</option>
                                    <option value="goal-keeper">Goal keeper</option>
                                    <option value="defender">Defender</option>
                                    <option value="midfielder">Midfielder</option>
                                    <option value="forward">Forward</option>
                                </select>
                            <?php } ?>
                        </li>
                        <!-- SOCCER -->
                    </ol><!-- /questions -->
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <button class="submit" type="submit">Enviar</button>
                    <?php } else { ?>
                        <button class="submit" type="submit">Send</button>
                    <?php } ?>
                    <div class="controls">
                        <div class="progress"></div>
                        <button class="[ next ] [ right ]"></button>
                        <span class="number">
                            <span class="number-current"></span>
                            <span class="number-total"></span>
                        </span>
                        <span class="error-message"></span>
                    </div><!-- / controls -->
                </div><!-- /simform-inner -->
                <span class="final-message"></span>
            </form><!-- /simform -->
        </div>
        <div class="[ card ]">
            <p class="simform">
                <?php if (qtrans_getLanguage() == 'es'){ ?>
                    Como coach, podrás ver los perfiles de los prospectos y pedir información adicional de acuerdo a la posición que ocuparía en el equipo.
                <?php } else { ?>
                    As a coach, you will be able to view the listed prospect’s profile and ask for additional information according to the position to fill in the university’s sports team.
                <?php } ?>
            </p>
            <button class="[ btn btn-success ][ btn-card-next ] [ js-next-card ]" data-card="card-2">Next <i class="fa fa-arrow-right"></i></button>
        </div>
    </div><!-- cards -->
<?php get_footer(); ?>