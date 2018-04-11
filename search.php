<?php
// the index file. Will mainly be used for the 'meeting minutes' page, as it will contain the actual wordpress 'posts'. Everything else will be static content.

// lucas lower @ airwaveconsulting

get_header();
?>

<header id="contentheader">
    <h1>Search results for: <span class="results">"<?php echo get_search_query() ?>"</span></h1>
</header>

<?php

while(have_posts()) : the_post(); ?>

<article class='searcharticle'>
    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
    <?php the_excerpt() ?>
</article>


<?php
endwhile;

    the_posts_pagination(array('mid_size' => '-1'));

get_footer();
?>