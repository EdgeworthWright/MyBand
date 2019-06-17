<?php
/**
 * Class HomeController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class ContactController {
	function contact(){
		$template_engine = get_template_engine();
		echo $template_engine->render( 'contact' );
	}
}
