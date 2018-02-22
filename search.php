<?php get_header(); ?>
		<section class="searchresult">
			<div class="container">

				<?php
				// print_r($wp_query);
				get_template_part( 'assets/php/blocks/block', 'posts_ttl' );
				?>
				<div class="educ_loop">
					<?php
					if (have_posts()) {
						$resarr=array();
						foreach ($wp_query->posts as $el) {
							$resarr[$el->post_type][]=$el;
							// print_r($el->post_type);
						}
						unset($el);
						// print_r($resarr);
						foreach ($resarr as $key => $postsarr) {
							echo '<div class="row">';
							echo '<div class="col-xs-12"><h3>'.sprintf(__( 'All found posts of type %s', 'generic' ), $key).'</h3></div>';
							foreach ($postsarr as $el) {
								the_post();
								get_template_part( 'assets/php/parts/loop', 'searchresult' );
							}
							echo '</div>';
						}
					} else { ?>
						<article>
							<h2><?php _e( 'Sorry, nothing to display.', 'generic' ); ?></h2>
						</article>
					<?php } ?>
				</div>
			</div>
		</section>
<?php get_footer(); ?>
