<?php
/*
 * Template Name: template-a
 * Description: A Page Template with a generic layout.
 */


get_header();

?>




<div class="custom-banner" style="background-image: url('<?= get_template_directory_uri(); ?>/assets/img/demo-images/demo_banner.jpg'); background-size: cover" ></div>

<div class="global-wrapper"> <!-- Wrap all content -->
    <!-- Remaining middle content container -->

    <div class="container our-facilities-gallery">

        <!-- Left content container -->
        <div class="col-lg-8 col-md-12 col-xs-12">

            <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
                <h1><?php the_title();?></h1>
                <?php the_content();?>
            <?php endwhile; endif; ?>

            <div class="row">

                <?php





            </div>


        </div><!-- End left content -->

        <div class="col-lg-4 col-sm-12 sidebar-widget">

            <div class="container">

            </div>
        </div>

    </div><!-- End Container -->




</div> <!-- End Global container-->








<?php get_footer(); ?>

    
