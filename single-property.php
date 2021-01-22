<?php
get_header();
// default page
?>
<section class="banner_property_detail">
    <p> <?php echo get_the_title(); ?></p>
</section>



<div class="property_detail_slider">
    <div class="slider-container">
        <?php
      $property_gallery = get_field('property_gallery');
      ?>
        <div class="slider-for">
            <?php foreach( $property_gallery as $property_gallerys ): ?>
            <?php echo wp_get_attachment_image( $property_gallerys,'property-detail-main'); ?>
            <?php endforeach; ?>
        </div>

        <div class="slider-nav">
            <?php foreach( $property_gallery as $property_gallerys ): ?>
			<div class="item">
				<div class="border"></div>
            <?php echo wp_get_attachment_image( $property_gallerys,'property-detail-small'); ?>
			</div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
<div class="property_detail">
    <div class="custom_container">
        <div class="custom_row">
            <div class="col-sm-6 left">
                <div class="p_details">
                    <span class="ref_number">Ref.45621</span>
                    <h3 class="property_name_info"><?php echo get_the_title(); ?></h3>
                    <ul class="p_features">
                        <li class="bedroom">Beds: <?php echo get_field('bedroom' ); ?></li>
                        <li class="bathroom">Baths: <?php echo get_field('bathroom' ); ?></li>
                        <li class="squre_fet">SQ. FT.: <?php echo get_field('squre_fet' ); ?> ft<sup>2</sup></li>
                        <li class="sea_view"><?php echo get_field('sea_view' ); ?></li>
                    </ul>
                    <span class="price"><?php echo get_field('property_price' ); ?> €</span>
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();    
                                ?>
                                        <section class="property_detail_contant">
                                            <?php the_content(); ?>
                                        </section>
                                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-sm-6 right">
                    <div class="property_conatct">
						<div class="pro_dtl">
                        <h4>Interested in This Property?</h4>
                        <a class="opne_form" href="javascript:void(0)"> Contant Us</a>
						</div>
                    </div>
                    <?php  
                    //echo get_the_ID()
                    //get_field('show__blogs');
                    $show__blogs = get_field('show__blogs',get_the_ID());  
                   
                    foreach ($show__blogs as $show__blogs_list) {           
                        $featured_img_url =  get_the_post_thumbnail_url($show__blogs_list,'property-blog-listing'); ?>
                        <div class="show__blogs_list">
                            <img src="<?php echo $featured_img_url?>" alt="" srcset="">
                         <div class="content_deatils">
                            <?php  echo get_field('property_details_contect',$show__blogs_list) ?>
                         </div>
                         <a  class="read_more" href="<?php  echo get_the_permalink($show__blogs_list); ?>"> Read More</a>
                        </div>
                         
                        <?php
                        }
                    ?>
            </div>
        </div>
    </div>

</div>
<div class="contact-form-7">
<?php echo do_shortcode('[contact-form-7 id="279" title="Property Page"]');?>
 </div>
<?php


get_footer();