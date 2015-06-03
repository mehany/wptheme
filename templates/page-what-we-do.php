<?php
/*
 * Template Name: What We Do
 * Description: A Page Template with a generic layout.
 */

get_header();

?>
<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>

    <div class="custom-banner" style="background-image: url('<?= get_template_directory_uri(); ?>/assets/img/demo-images/demo_banner.jpg');" ></div>

    <div class="global-wrapper"> <!-- Wrap all content -->
    <!-- Remaining middle content container -->

        <div class="container what-we-do-gallery">

            <!-- Left content container -->
            <div class="col-lg-8 col-md-12 col-xs-12">
                <h1> <?php the_title(); ?> </h1>
                <?php the_content(); ?>
                <?php $field_group_values = simple_fields_fieldgroup("what_we_do");
                        //print_r($field_group_values);
                        //print_r($field_group_values[0]['do_image']['url']);
                    ?>
                
               
                <div class="row">
                    <?php foreach ($field_group_values as $group => $values):  ?>
                        <div class="col-lg-6 col-md-6 col-xs-12 department">
                        <img src="<?= $values['do_image']['url'] ?>"  />
                        <div class="caption"><?= $values['caption'] ?></div>
                        <p class="description"><?= $values['description'] ?></p>
                        </div>
                     <?php endforeach ?>
                    
                    

                </div>


            </div><!-- End left content -->

        <div class="col-lg-4 col-sm-12 sidebar-widget">
            <h3 class="sidebar-slider-title">What our clients are saying</h3>
            <div class="container">
            <span class="open-quote"></span>
            <div class="sidebar-quotes-slider center">
               <!-- <div class="counter"></div>
                <div class="lang"></div>
                <div class="love fa fa-heart-o"></div>
                <div class="progress"></div> -->
                <?php
                ob_start();
                dynamic_sidebar('people-say-sidebar');
                $clientsQuoetesContent = ob_get_contents();
                //$contents = ob_get_clean();
                ob_end_clean();
                //print_r($shareMessage);
                echo $clientsQuoetesContent;
                ?>
            </div>
            <span class="close-quote"></span>
            </div>
        </div>

        </div><!-- End Container -->




    </div> <!-- End Global container-->


<?php endwhile; endif; ?>



<?php get_footer(); ?>