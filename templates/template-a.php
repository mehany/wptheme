<?php
/*
 * Template Name: template-k
 * Description: A Page Template with a generic layout.
 */

get_header();

?>

<div id="map_canvas" style="width: 100%; height: 300px" ></div>

<div class="global-wrapper"> <!-- Wrap all content -->


    <div class="container">
        <!-- Main jumbotron for a primary marketing message or call to action -->

        <div class="row">

        <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
            <div class="contact-form-wrapper">
                <div class="col-xs-12 col-md-9 col-lg-9">
                <h1> <?php the_title(); ?></h1>
                <?php the_content(); ?>

                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 contact-us-sidebar">

                </div>

            </div>
        <?php endwhile; endif; ?>


        </div>
    </div>

</div> <!-- End Global Wrapper -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


<script type="text/javascript">
    var geocoder;
    var map;
    var address = "100 willow st, Hoboken NJ 07087";

    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var myOptions = {
            zoom: 8,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            navigationControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        if (geocoder) {
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                        map.setCenter(results[0].geometry.location);

                        var infowindow = new google.maps.InfoWindow({
                            content: '<b>' + address + '</b>',
                            size: new google.maps.Size(150, 50)
                        });

                        var marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                            title: address
                        });
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open(map, marker);
                        });

                    } else {
                        alert("No results found");
                    }
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


<?php get_footer(); ?>