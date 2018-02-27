<?php get_header(); ?>

	<div class="row">
	
		<div class="col-xs-12">
			<?php  
				$lastBlog = new 
					WP_Query('type=post&posts_per_page=1');

				if($lastBlog->have_posts()){
					while($lastBlog->have_posts()){
						$lastBlog->the_post();
						get_template_part('content', get_post_format());
					}
				}

				wp_reset_postdata();
			?>
		</div>

		<div class="col-xs-12 col-sm-8">
			<?php 
				if(have_posts()):
					while(have_posts()): 
						the_post(); ?>

						<?php get_template_part('content', get_post_format()); ?>
						
					<?php endwhile;
				endif;

				// print other 2 posts without the first one

				$lastBlog = new
					WP_Query('type=post&posts_per_page=2&offset=1');
				if($lastBlog->have_posts()){
					while($lastBlog->have_posts()){
						$lastBlog->the_post();
						get_template_part('content', get_post_format());
					}
				}

				wp_reset_postdata();
			?>

			<hr><hr><h2>tutorials</h2>
			<!-- print only tutorials -->
			<?php 
				$args = array(
					'type' => 'post',
					'posts_per_page' => -1,
					'category_name' => 'tutorials',
				);
				$tutorials = new
					WP_Query($args);
				if($tutorials->have_posts()){
					while($tutorials->have_posts()){
						$tutorials->the_post();
						get_template_part('content',get_post_format());
					}
				}

				wp_reset_postdata();
			?>
		</div>
		<div class="col-xs-12 col-sm-4">
			<?php get_sidebar(); ?>
			<?php get_sidebar('menu'); ?>
		</div>
	</div>
	
<?php get_footer(); ?>