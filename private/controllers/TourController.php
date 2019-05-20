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
	function tour(){
		include 'private/views/tour.php';
	}
}
