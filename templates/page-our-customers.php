<?php
    /*
     * Template Name: Our Customers
     * Description: A Page Template with a generic layout.
     */

get_header();

?>

<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>




<?php $field_group_values = simple_fields_fieldgroup("our_customers_quotes_slide"); ?>
    <div class="responsive-slider-container">
        <ul class="responsive-slider" class="cs-hidden">
            <?php foreach ($field_group_values as  $values):  ?>
                <li class="item-b"><?= $values ?></li>
           <?php endforeach ?>
        </ul>
    </div>


<?php $field_group_values = simple_fields_fieldgroup("customers"); ?>

<div class="global-wrapper"> <!-- Wrap remaining content -->

        <div class="container">
        <h1> <?php the_title(); ?> </h1>
                <?php the_content(); ?>
        </div>

        <div class="responsive-container">
            <ul class="customers-slider" class="cs-hidden">
                <?php foreach ($field_group_values as $group => $values):  ?>
                <li class="item-a">
                    <img src="<?= get_template_directory_uri()?>/assets/img/sprites/pixel.png" style="background-image: url('<?= $values['customer_image']['url'] ?>')" />
                    <p class="quote"><?= $values['quotation'] ?></p>
                </li>
                <?php endforeach ?>
            </ul>
        </div>






</div> <!-- End Global Wrapper -->



<?php endwhile; endif; ?>

<?php get_footer(); ?>
