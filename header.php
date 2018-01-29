<?php global $options; ?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title('', true); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= $options['tpld'] ?>/assets/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?= $options['tpld'] ?>/assets/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); 
		if(!empty($options['advd']['custom_css'])){
			echo ($options['advd']['custom_css']!==' ') ? '<style>'.htmlspecialchars_decode($options['advd']['custom_css']).'</style>' : null;
		}
		?>
	</head>
	<body <?php body_class(); ?>>
		<div class="wrapper">
			<header class="header clear" role="banner">
				<div class="logo">
					<a href="<?= home_url(); ?>">
						<img src="<?= $options['tpld'] ?>/img/logo.svg" alt="Logo" class="logo-img">
					</a>
				</div>
				<nav class="nav" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
			</header>
