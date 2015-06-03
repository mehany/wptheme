
       <div class="footer">
          <div class="row container">
              <div class="col-md-4 website-legal">
                  <p class="blog-name">&copy; <?php bloginfo( 'name' ); ?> <?php echo date('Y'); ?></p>
                  <?php
                  /*$args = array(
                      'menu'        => 'footer_links',
                      'menu_class'  => 'nav navbar-nav',
                      'container'   => 'false'
                  );
                  wp_nav_menu($args);*/
                  echo wp_bootstrap_footer_links();                                   
                  ?>                  
              </div>
              <div class="col-xs-12 col-md-5 footer-middle-section">
                  <div class="row">
                      <? /*News Letter container*/ ?>
                      <div class="col-xs-12 col-md-6 subscripe-to-newsletters">
                          <span class="subscripe-error-message"><?php echo $subscriptionMessage; ?></span>

                      </div>
                      <? /*Social Icons*/ ?>
                      <div class="col-xs-12 col-md-6 social-box">
                          <a class="icon-facebook" href="#" ></a>
                          <a class="icon-twitter" href="#" > </a>
                          <a class="icon-pinterest" href="#" ></a>
                          <a class="icon-instagram" href="#" ></a>
                      </div>
                  </div>
              </div>

              <div class="col-xs-12 col-md-4  website-legal-mobile">
                  <p class="blog-name">&copy; <?php bloginfo( 'name' ); ?> <?php echo date('Y'); ?></p>
                  <?php
                  /*$args = array(
                      'menu'        => 'footer_links',
                      'menu_class'  => 'nav navbar-nav',
                      'container'   => 'false'
                  );
                  wp_nav_menu($args);*/
                  echo wp_bootstrap_footer_links();
                  ?>
              </div>

              <div class="col-md-3 col-xs-12 website-authors">
                  PROUDLY POWERED BY WORDPRESS
              </div>
          </div> <!-- End row container -->

      </div>

  
    <?php wp_footer(); ?>
    
	</body>
</html>