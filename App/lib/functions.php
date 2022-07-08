<?php

function telefone($string) {
	$tamanho = strlen($string);
	if ($tamanho == 11) {
		$ddd = substr($string, 0, 2);
		$tel1 = substr($string, 2, 5);
		$tel2 = substr($string, -4);
		$tele = '('.$ddd.')'.$tel1.'-'.$tel2;
	} elseif ($tamanho == 10) {
		$ddd = substr($string, 0, 2);
		$tel1 = substr($string, 2, 4);
		$tel2 = substr($string, -4);
		$tele = '('.$ddd.')'.$tel1.'-'.$tel2;
	} elseif ($tamanho == 0) {
		$tele = "";
	} else {
		$tele = $string;
	}
	return $tele;
}

?>