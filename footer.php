<footer>
    <div class="container footer-container">
        <!-- footer-1st-column -->
        <div class="footer-1st-column">
            <div class="footer-logo"><?php $logo = get_header_image();  ?>

                <a href="<?php echo site_url(); ?>">

                    <img src="<?php echo bloginfo('template_directory') ?>/image/white-logo.png" alt="" width="120px">
                </a>
            </div>
            <div class="footer-expert">
                Dive into the world of seamless web solutions with PixelPress WP. We specialize in crafting WordPress
                excellence, delivering tailor-made websites and plugins that redefine online experiences.
            </div>
        </div>
        <!-- footer-2nd-column -->

        <div class="footer-2nd-column">
            <div class="footer-heading">Quick Links</div>


            <?php 
         wp_nav_menu(array('
         theme_location'=>'primary-menu','menu_class'=>'footer-menu'))
         ?>

        </div>
        <!-- footer-3rd-column -->

        <div class="footer-3rd-column">
            <div class="footer-heading">Services</div>
            <ul class="footer-menu">
                <?php
        $post = array('post_type'=>'services','post_status'=>'publish', 'posts_per_page' => 6 );
        $postquery = new wp_query($post);
        while ($postquery->have_posts()){
          $postquery->the_post();
          
          ?>
                <li><?php the_title(); ?></li>
                <?php } ?>

            </ul>
        </div>
        <!-- footer-4th-column -->
        <div class="footer-4th-column">
            <div class="footer-heading">Contact Us</div>
            <ul class="footer-menu">
                <li><span style="font-weight:600;">Phone No:&nbsp </span> <?php the_field('phone_number',18) ?></li>
                <li><span style="font-weight:600;">Location:&nbsp </span> <?php the_field('location',18) ?></li>
                <li><span style="font-weight:600;">E-mail:&nbsp </span> <?php the_field('email',18) ?></li>
            </ul>

        </div>
    </div>
    <!-- copyright -->
    <div class="justify-content-sb flex container align-items">

        <div class="copyright flex">2022 <span style="margin:0 3px 0 3px;"><img
                    src="<?php echo bloginfo('template_directory') ?>/image/copyright.png" alt="copyright img"
                    width="12px"></span> Abhisek Gurung - All right reserved</div>
        <div class="flex justify-content align-items" style="column-gap: 30px;">
            <a href="https://www.facebook.com/">

                <img class="footer-social-icons" src="<?php echo bloginfo('template_directory') ?>/image/facebook.png"
                    alt="">
            </a>
            <img class="footer-social-icons" src="<?php echo bloginfo('template_directory') ?>/image/twitter.png"
                alt="">
            <img class="footer-social-icons" src="<?php echo bloginfo('template_directory') ?>/image/instagram.png"
                alt="">
        </div>
    </div>
</footer>
<?php wp_footer(); ?>