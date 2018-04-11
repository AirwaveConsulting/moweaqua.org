<?php
// the 404 file

// lucas lower @ airwaveconsulting

get_header();

?>

<!-- section.content comes right before this -->
<header id="contentheader">
    <h1>Page Not Found</h1>
<br>
<p>Whoops! It appears that whatever you were looking for doesn't exist. You can try searching for it below. If you still can't find it, you can email <a href="mailto:lucas@moweaqua.org">lucas@moweaqua.org</a> and describe the problem.</p>
<br>
<form class="search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input name="s" value class="text" type="search" placeholder="Search Moweaqua.org">
        <input class="submit" type="image" src="<?php echo get_template_directory_uri() ?>/img/search_arrow.svg">
</form>
    
</header>

<!-- remove current_page_parent from 'Meeting Minutes' -->
<script type="text/javascript">
$(function(){
    // menu-item-118 is the ID of the 'Meeting Minutes' li. Really not best practice as this could change (somehow), but there aren't many other options
   $('#menu-item-118').removeClass('current_page_parent'); 
});
</script>

<?php
// end of section.content will come right after this

get_footer();
?>