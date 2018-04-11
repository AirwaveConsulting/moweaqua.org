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
	<img src="<?php echo get_template_directory_uri() ?>/img/MoweaquaLogoSmall.png" class="seal">
    <h1>Welcome to Moweaqua.org</h1>
    <p>The best place to find municipal services and information<span>Simpler, clearer, faster</span></p>
    <form class="search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input name="s" value class="text" type="search" placeholder="Search Moweaqua.org">
        <input class="submit" type="image" src="<?php echo get_template_directory_uri() ?>/img/search_arrow.svg">
    </form>
    
    <!-- alert box -->
    <?php if(get_field('alert_title')): ?>
    <section class="alertbox" id="alert1box">
        <header onClick="expandAlert1()" class="alertheader" id="alert1header">
            <svg class="alerticon" fill="#ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M11 15h2v2h-2zm0-8h2v6h-2zm.99-5C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
            </svg>
            <span class="alerttitle"><?php the_field('alert_title'); ?></span>
            <div class="expand"><span class="clickto" id="clickto1">Click to <span>expand</span></span>
                <svg class="alertarrow" id="alert1arrow" fill="#ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
                    <path d="M0-.75h24v24H0z" fill="none"/>
                </svg>
            </div>
        </header>
        <section class="alertcontent">
        <?php the_field('alert_message'); ?>
        </section>
    </section>

  
    <!-- alert box script -->
        <script type="text/javascript">
        $(function(){
            $alertBox1Height = $('#alert1box').outerHeight();
            $alertBox1HeaderHeight = $('#alert1header').css('height');
            $('#alert1box').css('height', $alertBox1HeaderHeight);
        });
        function expandAlert1(){
            if($('#alert1box').css('height') == $alertBox1HeaderHeight){
                $('#alert1box').css('height', $alertBox1Height);
                $('#alert1arrow').css('transform', 'rotate(180deg)');
                $('div.expand span#clickto1 span').html('close');
            }
            else{
                $('#alert1box').css('height', $alertBox1HeaderHeight);
                $('#alert1arrow').css('transform', 'rotate(0deg)');
                $('div.expand span#clickto1 span').html('expand');
            }
        }
        </script>
    <?php endif; ?>

<?php if(get_field('alert_2_title')): ?>
    <section class="alertbox" id="alert2box">
        <header onClick="expandAlert2()" class="alertheader" id="alert2header">
            <svg class="alerticon" fill="#ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M11 15h2v2h-2zm0-8h2v6h-2zm.99-5C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
            </svg>
            <span class="alerttitle"><?php the_field('alert_2_title'); ?></span>
            <div class="expand"><span class="clickto" id="clickto2">Click to <span>expand</span></span>
                <svg class="alertarrow" id="alert2arrow" fill="#ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
                    <path d="M0-.75h24v24H0z" fill="none"/>
                </svg>
            </div>
        </header>
        <section class="alertcontent">
        <?php the_field('alert_2_message'); ?>
        </section>
    </section>

   <!-- alert box script -->
        <script type="text/javascript">
        $(function(){
            $alertBox2Height = $('#alert2box').outerHeight();
            $alertBox2HeaderHeight = $('#alert2header').css('height');
            $('#alert2box').css('height', $alertBox2HeaderHeight);
        });
        function expandAlert2(){
            if($('#alert2box').css('height') == $alertBox2HeaderHeight){
                $('#alert2box').css('height', $alertBox2Height);
                $('#alert2arrow').css('transform', 'rotate(180deg)');
                $('div.expand span#clickto2 span').html('close');
            }
            else{
                $('#alert2box').css('height', $alertBox2HeaderHeight);
                $('#alert2arrow').css('transform', 'rotate(0deg)');
                $('div.expand span#clickto2 span').html('expand');
            }
        }
        </script>
    <?php endif; ?>
</header>

<?php 

the_content();

// end of section.content will come right after this

endwhile;

get_footer();
?>