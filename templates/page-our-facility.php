<?php
/*
 * Template Name: Our Facility
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

            <?php
            $args = array(
                'post_type'=> 'facilities',
                'posts_per_page'   => 9999,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            $facilities_query = new WP_Query( $args );
            // $field_group_values = simple_fields_values("slide_content");
            // $field_values = simple_fields_values("slide_image,slide_tilte,slide_textarea");
            //var_dump(get_post_custom_values());
            ?>
            <?php if ( $facilities_query->have_posts() ) {?>
                <?php while ( $facilities_query->have_posts() ) {?>
                    <?php $facilities_query->the_post();?>
                    <?php the_title()?>
                    <?php the_content();?>
                    <?php //var_dump( simple_fields_fieldgroup('slide_content', get_the_id()) );?>
                    <?php var_dump( simple_fields_values('slide_image', get_the_id()) );?>
                    <?php var_dump( simple_fields_values('slide_tilte', get_the_id()) );?>
                    <?php var_dump( simple_fields_values('slide_textarea', get_the_id()) ); die(); ?>
                <?php }?>
            <?php } else {?>

            <?php }   ?>
            <?php wp_reset_postdata();?>
            <div class="row">

                <?php

                /*echo "The first field has the value:" . $field_values[0]["slide_image"];
                echo "The second field has the value:" . $field_values[0]["slide_tilte"];
                echo "The third field has the value:" . $field_values[0]["slide_textarea"];*/
                //      var_dump($term_list);

                //print_r($term_list[0]->name);
                //print_r($term_list->name);
                //print_r($term_list[0]->slug);
                //print_r($teamMember);
                //print_r(the_post_thumbnail($facility->ID, "full"));
                //echo get_the_post_thumbnail($teamMember->ID);
                ?>



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








<?php get_footer(); ?>

    
