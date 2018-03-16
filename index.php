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
								<h3><a href="<?php the_permalink(); ?>"><?php The_title(); ?></a></h3>
							</div>
							<img src="<?php bloginfo('template_url'); ?>img/dummies/blog/img1.jpg" alt="" />
						</div>
						<p>
							 <?php echo substr(get_the_excerpt(),0,300); ?>
						</p>
						<div class="bottom-article">
							<ul class="meta-post">
								<li><i class="icon-calendar"></i><a href="#"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> </a></li>
								<li><i class="icon-user"></i><a href="#"><?php the_author(); ?></a></li>
								<li><i class="icon-folder-open"></i><a href="#"><?php the_category(); ?></a></li>
								
							</ul>
							<a href="<?php the_permalink(); ?>" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
						</div>
				</article>

				<?php endwhile;
				endif;
				//next_posts_link(">> Next Posts");
				//previous_posts_link("<< Previous Posts");
				?>
				
				
				<div id="pagination">
				<?php //the_posts_pagination(); 
						the_posts_pagination(
							array(
								'mid_size' => '2',
								'prev_text' => 'Previous Posts',
								'next_text' => 'Next Posts',
								'screenreader_text' => 'Numbered Pagination'
							)
						);
					
					
				?>
				</div>
			</div>
			<!-- sidebar widget -->
			<?php get_sidebar(); ?>
		</div>
	</div>
	</section>
	<?php get_footer(); ?>