<?php
/**
 * Class EventController
 *
 * Deze handelt de logica van ALLE agenda functionaliteit af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class SearchController {
	// function search(){
	// 	include 'private/views/search.php';
	// }

	function search(){
		//Hier haal je de template engine op, die weet dat de views in private/views staan
		$template_engine = get_template_engine();
		//De template engine opdracht geven de juiste view weergeven: homepage (de ".php" mag je weglaten uit de naam van de view)
		echo $template_engine->render( 'search' );
	}
}
