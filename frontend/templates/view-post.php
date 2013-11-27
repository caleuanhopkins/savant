<!DOCTYPE html id="root">
<!--[if lt IE 7 ]> <html class="ie6" id="root"> <![endif]-->
<!--[if IE 7 ]> <html class="ie7" id="root"> <![endif]-->
<!--[if IE 8 ]> <html class="ie8" id="root"> <![endif]-->
<!--[if gt IE 8 ]> <html class="ie9" id="root"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html id="root"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>CEH - Hybrid 2013</title>
    <meta name="description" content="">
    <meta name="author" content="Callum Hopkins || @caleuanhopkins">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/_inc/css/main.css">
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/_inc/js/libs/browser-detect.js"></script>
    <script src="/_inc/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body class="home" id="homepage">
	<header class="container">
		<figure class="centered one clearing">
			<img src="/_inc/imgs/branding/logo.png" />
		</figure>
		<figure class="centered three">
			<img src="/_inc/imgs/branding/hybrid.png" />
		</figure>
	</header>
	
	<section id="main" role="main" class="container">
	
		<?php foreach($posts as $post): ?>
			<article class="centered fifteen clearing">
				<?php if(!empty($post['fimg']) && isset($post['fimg'])): ?>
					<figure class="centered fifteen">
						<img src="<?php echo $post['fimg']; ?>"/>
					</figure>
				<?php endif; ?>
				<h2 class="centered fifteen clearing"><a href="<?php echo $this->base->url."/index.php?id=".$post['id']; ?>"><?php echo(!empty($post['title'])? $post['title']: ''); ?></a><span><?php echo(!empty($post['date'])? date('g:i a d/m/Y',$post['date']): ''); ?></span></h2>
				<hr/>
				<div class="centered fifteen"><?php echo(!empty($post['content'])? $post['content']: ''); ?></div>
		<?php endforeach; ?>
		
	</section>

	<footer class="clearing">
		<div class="centered container clearing">
			<p class="left half col">All rights Reserved. Hybrid Conference Logo Copyright Hybrid Conference.</p><p class="pushright col five"><a href="https://www.twitter.com/caleuanhopkins" target="_blank">@caleuanhopkins</a></p>
		</div>
	</footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="/_inc/js/plugins-dev.js"></script>
    <script src="/_inc/js/script.js"></script>
</body>
</html>