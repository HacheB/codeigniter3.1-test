<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $output['titre']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $output['charset']; ?>" />
	<?php foreach($output['css'] as $url): ?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
	<?php endforeach; ?>

	<style type="text/css"></style>
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
