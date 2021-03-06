<?php get_header(); ?>
    <div class="container contact clearfix">
        <div class="col-xs-12 margin-bottom">
            <?php if (qtrans_getLanguage() == 'es'){ ?>
                <h2 class="red">Contacto</h2>
                <p>Es tiempo de realizar tu sueño, contáctanos y cuéntanos qué deporte practicas y nos aseguraremos de que uno de nuestros consejeros se ponga en contacto contigo.</p>
                <p>Deja que Select Team Becas haga tu sueño realidad.</p>
            <?php } else { ?>
                <h2 class="red">Contact</h2>
                <p>It's time to start fulfilling your dream, contact us and tell us what sport you practice, and we will make sure that an advisor gets in touch with you.</p>
                <p>Let Select Team help to make your dream come true.</p>
            <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-6 margin-bottom">
            <h3 class="red">Select Team Headquarters</h3>
            <p><a href="https://www.facebook.com/pages/Select-Team-Becas/471870126241459" target="_blank"><i class="fa fa-facebook"></i> /Select-Team-Becas</a></p>
            <!-- <p><a href="#" target="_blank"><i class="fa fa-twitter"></i> @selectteam</a></p> -->
            <hr>
            <div>
                <?php if (qtrans_getLanguage() == 'es'){ ?>
                    <p><b>Luis Mendoza (Presidente)</b></p>
                <?php } else { ?>
                    <p><b>Luis Mendoza (President)</b></p>
                <?php } ?>
                <p><i class="fa fa-phone"></i> 7773067947</p>
                <p><i class="fa fa-envelope"></i> <a href="mailto:luismendoza@selectteambecas.com">luismendoza@selectteambecas.com</a></p>
            </div>
            <hr>
            <div>
                <?php if (qtrans_getLanguage() == 'es'){ ?>
                    <p><b>Nair Tolomeo (Vicepresidente)</b></p>
                <?php } else { ?>
                    <p><b>Nair Tolomeo (Vicepresident)</b></p>
                <?php } ?>
                <p><i class="fa fa-envelope"></i> <a href="mailto:info@selectteambecas.com">info@selectteambecas.com</a></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 margin-bottom">
            <?php if (qtrans_getLanguage() == 'es'){ ?>
                <h3 class="red">Deja un comentario</h3>
            <?php } else { ?>
                <h3 class="red">Leave a comment</h3>
            <?php } ?>
            <form role="form" class="[ j-contact-message ]">
                <div class="form-group">
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <label for="name">Nombre</label>
                        <input type="text" class="[ form-control ][ required ]" id="name" placeholder="Nombre" name="name">
                    <?php } else { ?>
                        <label for="name">Name</label>
                        <input type="text" class="[ form-control ][ required ]" id="name" placeholder="Name" name="name">
                    <?php } ?>
                </div>
                <div class="form-group">
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <label for="mail">E-mail</label>
                        <input type="email" class="[ form-control ][ required email ]" id="mail" placeholder="Ingresa tu correo electrónico" name="email">
                    <?php } else { ?>
                        <label for="mail">E-mail address</label>
                        <input type="email" class="[ form-control ][ required email ]" id="mail" placeholder="Enter email" name="email">
                    <?php } ?>
                </div>
                <div class="form-group">
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <label for="mail">Escribe tu comentario</label>
                    <?php } else { ?>
                        <label for="mail">Write your comment</label>
                    <?php } ?>
                    <textarea class="[ form-control ][ required ]" rows="3" name="message"></textarea>
                </div>
                <?php if (qtrans_getLanguage() == 'es'){ ?>
                    <button type="submit" class="[ btn btn-primary right ][ j-contact-button ]">Enviar</button>
                <?php } else { ?>
                    <button type="submit" class="[ btn btn-primary right ][ j-contact-button ]">Submit</button>
                <?php } ?>
            </form>
        </div>
    </div>
<?php get_footer(); ?>