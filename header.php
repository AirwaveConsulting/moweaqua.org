<?php
// Moweaqua.org WordPress theme
// Designed by Lucas Lower & Tylor Martin @ AirwaveConsult.com

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="<?php echo get_template_directory_uri() ?>/style.css" type="text/css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/img/favicon.png">
    
    <!-- jQuery, touchSwipe, and SlideAndSwipe libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    
    <!-- Analytics -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93482305-1', 'auto');
  ga('send', 'pageview');

</script>
    
    <!-- wordpress header stuff -->
    <?php wp_head(); ?>
</head>
    
<body>
<?php
if ( is_front_page() ) :
?>
    <header id="pageheader">
<script type="text/javascript">
if($(window).width() > 1000){
	$('#pageheader').attr('class', 'homepage');
}
$(window).on('resize', function(){
	if($(window).width() <= 1000){
	$('#pageheader').attr('class', 'mobile');
	$('#pageheader').css('background', '#243B55');
	clearTimeout(window.theTimeout);
}
});
</script>
<?php else : ?>
<!-- PAGE HEADER -->
    <header id="pageheader">
    <?php endif; ?>
    <!-- Mobile menu button -->
    <div onClick="expandMenu()" class="menu_button">
        <svg fill="#ffffff" height="30" viewBox="0 0 24 24" width="30" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
        </svg>
    </div>
    
    <!-- Logo section -->
    <section class="logo">
        <!-- previous/next buttons for the slider -->
        <div id="sliderPrevious" title="Previous Image"></div>
        <div id="sliderNext" title="Next Image"></div>
        
        <!-- pause button for the slider -->
        <div id="sliderToggle" class="pause" title="Pause/Play Slider"></div>
        
        <div class="logowrap">
                <span class="village"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png">THE VILLAGE OF </span><span class="moweaqua">MOWEAQUA, IL</span>
            <form class="search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input name="s" value class="text" type="search" placeholder="Search Moweaqua.org">
                <img onClick="expandSearch()"  src="<?php echo get_template_directory_uri() ?>/img/search.svg" class="submit"></img>
                <input class="submit" type="image" src="<?php echo get_template_directory_uri() ?>/img/search_arrow.svg">
            </form>
        </div>
        
            <!-- expand search functions -->
            <script type="text/javascript">
                function expandMenu(){
                    $('aside#navigation').css('left', '0');
                    $('div.menu_obscure').css('display', 'block');
		    $('body').css('overflow-y', 'hidden');
                }
                function closeMenu(){
                    $('aside#navigation').css('left', '-80%');
                    $('div.menu_obscure').css('display', 'none');
		    $('body').css('overflow-y', 'auto');
                }
                function expandSearch(){
                    $('header#pageheader form.search input.text').css('display', 'block');
                    $('header#pageheader form.search img.submit').css('display', 'none');
                    $('header#pageheader form.search input.submit').css('display', 'block');
                    $('header#pageheader form.search input.text').focus();
                }
                function hideSearch(){
                    $('header#pageheader form.search input.text').css('display', 'none');
                    $('header#pageheader form.search img.submit').css('display', 'block');
                    $('header#pageheader form.search input.submit').css('display', 'none');
                }
                var keepFocus = false;

                function hideMePlease(){
                    if(!keepFocus){
                        if($('header#pageheader section.logo span.village').css('display') == 'none'){
                            hideSearch();
                        }
                    }
                }
                    $('header#pageheader form.search input.submit').blur(function() {
                        keepFocus = false;
                        window.setTimeout(hideMePlease, 100);
                    }).focus(function(){
                        keepFocus = true;
                    });
                    $('header#pageheader form.search input.text').blur(function() {
                        keepFocus = false;
                        window.setTimeout(hideMePlease, 100);
                    }).focus(function(){
                        keepFocus = true;
                    });
            </script>
<?php
if ( is_front_page() ) :
?>
<script type="text/javascript">

// Header image background looper
// Assumes that all files are located in /img/header/ directory
// Assumes that all files are .jpg
// Assumes that all files are numbered, e.g. 1.jpg, 2.jpg...
// Assumes that the header selector is #pageheader
// Customize by changing "totalImages" to how many images are in the directory
// By Lucas Lower @ Airwave Consulting


// CONFIGURATION
    
    // total number of images
    window.totalImages = 9;
    
    // relative path to image directory in the base theme folder, example: '/img/header/'
    window.thePath = '/img/header/';
    
    // the image extension, example: '.jpg' or '.png'
    window.theExtension = '.jpg';

    // the selector of the slider element
    window.theSlider = '#pageheader.homepage';
    
    // the selector of the previous, pause, and next buttons
    window.previousButton = '#sliderPrevious';
    window.pauseButton = '#sliderToggle';
    window.nextButton = '#sliderNext';

// The preload function
$(function(){
    // preload the images into cache so they don't act goofy when switched
    for(i = 1; i <= window.totalImages; i++){
        $('body').append('<img class="hiddenimg" src="<?php echo get_template_directory_uri() ?>' + window.thePath + i + window.theExtension);
    }
});

// the changeBG() function. This function does all the work
function changeBG(){
    // check if this is the first time the script has ran
    // checks localStorage to see if currentitem is set
    // if it isn't, we set it to 0 so that we can add "1" to it and get our first image
    if(localStorage.getItem('currentitem') == null){
        localStorage.setItem('currentitem', 0);
    }
    
    // get the current image number
    var currentitem = localStorage.getItem('currentitem');
    
    // check to see if we are at the end of the loop
    // if we aren't, set the next item to currentitem + 1
    // if we are, set the next item to 1 (start over)
    var theitem = 0;
    
    if(currentitem < window.totalImages){
        theitem = +currentitem + 1;
    }
    else{
        theitem = 1;
    }
    
    // create the path for the next image
    var thepath = "<?php echo get_template_directory_uri() ?>" + window.thePath + theitem + window.theExtension;
    
    // change CSS values to the next image
    $(window.theSlider).css('background', 'url("' + thepath + '")');
    $(window.theSlider).css('background-size', 'cover');
    $(window.theSlider).css('background-position', 'center center');
    
    // set the current image index
    localStorage.setItem('currentitem', theitem);
    
    // call a setTimeout to run the function again in 8 seconds
    // we use a variable so we can cancel it if the user pauses the slider
    window.theTimeout = setTimeout(changeBG, 8000);
}
    
// run the function on page load for first time (after that, it will run from the timeouts unless stopped)
changeBG();
    
// function to pause on click (and change the button to a play button)
$(window.pauseButton).click(function(){
    
    // check to see if the button is a pause button
   if($(window.pauseButton).attr('class') == 'pause'){
       
       // change the button to a play button
       $(window.pauseButton).attr('class', 'play');
       
       // clear the timeout from the last time the function ran
       clearTimeout(window.theTimeout);
   }
    else{
        
        // change the button to a pause button
        $(window.pauseButton).attr('class', 'pause');
        
        // run the function again to change image and set the next timeout
        changeBG();
    }
});
    
// function to show the next image
$(window.nextButton).click(function(){
    
    // clear the timeout that may be enabled already
    clearTimeout(window.theTimeout);
    
    // run the function
    changeBG();
});
    
// function to show previous image
$(window.previousButton).click(function(){
    
    // get the current image we are on
    var currentitem = localStorage.getItem('currentitem');
    
    // set the local storage variable to 2 images back
    // we set it to 2 back because when changeBG() is ran, it will add 1 to the number and give us the image before the current one
    // example: if we are at image #2, this sets the currentitem to 0, so when we run changeBG(), 1 is added and we are at image #1
    // if the currentitem is 1, we set the currentitem to the total # of images minus 1 so we will get the last image (to loop around)
    if(currentitem >= 2){
        localStorage.setItem('currentitem', +currentitem - 2);
    }
    else{
        localStorage.setItem('currentitem', window.totalImages - 1);
    }
    
    // clear the timeout that may be enabled already
    clearTimeout(window.theTimeout);
    
    // call the function, which will now use the new currentitem in localstorage that we calculated
    changeBG();
});
</script>
        <?php endif; ?>
    </section>
</header>
    
<!-- PAGE WRAP -->
<div id="page">
    
<!-- NAVIGATION -->
<aside id="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
</aside>
    
<!-- darker background for when the mobile menu is shown -->
<div onClick="closeMenu()" class="menu_obscure"></div>
    
<!-- init slideandswipe -->

    
<!-- CONTENT AREA -->
<section id="content">
