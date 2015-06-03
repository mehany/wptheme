<?php
/*
 * Template Name: Home
 * Description: A Page Template with a generic layout.
 */
get_header();

?>


<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
    <div class="global-wrapper"> <!-- Wrap all content -->




    <?php // the_content(); ?>


        <div class="row middle-section">
            <div class="middle-section-wrapper">
            <div class="col-md-4">
                <div class="cta-a">
                    <span class="night-stand"></span>
                    <h2><?= simple_fields_value( 'action_field_1_title' );?></h2>
                    <p><?= simple_fields_value( 'action_field_1' );?></p>
                    <a href="<?= simple_fields_value( 'action_field_1_link' );?>" class="button btn-primary green-btn">Learn More</a>

                </div>

            </div>
            <div class="col-md-4">
                <div class="cta-b">
                    <span class="chief-hat"></span>
                    <h2><?= simple_fields_value( 'action_field_2_title' );?></h2>
                    <p><?= simple_fields_value( 'action_field_2' );?></p>
                    <a href="<?= simple_fields_value( 'action_field_2_link' );?>" class="button btn-primary green-btn">Learn More</a>
                </div>


            </div>
            <div class="col-md-4">
                <div class="cta-c">
                    <span class="sewing-machine"></span>
                    <h2><?= simple_fields_value( 'action_field_3_title' );?></h2>
                    <p><?= simple_fields_value( 'action_field_3' );?></p>
                    <a href="<?= simple_fields_value( 'action_field_3_link' );?>" class="button btn-primary green-btn">Learn More</a>
                </div>

            </div>

            </div>
        </div><!-- middle-section -->




    </div>
<?php endwhile; endif; ?>


<?php get_footer(); ?>      