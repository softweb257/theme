<?php
get_header();
// default page
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<section class="banner_inner" style="background-image: url(<?php echo $featured_img_url; ?>);">
    <p><?php echo get_the_title(); ?></p>
</section>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();    
            ?>
                <section class="page_contant">
                
                                <?php the_content(); ?>
                </section>
<?php
      
    endwhile;
endif;
get_footer();