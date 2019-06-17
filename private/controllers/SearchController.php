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
		$searchResults = searchSite($_GET['txt']);
		$template_engine = get_template_engine();
		echo $template_engine->render( 'search', [
			'searchResults' => $searchResults
		]);
	}
}
