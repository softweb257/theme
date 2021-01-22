<?php
get_header();
?>
<?php
       $term = get_queried_object();
       $args = array(
        'post_type' => 'property',
        'order' => 'DESC',
        'property-type' => $term->slug
    );
    $Property_listing_banner= get_theme_mod('Property_listing_banner');             
    $Property_listing_banner_text= get_theme_mod('Property_listing_banner_text');
   ?>
    <section class="listing_banner" style="background-image: url('<?php echo $Property_listing_banner; ?>')">
        <div class="custom_container">
            <p><?php echo $Property_listing_banner_text; ?></p>
        </div>
   </section>
<section class="featured_property quintessential_list property_listing_page listing_design">
    <div class="custom_container">
        <h3>Search Result</h3>
        <div class="result_value">
               <ul>
                   <li>Cala Fornells
                       <a class="clear" href="javascript:void(0)"></a>
                   </li>
                   <li>Apartment
                       <a class="clear" href="javascript:void(0)"></a>
                   </li>
                   <li>3Bed
                       <a  class="clear" href="javascript:void(0)"></a>
                   </li>
                   <li>100FT2 - 480 FT2
                       <a class="clear" href="javascript:void(0)"></a>
                   </li>
                   <li>500,000 - 800,000€
                       <a class="clear" href="javascript:void(0)"></a>
                   </li>
               </ul>
               <form action="" method="post">
                    <select class="form-control">
                                        <option selected="selected"disabled>Order by</option>
                                        <option>Recommended</option>
                                        <option>Price Ascending</option>
                                        <option>Price Descending</option>
                    </select>
                    <input type="submit" value="clear filters">
            </form>
        </div>
        <div class="custom_row" id="myListp">
            <?php
    $wp_query = new WP_Query( $args );
    if ($wp_query -> have_posts()) :
        while ($wp_query -> have_posts()) : $wp_query -> the_post();
      ?>
            <div class="col-4">
               <div class="featured">
                    <?php
                                $property_gallery = get_field('property_gallery');
                                if( $property_gallery ): ?>
                    <div class="featured_slider">
                        <?php foreach( $property_gallery as $property_gallerys ): ?>
                        <div class="item">
                            <?php echo wp_get_attachment_image( $property_gallerys,'property-listing'); ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div class="featured_details">
                        <h6><?php echo get_the_title(); ?></h6>
                        <p><?php echo get_the_excerpt(); ?> </p>
                        <ul>
                            <li class="bedroom"><?php echo get_field('bedroom'); ?></li>
                            <li class="bathroom"><?php echo get_field('bathroom'); ?></li>
                            <li class="squre_fet"><?php echo get_field('squre_fet'); ?> ft<sup>2</sup></li>
                            <li class="sea_view"><?php echo get_field('sea_view'); ?></li>
                        </ul>
                        <span class="price"><?php 
                                     echo get_field('property_price'); 
                                    
                                     ?> €</span>

                    </div>
                    <span class="ref_numder">Ref.45621</span>
                    <a class="wishlist"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="30"
                            viewBox="0 0 31 30">
                            <g>
                                <g>
                                    <path fill="#fff"
                                        d="M16.024 30.002S-7.9 9.767 4.293 1.653c7.033-4.681 11.611 2.072 11.611 2.072s4.578-6.753 11.611-2.072c12.193 8.114-11.491 28.349-11.491 28.349" />
                                </g>
                            </g>
                        </svg></a>
                    <a class ="get_the_permalink" href="<?php echo get_the_permalink();?>"></a>
                </div>
                
            </div>
            <?php
    endwhile;
endif;
       ?>
        </div>
        <div  class="p_list_more"><a href="javascript:void(0)" id="loadMore">Load more</a></div>
    </div>
</section>


<?php
 
get_footer();
?>