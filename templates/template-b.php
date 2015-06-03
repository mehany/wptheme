<?php
/*
 * Template Name: template-h
 * Description: A Page Template with a generic layout.
 */

get_header();

?>
    <div class="container">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <img src="http://placehold.it/1340x306" width="100%"/>

        </div>
        <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
        <div class="contact-form-wrapper">
            <h1> <?php the_title(); ?></h1>


                <?php the_content(); ?>



        </div>
        <?php endwhile; endif; ?>

    </div>




<?php get_footer(); ?>