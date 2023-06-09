<?php include_once __DIR__ . '/logica.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Strong password generator</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"
		defer></script>
</head>
<body>
	<div class="container">
		<h1>Strong password generator</h1>
		<h2>Genera una password sicura</h2><?php

		if (!are_parameters_valid()) { ?>
			<div class="alert alert-danger" role="alert">
				Parametri non validi
			</div><?php
		}

		if (isset($password)) { ?>
			<h3>La tua password sicura è: <?= $password ?></h3>
			<a href="/classe96-0880-strong-password-generator" class="btn btn-secondary">Back</a><?php
		} else { ?>
			<form action="" method="get" novalidate>
				<div class="mb-3">
					<label for="length" class="form-label">Lunghezza password</label>
					<input type="number" class="form-control" id="length" name="length" value="<?= $pass_length ?>">
				</div>


				<h3>è possibile ripetere caratteri?</h3>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="repetition" id="radio-si" <?= $repetition == 1 ? 'checked' : '' ?> value='1'>
					<label class="form-check-label" for="radio-si">
						Si
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="repetition" id="radio-no" <?= $repetition == 0 ? 'checked' : '' ?> value='0'>
					<label class="form-check-label" for="radio-no">
						No
					</label>
				</div>


				<h3>Char set</h3>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="lettere" name="chars[]" value="0" <?= print_chars_checked(0) ?>>
					<label class="form-check-label" for="lettere">
						Lettere
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="numeri" name="chars[]" value="1" <?= print_chars_checked(1) ?>>
					<label class="form-check-label" for="numeri">
						Numeri
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="simboli" name="chars[]" value="2" <?= print_chars_checked(2) ?>>
					<label class="form-check-label" for="simboli">
						Simboli
					</label>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
				<a href="/classe96-0880-strong-password-generator" class="btn btn-secondary">Reset</a>
			</form><?php
		} ?>
	</div>
</body>
</html>
