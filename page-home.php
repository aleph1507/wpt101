<?php get_header(); ?>

	<div class="row">


	
		<div class="row">
			<?php  

				// $args_cat = array(
				// 	'include' => '6,7,8',
				// );

				// $categories = get_categories($args_cat);
				// foreach($categories as $category):
				// 	$args = [
				// 		'type' => 'post',
				// 		'posts_per_page' => 1,
				// 		'category__in' => $category->term_id
				// 	];

				// 	$lastBlog = new WP_Query($args);

				// 	if($lastBlog->have_posts()):
				// 		while($lastBlog->have_posts()):
				// 			$lastBlog->the_post();
				// 			echo '<div class="col-xs-12 col-sm-4">';
				// 				get_template_part('content', 'featured');
				// 			echo '</div>';
				// 		endwhile;
				// 	endif;

				// 	wp_reset_postdata();

				// endforeach;

				// $args = [
				// 	'type' => 'post',
				// 	'posts_per_page' => 3,
				// 	'category__in' => array(6,7,8),
				// 	'category__not_in' => array(9)
				// ];

				// $lastBlog = new 
				// 	WP_Query($args);

				// if($lastBlog->have_posts()){
				// 	while($lastBlog->have_posts()){
				// 		$lastBlog->the_post();
				// 		echo '<div class="col-xs-12 col-sm-4">';
				// 		get_template_part('content', 'featured');
				// 		echo '</div>';
				// 	}
				// }

				// wp_reset_postdata();
			?>

			<div class="col-xs-12">

				<div id="awesome-carousel" class="carousel slide" data-ride="carousel">
				  
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<?php 
						$args_cat = array(
						'include' => '6,7,8',
						);

						$categories = get_categories($args_cat);
						$count = 0;
						$bullets = '';
						foreach($categories as $category):
							$args = [
								'type' => 'post',
								'posts_per_page' => 1,
								'category__in' => $category->term_id
							];

							$lastBlog = new WP_Query($args);
							
							if($lastBlog->have_posts()):
								while($lastBlog->have_posts()):
									$lastBlog->the_post(); 
					?>

									<div class="item <?php if($count==0) echo 'active'; ?>">
								      <?php the_post_thumbnail('full'); ?>
								      <div class="carousel-caption">
								      	<?php the_title(sprintf('<h1 class="entry-title"><a href="%s">',
								      		esc_url(get_permalink())),'</a></h1>'); ?>
								      	<small><?php the_category(' '); ?></small>
								      </div>
								    </div>
									<?php 
										$bullets .= '<li data-target="#awesome-carousel" data-slide-to="'.$count.'" class="';
										if($count == 0)
											$bullets .= 'active';

										$bullets .= '"></li>'; 
									?>
					<?php
								endwhile;
							endif;
							$count++;
							wp_reset_postdata();

						endforeach;
					?>

					<!-- Indicators -->
				  <ol class="carousel-indicators">
				  	<?php echo $bullets; ?>
				  </ol>

				    
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#awesome-carousel" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#awesome-carousel" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
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

				// $lastBlog = new
				// 	WP_Query('type=post&posts_per_page=2&offset=1');
				// if($lastBlog->have_posts()){
				// 	while($lastBlog->have_posts()){
				// 		$lastBlog->the_post();
				// 		get_template_part('content', get_post_format());
				// 	}
				// }

				// wp_reset_postdata();
			?>

			<!-- <hr><hr><h2>tutorials</h2> -->
			<!-- print only tutorials -->
			<?php 
				// $args = array(
				// 	'type' => 'post',
				// 	'posts_per_page' => -1,
				// 	'category_name' => 'tutorials',
				// );
				// $tutorials = new
				// 	WP_Query($args);
				// if($tutorials->have_posts()){
				// 	while($tutorials->have_posts()){
				// 		$tutorials->the_post();
				// 		get_template_part('content',get_post_format());
				// 	}
				// }

				// wp_reset_postdata();
			?>
		</div>
		<div class="col-xs-12 col-sm-4">
			<?php get_sidebar(); ?>
			<?php get_sidebar('menu'); ?>
		</div>
	</div>
	
<?php get_footer(); ?>