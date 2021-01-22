<?php
get_header();
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
?>
