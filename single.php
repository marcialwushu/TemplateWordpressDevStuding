<?php get_header(); ?>
	<!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Blog</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">


			<?php if( have_posts()): 
					while( have_posts()): the_post();
			
					
			
			?>
				<article>
						<div class="post-image">
							<div class="post-heading">
								<h3><a href=""><?php The_title(); ?></a></h3>
							</div>
							<?php the_post_thumbnail(); ?>
						</div>
						<p>
							 <?php the_content(); ?>
						</p>
						
				</article>

				<?php endwhile;
				endif;

				previous_post_link('<b><< %link </b>');
				next_post_link('<b> %link >></b>');
				
				?>
				
				<?php 

					if(comments_open() ){
						comments_template();
					} else {
						echo "Comments are closed";
					}

				?>
				
				
			</div>
            <!-- sidebar widget -->
			<?php  get_sidebar(); ?>
		</div>
	</div>
	</section>
	<?php get_footer(); ?>