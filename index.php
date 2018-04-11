<?php
// the index file. Will mainly be used for the 'meeting minutes' page, as it will contain the actual wordpress 'posts'. Everything else will be static content.

// lucas lower @ airwaveconsulting

get_header();
?>


<header id="contentheader">
    <h1>Meeting Minutes</h1>
  
        <section class="controls year">
           <div class="filter">
            Filter Minutes:
               <div class="select">
            <?php 
//            wp_list_categories(array(
//                'title_li' => '',
//                'style' => '',
//                'separator' => '&ensp;-	&ensp;'
//            )); 
            wp_dropdown_categories( array(
                'show_option_all' => 'All Years',
                'order' => 'DESC'
            ));
            ?>
                   <div class="nub"></div>
                   </div>
        </div>
            <div class="mmsearch">
            <form class="search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input name="s" value class="text" type="search" placeholder="Search Meeting Minutes">
                <input type="hidden" name="post_type" value="post" />
                <input class="submit" type="image" src="<?php echo get_template_directory_uri() ?>/img/searchb.svg">
            </form>
            </div>
        <script type="text/javascript">
        // A script to change category on select, from WordPress codex
		var dropdown = document.getElementById("cat");
		function onCatChange() {
			if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
				location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
			}
		}
		dropdown.onchange = onCatChange;
	   </script>
    </section>
</header>

<?php

echo '<ul class="minutes">'; ?>

<?php
  // set up or arguments for our custom query
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $query_args = array(
    'post_type' => 'post',
    'meta_key' => 'meeting_date',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'posts_per_page' => 10,
    'paged' => $paged
  );
  // create a new instance of WP_Query
  $the_query = new WP_Query( $query_args );
?>

<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
<a href="<?php the_permalink() ?>"><li><?php the_title() ?></li></a>
<?php endwhile; ?>

<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav class="prev-next-posts">
    <div class="prev-posts-link">
      <?php echo get_next_posts_link( '&larr; Older', $the_query->max_num_pages ); // display older posts link ?>
    </div>
    <div class="next-posts-link">
      <?php echo get_previous_posts_link( 'Newer &rarr;' ); // display newer posts link ?>
    </div>
  </nav>
<?php } ?>

<?php else: ?>
  <article>
    <h1>Sorry...</h1>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  </article>
<?php endif; ?>

<?php
get_footer();
?>