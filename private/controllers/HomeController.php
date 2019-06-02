<?php
/**
 * Class HomeController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class HomeController {
	// function homepage(){
	// 	include 'private/views/home.php';
	// }
	function homepage() {
		//Roep de function in het model aan om alle huisjes uit de database op te halen
		$videos = getAllVideos('videoUploadDate DESC');
		$template_engine = get_template_engine();
		echo $template_engine->render( 'home', [
			'videos' => $videos
		] );
	}
}
