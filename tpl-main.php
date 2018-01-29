<?php /* Template Name: Главная */ get_header();
global $options, $tpl, $pmeta, $p;
$pmeta=get_post_meta( $post->ID, '', false );

	if (have_posts()): while (have_posts()) : the_post();

		if (empty($pmeta[$p.'mod_slider'][0])) {
			get_template_part( 'assets/php/blocks/block', 'index_top' );
		}

	endwhile;
	else: ?>
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'spdaks' ); ?></h2>
	</article>
	<?php endif;

get_footer(); ?>
