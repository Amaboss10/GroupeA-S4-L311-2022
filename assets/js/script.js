//~ On attend que le DOM de la page soit disponible
$(document).ready(function(){

	//~ $jours (object collection) Correspond aux blocs contenant les prévisions météo des jours
	var $jours = $('.jour');

	//~ $puces (object collection) Correspond aux puces associées à chaque blocs de jours
	var $puces = $('.bullets .entypo-record');

	/**
	* Fonction init
	* Initialise les différents effets
	* @param : aucun
	* @return : aucun
	**/
	function init(){
		//~ Routine se déclenchant au bout de 2000 millisecondes ( = 2 secondes)
		setTimeout(function(){
			//~ Ajout d'une classe au "body" indiquant la fin de l'animation de preload
			$('body').addClass('isok');	

			//~ On cache la totalité des "jours"
			$jours.hide();	 
			
			//~ On affiche lentement le bloc global
			$('.wrapper').fadeIn('slow', function(){
				//~ On affiche la prévision du premier jour
				$jours.first().fadeIn('slow');	

				//~ On active uniquement la première puce associée
				$puces.removeClass('active').first().addClass('active');	
			});
		}, 2000);
		
	}
	
	//~ Lorsque l'utilisateur clic sur l'une des puces
	$puces.click(function(){
		//~ On crée une référence vers la puce sur laquelle l'utilisateur a cliqué
		var $this = $(this);

		//~ On extrait l'attribut "data-cible" indiquant à quel bloc "jour" correspond la puce
		var cible = $this.attr('data-cible');

		//~ On masque la totalité des prévisions
		$jours.hide();

		//~ On affiche en fondu la prévision préalablement ciblée
		$($jours.get(cible)).fadeIn();
			
		//~ On supprime la classe "active" de toutes les puces...
		$puces.removeClass('active');

		//~ ... et on ne l'ajoute qu'à la puce sélectionnée par l'utilisateur
		$this.addClass('active');
	});

	//~ Appel de la fonction d'initialisation
	init();

});