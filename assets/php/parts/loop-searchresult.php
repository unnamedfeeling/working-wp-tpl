<?php global $options, $tpl, $pmeta, $p, $i;
// $tmeta=get_post_meta( $post->ID, '', false );
?>
<div class="col-xs-12 col-sm-4">
	<div class="educ_el">
		<a href="<?=get_the_permalink( $post->ID )?>" class="educ_link"></a>
		<div class="educ_imgholder">
			<?php if (!has_post_thumbnail( $post->ID )): ?>
			<img src="<?=$tpl?>/assets/img/pholder.png" alt="<?=$post->post_title?>" class="educ_img">
			<?php else:
				$img=get_the_post_thumbnail_url( $post, 'loop-slidecourseimg' );
				?>
			<img src="<?=$img?>" alt="<?=$post->post_title?>" class="educ_img">
			<?php endif; ?>
		</div>
		<div class="educ_shape">
			<div class="educ_text">
				<p class="educ_name"><?=$post->post_title?></p>
				<div class="educ_hider">
					<div class="educ_decor">
						<div class="decor_ds1-cont">
							<div class="decor_line decor_line-white decor_line-left"></div>
							<div class="decor_ds1 decor_ds1-white"></div>
							<div class="decor_line decor_line-white decor_line-right"></div>
						</div>
					</div>
					<p class="educ_discr"><?=(empty($post->post_excerpt))?wp_trim_words( $post->post_content, 10, '...' ):$post->post_excerpt?></p>
				</div>
			</div>
		</div>
	</div>
</div>
