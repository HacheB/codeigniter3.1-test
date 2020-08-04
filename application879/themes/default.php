<!DOCTYPE html>
<html lang="fr">
<head>
	<?php
		echo meta("X-UA-Compatible", "IE=edge", 'http-equiv');
		echo meta("viewport", "width=device-width, initial-scale=1");
	?>
	<title><?php echo $output['titre']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $output['charset']; ?>" />
	<?php foreach($output['css'] as $url): ?>
		<?php
			$link = array(
				'href'  => $url,
				'rel'   => 'stylesheet',
				// 'type'  => 'text/css', // Attribut non necessaire HTML5
				'media' => 'screen'
			);
			echo link_tag($link);
		?>
	<?php endforeach; ?>
	<style>
		html {
		    font-size: 62.5% !important;
		    font-size: calc(1em * .625) !important;
		}
		body {
		  font-size: 1.4rem;
		}
	</style>
</head>
<body>

	<div id="app">
		<div class="container mt-2">
			<?php echo $output['output']; ?>
		</div>
	</div>


	<?php foreach($output['js'] as $url): ?>
			<script type="text/javascript" src="<?php echo $url; ?>"></script> 
	<?php endforeach; ?>
</body>
</html>
