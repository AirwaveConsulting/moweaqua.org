<?php
// the single post content file
// mostly for meeting minutes

// lucas lower @ airwaveconsulting

get_header();

// start of the page loop
while(have_posts()) : the_post();
?>

<!-- section.content comes right before this -->
<header id="contentheader">
    
    <h1><?php the_title(); ?></h1>
    
    <section class="controls">
        <a href="<?php echo esc_url( home_url( '/meeting-minutes' ) ); ?>">&larr; Back to Meeting Minutes</a>
        <?php echo do_shortcode('[print-me title="Print This Page" class="print"]'); ?>
    </section>
</header>

<section class="minutes">
<?php the_content(); ?>
</section>

<?php


// end of section.content will come right after this

endwhile;

get_footer();
?>