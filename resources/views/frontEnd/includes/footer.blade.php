
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  text-align: center;
}
.wrapper {
  display: inline-flex;
  justify-content: center;
}
.wrapper i {
  padding: 10px;
  text-shadow: 0px 6px 8px rgba(0, 0, 0, 0.6);
  transition: all ease-in-out 150ms;
}
.wrapper a:nth-child(2) {
  color: #dd4b39;
}

.wrapper a:nth-child(1) {
  color: #4867AA;
}


.wrapper a:nth-child(3) {
  color: #1DA1F2;
}
.wrapper a:nth-child(4) {
  color: #1DA1F2;
}
.wrapper a:nth-child(5) {
  color: #dd4b39;
 } 
.wrapper i:hover {
  margin-top: -3px;
  text-shadow: 0px 14px 10px rgba(0, 0, 0, 0.4);
}
</style>



<div id="templatemo_bottom_panel">
    	<div id="templatemo_bottom_section">
            <div class="templatemo_bottom_section_content">
                <h3>Partner Links</h3>
                <ul>
                    <li><a href="#">Mauris congue felis at nisi</a></li>
                    <li><a href="#">Donec mattis rhoncus mi</a></li>
                    <li><a href="#">Maecenas adipiscing</a></li>
                    <li><a href="#">Nunc blandit orci</a></li>
                    <li><a href="#">Cum sociis natoque</a></li>
                </ul>
            </div>
            
            <div class="templatemo_bottom_section_content">
                    <?php 
                      $all_social=DB::table('social')   
                                     ->first();
                    ?>
                <h3>Follow Us</h3>

<div class="wrapper">
    <a href="{{ $all_social->fb }}" target="_blank"><i class="fa fa-2x fa-facebook-square"></i></a>
    <a href="{{ $all_social->yt }}" target="_blank"><i class="fa fa-2x fa-youtube-play"></i></a>
    <a href="{{ $all_social->tw }}" target="_blank"><i class="fa fa-2x fa fa-twitter"></i>
    <a href="{{ $all_social->ln }}" target="_blank"><i class="fa fa-2x fa fa-linkedin"></i>
    <a href="{{ $all_social->gp }}" target="_blank"><i class="fa fa-2x fa-google-plus"></i></a> 
</div></a>
            </div>
            
            <div class="templatemo_bottom_section_content">
                <h3>About this blog</h3>
                <p>Vivamus laoreet pharetra eros. In quam nibh, placerat ac, porta ac, molestie non, purus. Curabitur sem ante, condimentum non, cursus quis, eleifend non, libero. Nunc a nulla.</p>
                <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a> 
          </div>
            
        </div>
    </div> <!-- end of templatemo bottom panel -->
    
    <div id="templatemo_footer_panel">
    	<div id="templatemo_footer_section">
			Copyright © 2048 <a href="#">Your Company Name</a> | 
            <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
        </div>
    </div>
<div align=center>This template  downloaded form <a href='http://www.google.com'>free website templates</a></div>

   <script id="dsq-count-scr" src="//larablog-14.disqus.com/count.js" async></script>
</body>
</html>