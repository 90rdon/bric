<?php



/**



 * The template for displaying the footer.



 *



 * Contains the closing of the id=main div and all content after



 *



 * @package WordPress



 * @subpackage Twenty_Eleven



 * @since Twenty Eleven 1.0



 */



?>







      <div class="clear-both"></div>



      <!--<div class="footer">



        <div id="footer-content">



          <div id="footer-links">



            <div id="footer-regular-links"> <a href="http://bricrealty.com/story-of-bric-realty" id="story-of-bric-realty">STORY OF BRIC REALTY</a> | <a href="http://bricrealty.com/news-updates" id="footer-news-updates">NEWS &amp; UPDATES</a> | <a href="http://bricrealty.com/faqs" id="footer-faq">FAQS</a> | <a href="http://bricrealty.com/site-map" id="footer-sitemap">SITE MAP</a> </div>



            



          </div>



          <p id="footer-phone"><strong>8803 Futures Drive, Suite 5A, Orlando, Florida, 32819</strong></p>





        </div>



      </div>-->



      



      <div class="new_footer">



    	<div class="footer_left">



        	<div class="footer_logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="http://bricrealty.com/wp-content/themes/my_theme/images/footer_logo.png" width="71" /></a></div>



            <div class="footer_adrs">



            	<div class="footer_menu">



<?php $footer_menu = array(



'menu'            => 'footer_menu',



);



?>



<?php wp_nav_menu( $footer_menu ); ?>



                <div class="clear"></div>



                </div>



                <p>8803 Futures Drive, Suite 5A, Orlando, Florida, 32819</p>

<p style="font-size:10px;"><a style="font-size:10px;color:#748594;" href="http://cherieyoung.com/" target="_blank">Custom Websites</a> by <a style="font-size:10px;color:#748594;" href="http://cherieyoung.com/" target="_blank">Cherie Young</a></p>

            </div>



        <div class="clear"></div>    



        </div>



        



        <div class="footer_right">



        	<div class="news">



            	<div class="top_cornerbox">



					<ul id="global-nav-2">



       					 <li id="globalnav-li-news-updates"> <a href="<?php echo get_page_link(162); ?>"><span><?php echo get_the_title(162); ?></span></a> 													                         </li>



                    </ul>



				</div>



     				







            <div class="clear"></div>



            </div>



            <div class="copyright">Copyright © 2013 Bric Realty, LLC. All rights reserved</div>



        </div>



    <div class="clear"></div>	



    </div>



      



    <!--<div id="footer-extend">



                <div title="Realty" id="footer-logo"></div>		



        		<div id="legal-footer">



				<div class="footer_nemu">







        	</div>  



      



      </div>



  </div>-->















<?php wp_footer(); ?>







</body>



</html>