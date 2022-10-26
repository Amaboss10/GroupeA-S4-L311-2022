<?php

	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);	
	ini_set('display_errors', 'On');
	include'inc.twig.php';

	//~ $template_index charge le template
	$template_index = $twig->loadTemplate('index.tpl');

	//~ $n_jours_previsions correspond aux nombres de jours qui vont etre prévu
	$n_jours_previsions = 3;
	
	//~ $ville correspond au nom de la ville 
	$ville = "Limoges"; 

	//~ Clé API
	//~ Si besoin, vous pouvez générer votre propre clé d'API gratuitement, en créant 
	//~ votre propre compte ici : https://home.openweathermap.org/users/sign_up
	$apikey = "10eb2d60d4f267c79acb4814e95bc7dc";

	//~ $data_url correspond à l'adresse url ou se trouve les données pour la prévision méteo
	$data_url = 'http://api.openweathermap.org/data/2.5/forecast/daily?APPID='.$apikey.'&q='.$ville.',fr&lang=fr&units=metric&cnt='.$n_jours_previsions;

	//~ $data_contenu correspond aux données à l'adresse  de $data_url
	$data_contenu = file_get_contents($data_url);
	
	//~ $_data_array (array) correspond aux json décodé de $data_contenu
	$_data_array = json_decode($data_contenu, true);

	//~ $_ville correspond aux ville de $_data_array
	$_ville = $_data_array['city'];
	//~ $_journees_meteo correspond aux journées avec toutes les informations
	$_journees_meteo = $_data_array['list'];

	//~ Change le code des types 
	for ($i = 0; $i < count($_journees_meteo); $i++) {
		$_meteo = getMeteoImage($_journees_meteo[$i]['weather'][0]['icon']);
		
		$_journees_meteo[$i]['meteo'] = $_meteo;
	}

	//~ Charges les variables dans le template
	echo $template_index->render(array(
		'_journees_meteo'	=> $_journees_meteo,
		'_ville'			=> $_ville,
		'n_jours_previsions'=> $n_jours_previsions
	));

	//~ La fonction getMeteoImage($code) prend en paramètre le code contenu dans le JSON, et donne la bonne classe CSS correspondante pour l'icône
	function getMeteoImage($code){
		if(strpos($code, 'n'))
			return 'entypo-moon';
		

		$_icones_meteo = array(
			'01d' => ' entypo-light-up',
			'02d' => ' entypo-light-up',
			'03d' => ' entypo-cloud',
			'04d' => ' entypo-cloud',
			'09d' => ' entypo-water', 
			'10d' => ' entypo-water',
			'11d' => ' entypo-flash',
			'13d' => ' entypo-star',
			'50d' => ' entypo-air');

		if(array_key_exists($code, $_icones_meteo)){
			return $_icones_meteo[$code];
		}else{
			return 'entypo-help';
		}
	}

?>