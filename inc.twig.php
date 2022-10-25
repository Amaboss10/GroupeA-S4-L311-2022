<?php
	include_once('lib/Twig/Autoloader.php');

	Twig_Autoloader::register();

	$templates = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($templates);

?>
 