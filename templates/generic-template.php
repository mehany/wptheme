<?php
    /*
     * Template Name: generic template
     * Description: A Page Template with a generic layout.
     */

get_header();

?>
    <div class="global-wrapper"> <!-- Wrap all content --></div> <!-- End Global Wrapper -->
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">

            <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; endif; ?>

        </div>
    </div>

<?php get_footer(); ?>