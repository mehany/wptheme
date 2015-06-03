<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo( 'template_directory' );?>/bootstrap/img/favicon.ico">
    <script>

        //document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>');

    </script>
    <title>
      <?php wp_title( '|', true, 'right' ); ?>
      <?php bloginfo( 'name' );?>
    </title>

    <?php wp_head(); ?>

  </head>

    <body <?php body_class(); ?>>

    <div class="navbar navbar-inverse navbar-fixed-top " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <div class="line"></div>
            <span class="sr-only">X</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>">
              <img src="<?= get_template_directory_uri() ?>/assets/img/logos/wh_linen_logo.png" alt="<?php bloginfo( 'name' ); ?>" />
          </a>
        </div>
        <div class="navbar-collapse collapse">
        <?php 

        echo wp_bootstrap_main_nav();
        ?>

        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="header-spacer"></div>
