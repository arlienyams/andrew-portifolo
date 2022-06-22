<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title><?php bloginfo('name'); ?></title>


    <?php wp_head(); ?>
</head>

<body onload="myLoader()" style="margin:0;" <?php body_class(); ?>>

    <div id="loader"></div>

    <div class="site-content animate__fadeIn" id="site-content" style="display:none;">

        <div id="main" class="nav-header">
            <div class="container">
                <div class="menu-wrapper">
                    <div class="the-logo">
                        <a href="<?php echo home_url() ?>" class="logo float-left"><img src="<?php bloginfo('template_directory'); ?>/img/A-Logo.svg" alt="A." width="120px"></a>
                    </div>



                    <div class="menu">
                        <nav>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'main_menu',
                                'menu_class' => 'site-menu clone-main-nav d-lg-block',
                            ));
                            ?>
                    </div>
                </div>
            </div>
        </div>