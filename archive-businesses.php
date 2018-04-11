<?php
// the businesses page file. Shows the businesses custom post type

// lucas lower @ airwaveconsulting

get_header();
?>

<header id="contentheader">
    <h1>Area Businesses</h1>
    <a class="submitbutton" href="https://moweaqua.org/submit/submit-a-business/">Submit/change a business →</a>
</header>


<?php
  // set up or arguments for our custom query
  $query_args = array(
    'post_type' => 'businesses',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => -1
  );

  // create a new instance of WP_Query
  $the_query = new WP_Query( $query_args );
?>

<?php 

if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop 

$currentPost = $the_query->current_post;

if($currentPost % 2 == 0){
    echo '<article class="business left">';
}
else{
    echo '<article class="business right">';
}
        
        $theTitle = get_the_title();
        $theHref = get_field('website');
        
        if($theHref){
            echo "<h2><a href='$theHref'>$theTitle</a></h2>";
        }
        else{
            echo "<h2>$theTitle</h2>";
        }
    ?>
    <?php

    if(has_post_thumbnail()){
        if(get_field('website')){
            echo "<a href='" . get_field('website') . "'><img src='" . get_the_post_thumbnail_url($post, 'medium') . "'></a>";
        }
        else{
            echo "<img src='" . get_the_post_thumbnail_url($post, 'medium') . "'>";
        }
    }
    the_content() ?>
    
    <?php
    if(get_field('address')){
        echo '<h3>Address:</h3>';
        echo '<p class="address">' . get_field('address') . '</p>';
    }
    if(get_field('hours')){
        echo '<h3>Hours:</h3>';
        echo '<p class="hours">' . get_field('hours') . '</p>';
    }
    if(get_field('phone_number')){
        echo '<h3>Phone:</h3>';
        echo '<p class="phone">' . get_field('phone_number') . '</p>';
    }
    if(get_field('email')){
        echo '<h3>Email:</h3>';
        echo '<p class="email"><a href="mailto:' . get_field('email') . '">' . get_field('email') . '</a></p>';
    }
    ?>
    
</article>

<?php endwhile; ?>


<?php else: ?>
  <article>
    <h1>Sorry...</h1>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  </article>
<?php endif; ?>

<!-- change selected nav menu item to area business -->
<script type="text/javascript">
    $(function(){
       $('#menu-item-118').removeClass('current_page_parent');
    });
</script>
<?php
get_footer();
?>