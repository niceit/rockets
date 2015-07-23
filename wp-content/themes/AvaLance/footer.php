	<!-- Footer -->
	<footer id="footer">
	
		<div class="container">
		
			<div class="eight columns">
				<p class="copyright-text"><?php echo ot_get_option('ava_copyright_text'); ?></p>
			</div>
			
			<!-- Social Networks -->
			<div class="eight columns">
			
				<!-- Social Icons-->
				<ul class="social-networks">
					<?php $ava_facebooklink = ot_get_option('ava_facebook_link'); if($ava_facebooklink != "") 
					echo '<li><a href="'. $ava_facebooklink . '"><i class="icon fa fa-facebook"></i></a></li>'; ?>
					<?php $ava_twitterlink = ot_get_option('ava_twitter_link'); if($ava_twitterlink != "") 
					echo '<li><a href="'. $ava_twitterlink . '"><i class="icon fa fa-twitter"></i></a></li>'; ?>
					<?php $ava_gpluslink = ot_get_option('ava_googleplus_link'); if($ava_gpluslink != "") 
					echo '<li><a href="'. $ava_gpluslink . '"><i class="icon fa fa-google-plus"></i></a></li>'; ?>					
					<?php $ava_linkedinlink = ot_get_option('ava_linkedin_link'); if($ava_linkedinlink != "") 
					echo '<li><a href="'. $ava_linkedinlink . '"><i class="icon fa fa-linkedin"></i></a></li>'; ?>				
					<?php $ava_dribbblelink = ot_get_option('ava_dribbble_link'); if($ava_dribbblelink != "") 
					echo '<li><a href="'. $ava_dribbblelink . '"><i class="icon fa fa-dribbble"></i></a></li>'; ?>				
				</ul>
				
			</div>
		
		</div><!-- end container -->
	
	</footer><!-- end footer -->

</div><!-- end wrapper -->

<!-- End Document
================================================== -->
<?php wp_footer(); ?>
</body>
</html>