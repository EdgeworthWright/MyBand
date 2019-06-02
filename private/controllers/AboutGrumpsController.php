<?php
/**
 * Class FacilitiesController
 *
 * Deze handelt de logica van de alle te vrhuren huisje sop de camping af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class AboutGrumpsController {
	function aboutGrumps(){
		$abouts = getAllAbout('id ASC');
		$template_engine = get_template_engine();
		echo $template_engine->render( 'aboutGrumps', [
			'abouts' => $abouts
		]);
	}
}
