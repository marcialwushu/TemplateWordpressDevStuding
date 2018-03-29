<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">

			<style type="text/css">
			.myclass ul{
				list-style-type:none;
			}
			</style>

				<div class="widget myclass">
					<?php dynamic_sidebar('Footer1'); ?>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<?php dynamic_sidebar('Footer2'); ?>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<?php dynamic_sidebar('Footer3'); ?>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<?php dynamic_sidebar('Footer4'); ?>
					<div class="clear">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; Moderna 2014 All right reserved. By </span><a href="http://bootstraptaste.com" target="_blank">Bootstraptaste</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php  wp_footer(); ?>
