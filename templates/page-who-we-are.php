<?php
/*
 * Template Name: Who We Are
 * Description: A Page Template with a generic layout.
 */


get_header();

?>
<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>




    <div class="global-wrapper"> <!-- Wrap all content -->




    <!-- Remaining content container -->
        <div class="container">

            <!-- Left content container -->
            <div class="col-lg-8 col-sm-12">

                <h1>About Us</h1>

                <?php the_content(); ?>

            </div><!-- End left content -->

            <!-- Right content container -->
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
            </div> <!-- End right sidebar-->




        </div><!-- End Container -->

        <div class="clo-lg-12 grid-factory">
            <div class="controls">
                <h2>Meet the Team</h2>
                <div class="wrap-controls">
                    <label>Sort By:</label>
                    <button class="filter" data-filter=".marketing">Category 1</button>
                    <button class="filter" data-filter=".administrator">Category 2</button>
                    <button class="filter" data-filter=".HR">Category 3</button>
                    <button class="filter" data-filter=".category-4">Category 4</button>
                    <button class="filter active" data-filter="all">All</button>
                </div>
            </div>
            
     <?php

$args = array(
    'post_type'=> 'team',
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
$teams_query = get_posts( $args );

    $i = 0;  /*Add data-order attribute to markup*/
?>    

        <div class="profiles-wrapper clearfix">
            <ul id="imageGallery">
             <?php  
             foreach ( $teams_query as $teamMember ) : setup_postdata( $teamMember ); ?>
                <?php 
                    $term_list = wp_get_post_terms($teamMember->ID, 'group', array("fields" => "all"));
                    //print_r($term_list[0]->name);
                    //print_r($term_list->name);
                    //print_r($term_list[0]->slug);
                    //print_r($teamMember); 
                    print_r(the_post_thumbnail($teamMember->ID, "full")); 
                    //echo get_the_post_thumbnail($teamMember->ID);
                ?>
                <li data-thumb="http://whlinen.dev.securedatatransit.com/wp-content/uploads/2015/02/000.png"  data-src="http://whlinen.dev.securedatatransit.com/wp-content/uploads/2015/02/000.png" class="mix <?= $term_list[0]->slug?> slideOutUp" data-order="<?= $i;?>">
                    <div class="mfp-content-left"><img src="http://whlinen.dev.securedatatransit.com/wp-content/uploads/2015/02/000.png" /></div>
                    <div class="mfp-content-right">
                            <h3 class="hover-text title name-title"><?= $teamMember->post_title; ?>
                            <span><?= simple_fields_value( 'about_us_job_title_field' );?></span></h3>
                            <p class='bio'><?= $teamMember->post_content; ?></p>
                    </div>
                </li>
            <?php  $i++; endforeach; ?>
            </ul>

        </div>
        <?php wp_reset_postdata(); ?>   

      <div>

       </div>

        </div>

    </div> <!-- End Global container-->



<?php endwhile; endif; ?>

            




<?php get_footer(); ?>