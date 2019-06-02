<?php
/**
 * Class HomeController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class CmsController {
	function cms(){
		session_start();
		$logreg = login();
		if (isset($_GET['logout'])) {
		  logout();
		}
		$updates 	= videoEditing();
		$updates2 = tourDates();
		$updates3 = aboutThing();
		$template_engine = get_template_engine();
		echo $template_engine->render('cms', [
			'updates' 	=> $updates,
			'updates2' 	=> $updates2,
			'updates3' 	=> $updates3
		]);
	}
}
