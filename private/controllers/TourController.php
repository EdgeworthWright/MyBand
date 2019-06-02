<?php
/**
 * Class EventController
 *
 * Deze handelt de logica van ALLE agenda functionaliteit af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class TourController {
	function tour() {
		$tours = getAllTourdates('tourDate ASC');
		$template_engine = get_template_engine();
		echo $template_engine->render( 'tour', [
			'tours' => $tours
		]);
	}
}
