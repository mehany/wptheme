<?php
        // get our subscription form
        $subscriptionForm = \SimpleSubscribe\Developers::getSubscriptionForm();
       
        // with this we determine modal windows class, since it's hidden automatically,
        // with every submission, we should make it visible, therefore add class "visible"
        //$modalWindowVisible = $subscriptionForm->isSubmitted() ? 'visible' : '';
        // just empty variable to be filled with errors / success message
        $subscriptionMessage = '';
        // is it valid or not?
        if($subscriptionForm->isSubmitted() && $subscriptionForm->isValid()){
            // it is, this is our messages
            $subscriptionMessage = 'You have succesfully subscribed, e-mail is on it\'s way!';
        } elseif($subscriptionForm->isSubmitted() && $subscriptionForm->hasErrors()) {
            // it's not! get error messages in variable
            $subscriptionMessage = print_r($subscriptionForm->getAllErrors(), TRUE);
        }
    ?>      
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
                          <?php echo $subscriptionForm; ?>
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