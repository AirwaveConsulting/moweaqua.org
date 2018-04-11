<?php
// the footer and end of page
// lucas lower @ airwaveconsulting
?>

<!-- end of section.content -->
</section>

<!-- page footer -->
<footer id="pagefooter">
    <section class="copy">
        <h1>THE VILLAGE OF <span>MOWEAQUA, IL</span></h1>
        <p>Copyright &copy; 2011-<?php echo date("Y"); ?> The Village of Moweaqua. <br>All rights reserved.</p>
        <p>Design by <a href="http://www.airwaveconsult.com">Airwave Consulting</a>.</p>
        <p><a href="mailto:amy.malone@moweaqua.org?subject=Moweaqua.org Feedback">@ Send Feedback</a> (amy.malone@moweaqua.org)</p>
    </section>
    <section class="nav">
        <form class="search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input name="s" value class="text" type="search" placeholder="Search Moweaqua.org">
            <input class="submit" type="image" src="<?php echo get_template_directory_uri() ?>/img/search_arrow.svg">
        </form>
        <nav class="footernav">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
        </nav>
    </section>
</footer>


<!-- end of div#page -->
</div>

<!-- warning on external link click -->
<script type="text/javascript">
    // make this work like PHP
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }   
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

 $(document).ready(function(){
        
    
$('a.external').click(function(e){
    

    e.preventDefault();
    
    if(getCookie('warning') == ""){
        $('body').append("<div class='warning'><p>You are about to leave Moweaqua.org and go to <strong>" + $(this).text() + "</strong>.<br>Use your browser's back button to return to Moweaqua.org</p><p class='hidewarning'>Don't show this warning again <input type='checkbox' id='checkme'>");
        $('div.warning').append("<div onClick='okayButton()' id='okbtn'>Okay</div><div onClick='cancelButton()' id='cancelbtn'>Cancel</div>");
        
        window.externalHref = $(this).attr('href');
    }
    else{
        window.location = $(this).attr('href');
    }

});
});
// function on 'Okay' click
function okayButton(){
   if($('#checkme').is(':checked')){
       setCookie('warning', 'yes', 3650);
   }
    window.location = window.externalHref;
    $('div.warning').remove();
}

// function on 'Cancel' click
function cancelButton(){
    $('div.warning').remove();
}
     

</script>

<!-- wordpress footer stuff -->
<?php wp_footer(); ?>

</body>
</html>