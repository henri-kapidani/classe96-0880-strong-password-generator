<?php
//var_dump($_GET);

$pass_length			= $_GET['length'] ?? ''; // deve essere un numero intero
$repetition				= $_GET['repetition'] ?? '0'; // '0', '1'
$possible_char_sets	= $_GET['chars'] ?? []; // [0, 2]

$char_set = [
	'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	'0123456789',
	'+*-/=@_?,;.:',
];

if ($pass_length && $possible_char_sets) {
	// generare la password

	// $password = '';
	// for ($i = 0; $i < $pass_length; $i++) {
	// 	// seleziona un indice random da $possible_char_sets
	// 	$char_set_index = $possible_char_sets[array_rand($possible_char_sets)];
	// 	$char_set_group = $char_set[$char_set_index];

	// 	// seleziona il carattere random all'interno della stringa selezionata prima
	// 	$char_index = rand(0, strlen($char_set_group) - 1);
	// 	$random_char = $char_set_group[$char_index];

	// 	// aggiungiamo il carattere alla $password che stiamo costruendo
	// 	$password .= $random_char;
	// }

	$password = '';
	while (strlen($password) < $pass_length) {
		// seleziona un indice random da $possible_char_sets
		$char_set_index = $possible_char_sets[array_rand($possible_char_sets)];
		$char_set_group = $char_set[$char_set_index];

		// seleziona il carattere random all'interno della stringa selezionata prima
		$char_index = rand(0, strlen($char_set_group) - 1);
		$random_char = $char_set_group[$char_index];

		// aggiungiamo il carattere alla $password che stiamo costruendo
		if ($repetition) {
			$password .= $random_char;
		} else {
			if (!str_contains($password, $random_char)) {
				$password .= $random_char;
			}
		}
	}
}


function are_parameters_valid() {
	// funzione di validazione semplificata
	return (
				!$_GET ||
				(
					isset($_GET['length']) &&
					$_GET['length'] &&
					isset($_GET['repetition']) &&
					isset($_GET['chars'])
				)
			);
}


function print_chars_checked($index) {
	if ($_GET) {
		if (isset($_GET['chars'])) {
			return in_array($index, $_GET['chars']) ? 'checked' : '';
		}
		return '';
	}
	return 'checked';
}
