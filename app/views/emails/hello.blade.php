<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>E-mail du site lycée ardeche</h2>

		<div>
			<?php
			//get the first name
			$sujet = Input::get('sujet');
			$email = Input::get ('email');
			$message = Input::get ('message');
			?>

			<h1>We been contacted by.... </h1>

			<p>
			Sujet: <?php echo ($sujet); ?>
			Email address: <?php echo ($email);?>
			Message: <?php echo ($message);?>

			</p>
			
		</div>
	</body>
</html>