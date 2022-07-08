<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="X-UA-Compatible" 	content="IE=edge">
		<meta name="viewport" 				content="width=device-width, initial-scale=1">
		<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
		<meta charset="utf-8">
		<title><?= $title; ?></title>
		<meta http-equiv="Content-Type" 	content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="pt-br">
		<meta name="copyright" 				content="<?= PAGE_AUTHOR; ?>" />
		<meta name="referrer"				content="unsafe-url" />
		<meta name="description" 			content="<?= $description; ?>" />
		<meta name="keywords" 				content="<?= $keywords; ?>" />
		<meta name="google"					content="notranslate">
		<meta name="author" 				content="<?= PAGE_AUTHOR; ?>">
		<link rel="publisher" 				href="<?= PUBLISHER; ?>" />
		<link rel="canonical" 				href="<?= HTTP_PAGE.$canonical; ?>" />
		<meta name="theme-color"			content="<?= THEME_COLOR; ?>" />
		<meta name="apple-mobile-web-app-capable" 			content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style"	content="black-translucent" />
		<meta name="title"					content="<?= $title; ?>" />
		<meta name="description"			content="<?= $description; ?>" />
		<meta property="og:site_name"		content="<?= SITE_NAME; ?>" />
		<meta property="og:type"			content="website" />
		<meta property="og:locale"			content="pt_BR" />
		<meta property="og:title"			content="<?= $title; ?>" />
		<meta property="og:description"		content="<?= $description; ?>" />
		<meta property="og:url"				content="<?= HTTP_PAGE.$canonical; ?>" />
		<meta property="og:image"         	content="<?= HTTP_PAGE; ?>images/cards/<?= $card; ?>" />
		<meta property="og:image:type"		content="image/jpg">
		<meta property="og:image:width"		content="1200">
		<meta property="og:image:height"	content="630">
		<meta name="twitter:card"			content="summary_large_image">
		<meta name="twitter:site"			content="@<?= TWITTER_USER; ?>">
		<meta name="twitter:creator"		content="@<?= TWITTER_USER; ?>">
		<meta name="twitter:url"			content="<?= HTTP_PAGE.$canonical; ?>">	
		<meta name="twitter:title"			content="<?= $title; ?>">
		<meta name="twitter:description"	content="<?= $description; ?>">
		<meta name="twitter:image"			content="<?= HTTP_PAGE; ?>images/cards/<?= $card; ?>">
		<meta name="twitter:image:alt"		content="<?= $alt; ?>">
		<link rel="shortcut icon" href="<?= HTTP_PAGE; ?>images/favicons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="60x60" href="<?= HTTP_PAGE; ?>images/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?= HTTP_PAGE; ?>images/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?= HTTP_PAGE; ?>images/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?= HTTP_PAGE; ?>images/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?= HTTP_PAGE; ?>images/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?= HTTP_PAGE; ?>images/favicons/favicon-16x16.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?= HTTP_PAGE; ?>images/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="192x192" href="<?= HTTP_PAGE; ?>images/favicons/android-chrome-192x192.png">
		<meta name="theme-color" content="<?= THEME_COLOR; ?>">
		<link rel="manifest" href="<?= HTTP_PAGE; ?>site.webmanifest">
		<link rel="mask-icon" href="<?= HTTP_PAGE; ?>images/favicons/safari-pinned-tab.svg" color="#694F84">
		<meta name="apple-mobile-web-app-title" content="<?= $title; ?>">
		<meta name="application-name" content="<?= $title; ?>">
		<meta name="msapplication-TileColor" content="<?= THEME_COLOR; ?>">
		<meta name="msapplication-TileImage" content="<?= HTTP_PAGE; ?>images/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?= HTTP_PAGE; ?>browserconfig.xml">
		<link rel="dns-prefetch" href="https://fonts.googleapis.com" />
		<link rel="dns-prefetch" href="https://kit.fontawesome.com" />
		<link rel="dns-prefetch" href="https://ajax.googleapis.com" />
		<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com" />
		<link rel="dns-prefetch" href="https://cdn.jsdelivr.net" />
		<link rel="prefetch" href="https://kit.fontawesome.com/716bc96389.js" as="script">
		<link rel="prefetch" href="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" as="script">
		<link rel="prefetch" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" as="script">
		<link rel="prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" as="script">
		<link rel="prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" as="script">
		<link rel="prefetch" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" as="style">
		<link rel="prefetch" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" as="style">
		<link rel="preload" href="<?= HTTP_PAGE; ?>css/main.css" as="style">
        <?php
            foreach ($style as &$value) {
                echo "<link rel=\"stylesheet\" type=\"text/css\"  href=\"".HTTP_PAGE."css/$value.css\">
";
            }
        ?>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.default.min.css" integrity="sha512-wghhOJkjQX0Lh3NSWvNKeZ0ZpNn+SPVXX1Qyc9OCaogADktxrBiBdKGDoqVUOyhStvMBmJQ8ZdMHiR3wuEq8+w==" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
		<link rel="stylesheet" type="text/css"  href="<?= HTTP_PAGE; ?>css/main.css">
		<script src="https://kit.fontawesome.com/716bc96389.js" crossorigin="anonymous"></script>
		<!-- TAGS REDES SOCIAIS -->
		<!--<?= "Tag Analytics"; ?>-->
		<!--<?= "Pixel Facebook"; ?>-->
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>
	<body class="d-flex flex-column min-vh-100">
		<?php include(__DIR__.str_replace('/',DIRECTORY_SEPARATOR,"/../Views/header.php")); ?>
		<main id="page-content">
			<?php $this->loadView($nameView, $dataModel); ?>
			<div class="alert text-center cookiealert" role="alert">
				<b>Nós usamos cookies para melhorar a sua experiência de usuário. <a href="<?= HTTP_PAGE; ?>docs/politica.html" target="_blank">Veja nossa política de utilização de dados</a>
				<button type="button" class="btn btn-primary btn-sm acceptcookies">Aceito</button>
			</div>
		</main>
		<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-primary text-light">
			<div class="container text-center">
			<?php include(__DIR__.str_replace('/',DIRECTORY_SEPARATOR,"/../Views/footer.php")); ?>
			</div>
		</footer>
	</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" integrity="sha512-X7kCKQJMwapt5FCOl2+ilyuHJp+6ISxFTVrx+nkrhgplZozodT9taV2GuGHxBgKKpOJZ4je77OuPooJg9FJLvw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js" integrity="sha512-qzgd5cYSZcosqpzpn7zF2ZId8f/8CHmFKZ8j7mU4OUXTNRd5g+ZHBPsgKEwoqxCtdQvExE5LprwwPAgoicguNg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.widgets.min.js" integrity="sha512-dj/9K5GRIEZu+Igm9tC16XPOTz0RdPk9FGxfZxShWf65JJNU2TjbElGjuOo3EhwAJRPhJxwEJ5b+/Ouo+VqZdQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/extras/jquery.tablesorter.pager.min.js" integrity="sha512-y845ijdup9lDunrcSRQAlFdQICHVhkB5UNguWRX8A3L+guxO7Oow0poojw0PLckhcKij++h85bnyro80fjR9+A==" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= HTTP_PAGE; ?>js/main.js"></script>
<?php
foreach ($javascript as &$value) {
	echo "<script type=\"text/javascript\" src=\"".HTTP_PAGE."js/$value.js\"></script>
";
}
?>
</html>