<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="menu_overlay"></div>
    <header>
        <div class="custom_container">
            <div class="row">
                <div class="logo">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="right_side">
                    <div class="header_menu">
                        <a class="menu_open menu_toggle"><svg height="23px" version="1.1" viewBox="0 0 18 12" width="25px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title></title>
                                <desc></desc>
                                <defs></defs>
                                <g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1">
                                    <g fill="#000000" id="Core" transform="translate(-87.000000, -342.000000)">
                                        <g id="menu" transform="translate(87.000000, 342.000000)">
                                            <path d="M0,12 L18,12 L18,10 L0,10 L0,12 L0,12 Z M0,7 L18,7 L18,5 L0,5 L0,7 L0,7 Z M0,0 L0,2 L18,2 L18,0 L0,0 L0,0 Z" id="Shape"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        
                        <nav id="site-navigation" class="main-navigation">
                        <a class="menu_open close_menu" href="#">x</a>
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'primary-menu',
                                ) );
                            ?>
                        </nav><!-- #site-navigation -->
                    </div>
                    <div class="search_from">
                        <a class="search_opne search_toggle">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="" method="post">
                            <a class="search_close search_toggle" href="#">x</a>
                       
                            <select class="form-control">
                                <option selected="selected">Location</option>
                                <option>Location</option>
                                <option>Location</option>
                            </select>
                            <select class="form-control">
                                <option selected="selected">Property Type</option>
                                <option>Property Type</option>
                                <option>Property Type</option>
                            </select>
                            <select class="form-control">
                                <option selected="selected">Bedrooms</option>
                                <option>Bedrooms</option>
                                <option>Bedrooms</option>
                            </select>
                            <select class="form-control">
                                <option selected="selected">Criteria</option>
                                <option>Criteria</option>
                                <option>Criteria</option>
                            </select>
                     
                            <div class="range_box">
                                <div class="range_title">
                                    <span>Min 500,000 €</span>
                                    <span>Max 15,000,000 €</span>
                                </div>
                                <input  class="search_range" type="range" min="10"max="1000"step="10"value="300">
                            </div>
  
                            <div class="search_btn">
                                    <input type="button" value="Search">
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    