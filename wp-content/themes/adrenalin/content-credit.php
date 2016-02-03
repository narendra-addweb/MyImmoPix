
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        
		<div><strong><?php echo get_str_availablecredit();?> <?php echo do_shortcode('[usercreditwoocommerce]');?></strong><br /><p class="mytext">
        <?php echo get_str_cartmsg();?></p></div>
		<?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'commercegurus' ),
            'after' => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->
    <div class="container">
        <?php edit_post_link( __( 'Edit', 'commercegurus' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    </div>
</article><!-- #post-## -->


