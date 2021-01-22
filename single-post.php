<?php
get_header();
// default page
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'blog-details');

?>
<div class="inner_banner text-center ovely">
<img src="<?php echo $featured_img_url; ?>" alt="">
</div>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();    
            ?>
                <section class="post_page_contant">
                <h4 class="title post_title"><?php echo get_the_title(); ?></h4>
                                <?php the_content(); ?>
                </section>
<?php
      
    endwhile;
endif;
$previous = get_previous_post();
$next = get_next_post();
?>
<div class="share_post">
    <div class="share_post_inner">
    <span>Share to:</span>
    <?php echo do_shortcode('[addtoany]');?>
</div>
</div>
<div class="pagination">
    <div class="custom_conatiner">
        <div class="post_pagination">
           <div class="box">
<?php if ( get_previous_post() ) { ?>
    <a href="<?php echo get_the_permalink($previous) ?>">previous</a>
<?php } 
?>
</div>
<div class="box">
<?php
if ( get_next_post() ) { ?>
    <a href="<?php echo get_the_permalink($next) ?>">next</a>
<?php } ?>
</div>
</div>
</div>
</div>
<?php
get_footer();