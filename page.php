<?php
// the normal page content file
// the 'home' page layout will be located in page-home.php, as it contains stuff that shouldn't be site-wide

// lucas lower @ airwaveconsulting

get_header();

// start of the page loop
while(have_posts()) : the_post();
?>

<!-- section.content comes right before this -->
<header id="contentheader">
    <h1><?php the_title(); ?></h1>
</header>

<?php 

the_content();

// end of section.content will come right after this

endwhile;

get_footer();
?>