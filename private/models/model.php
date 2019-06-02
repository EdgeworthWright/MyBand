<?php
function getAllVideos($order) {
	$conn = dbConnect();
	$statement = $conn->query("SELECT * FROM video ORDER BY ".$order);
	$result = [];

	while ($video = $statement->fetch(PDO::FETCH_ASSOC)) {
		$result[] = $video;
	}
	return $result;
}

function getAllTourdates($order) {
	$conn = dbConnect();
	$statement = $conn->query("SELECT * FROM tour ORDER BY ".$order);
	$result = [];

	while ($tour = $statement->fetch(PDO::FETCH_ASSOC)) {
		$result[] = $tour;
	}
	return $result;
}

function getAllAbout($order) {
	$conn = dbConnect();
	$statement = $conn->query("SELECT * FROM about ORDER BY ".$order);
	$result = [];

	while ($about = $statement->fetch(PDO::FETCH_ASSOC)) {
		$result[] = $about;
	}
	return $result;
}

function login() {
	$conn = dbConnect();
	if (isset($_POST['register'])) {
		// Verificatie code
		$random_bytes = bin2hex(random_bytes(32));
		$verificatie_code = hash('md5', $random_bytes);

		// error list
		$errors = array();

		// Sanitize variables
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$safe_password = password_hash($password, PASSWORD_DEFAULT);

		if (empty($username)) {
			$errors['user'] = "username vergeten lol";
		}

		if (empty($password)) {
			$errors['password'] = "Vul een wachtwoord in";
		}

		if (!empty($errors)) {
			print_r($errors);
		} else {
			$sql = "INSERT INTO account (username, password, type) VALUES (?,?,'Admin')";
			$stmt = $conn->prepare($sql);

			$data = array(
				$username,
				$safe_password
			);

			$stmt->execute($data);
		}

		header('Location: /');
	}


	if (isset($_POST['login'])) {
		// error list
		$errors = array();

		// Sanitize
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

		// Check vars
		if (empty($username)) {
			$errors['user'] = "username vergeten lol";
		}

		if (empty($password)) {
			$errors['password'] = "Vul een wachtwoord in";
		}

		if (!empty($errors)) {
			print_r($errors);
			exit();
		} else {
			$sql = 'SELECT * FROM account WHERE username = ?';

			$statement = $conn->prepare($sql);

			$statement->execute([$username]);

			$result = $statement->fetch();

			$pass_in_db = $result['password'];
			$account_type = $result['type'];
			$hashpls = password_hash($password, PASSWORD_DEFAULT);

			if (password_verify($password, $pass_in_db)) {
				echo "ok";
			} else {
				echo "no";
				exit();
			}

			$_SESSION['account_type'] = $account_type;

			echo $_SESSION['account_type'];

			// /*E-mail*/
			// $verify_link = '<a href="http://25890.hosts2.ma-cloud.nl/the-wall/public/verify.php?code=' . $verificatie_code . '&e=' . $_POST['email'] . ' "> Kimpa </a>';
			//
			// $email_to = $_POST['email'];
			// $email_from = '25890@ma-web.nl';
			// $subject = 'Verificatie The Wall';
			//
			// // Hier maken we een heel kort email bericht
			// $message = $verify_link;
			//
			// // Het afzender en reply-to adres moeten we in een speciale $headers string zetten
			// $headers = 'From:' .  $email_from . "\r\n";
			// $headers .= 'Reply-To:' .  $email_from . "\r\n";
			// $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			//
			// $result = mail (
			// 	$email_to,
			// 	$subject,
			// 	$message,
			// 	$headers
			// );
			//
			// if(!$result){
			// 	echo 'Er ging iets fout bij het versturen van de verificatie e-mail';
			// 	exit;
			// } else{
			// 	echo 'Klik de link in de verificatie email om je account te bevestigen';
			// 	exit;
			// }
		}
	}
}

function logout() {
	session_start();
	session_destroy();
	header('Location: /cms');
	exit();
}

function videoEditing() {
	$conn = dbConnect();
	$get = getAllVideos('id ASC');

	if (isset($_POST['newVideo'])) {
		$errors = array();

		$videoTitle 			= filter_var($_POST['videoTitle'], FILTER_SANITIZE_STRING);
		$videoDescription = filter_var($_POST['videoDescription'], FILTER_SANITIZE_STRING);
		$videoLink 				= filter_var($_POST['videoLink'], FILTER_SANITIZE_URL);
		$videoThumbnail 	= filter_var($_POST['videoThumbnail'], FILTER_SANITIZE_URL);
		$videoUploadDate 	= filter_var($_POST['videoUploadDate'], FILTER_SANITIZE_STRING);

		$sql = 'INSERT INTO video (videoTitle, videoLink, videoDescription, videoThumbnail, videoUploadDate) VALUES (?,?,?,?,?)';

		$stmt = $conn->prepare($sql);

		$data = array(
			$videoTitle,
			$videoLink,
			$videoDescription,
			$videoThumbnail,
			$videoUploadDate
		);

		$stmt->execute($data);

		echo "Video uploaded.";

		header('Location: /cms');
	}

	if (isset($_POST['editVideo'])) {
		$id 							= $_POST['id'];
		$videoTitle 			= filter_var($_POST['videoTitle'.$id], FILTER_SANITIZE_STRING);
		$videoDescription = filter_var($_POST['videoDescription'.$id], FILTER_SANITIZE_STRING);
		$videoLink 				= filter_var($_POST['videoLink'.$id], FILTER_SANITIZE_URL);
		$videoThumbnail 	= filter_var($_POST['videoThumbnail'.$id], FILTER_SANITIZE_URL);
		$videoUploadDate 	= filter_var($_POST['videoUploadDate'.$id], FILTER_SANITIZE_STRING);

		$sql = "UPDATE video
						SET videoTitle		=	'$videoTitle',
						videoDescription	=	'$videoDescription',
						videoLink					=	'$videoLink',
						videoThumbnail		=	'$videoThumbnail',
						videoUploadDate		=	'$videoUploadDate'
						WHERE id 					=	$id";

		$stmt = $conn->query($sql);

		header('Location: /cms');
	}

	if (isset($_POST['deleteVideo'])) {
		$id = $_POST['id'];
		$sql = "DELETE FROM video WHERE id=$id";
		$stmt = $conn->query($sql);
		header('Location: /cms');
	}

	return $get;
}

function tourDates() {
	$conn = dbConnect();
	$get = getAllTourdates('id ASC');

	if (isset($_POST['newTour'])) {
		$tourDate 				= filter_var($_POST['tourDate'], FILTER_SANITIZE_STRING);
		$tourLocation 		= filter_var($_POST['tourLocation'], FILTER_SANITIZE_STRING);
		$tourLocation2 		= filter_var($_POST['tourLocation2'], FILTER_SANITIZE_STRING);
		$tourAvailability = filter_var($_POST['tourAvailability'], FILTER_SANITIZE_STRING);
		$tourTicketLink 	= filter_var($_POST['tourTicketLink'], FILTER_SANITIZE_URL);

		$sql = "INSERT INTO tour (tourDate, tourLocation, tourLocation2, tourAvailability, tourTicketLink) VALUES (?,?,?,?,?)";

		$stmt = $conn->prepare($sql);

		$data = array(
			$tourDate,
			$tourLocation,
			$tourLocation2,
			$tourAvailability,
			$tourTicketLink
		);

		$stmt->execute($data);

		echo "tour added";
		header('Location: /cms');
	}

	if (isset($_POST['editTour'])) {
		$id								=	$_POST['id'];
		$tourDate 				= filter_var($_POST['tourDate'.$id], FILTER_SANITIZE_STRING);
		$tourLocation 		= filter_var($_POST['tourLocation'.$id], FILTER_SANITIZE_STRING);
		$tourLocation2 		= filter_var($_POST['tourLocation2'.$id], FILTER_SANITIZE_STRING);
		$tourAvailability = filter_var($_POST['tourAvailability'.$id], FILTER_SANITIZE_STRING);
		$tourTicketLink 	= filter_var($_POST['tourTicketLink'.$id], FILTER_SANITIZE_URL);

		$sql = "UPDATE tour
						SET tourDate			=	'$tourDate',
						tourLocation			=	'$tourLocation',
						tourLocation2			=	'$tourLocation2',
						tourAvailability	=	'$tourAvailability',
						tourTicketLink		=	'$tourTicketLink'
						WHERE id 					= $id";

		$stmt = $conn->query($sql);

		header('Location: /cms');
	}

	if (isset($_POST['deleteTour'])) {
		$id = $_POST['id'];
		$sql = "DELETE FROM tour WHERE id=$id";
		$stmt = $conn->query($sql);
		header('Location: /cms');
	}

	return $get;
}

function aboutThing() {
	$conn = dbConnect();
	$get = getAllAbout('id ASC');

	if (isset($_POST['newAbout'])) {
		$aboutText 				= filter_var($_POST['aboutText'], FILTER_SANITIZE_STRING);
		$aboutPicture 		= filter_var($_POST['aboutPicture'], FILTER_SANITIZE_STRING);

		$sql = "INSERT INTO about (aboutText, aboutPicture) VALUES (?,?)";

		$stmt = $conn->prepare($sql);

		$data = array(
			$aboutText,
			$aboutPicture
		);

		$stmt->execute($data);

		echo "About Added";
		header('Location: /cms');
	}

	if (isset($_POST['editAbout'])) {
		$id								=	$_POST['id'];
		$aboutText 				= filter_var($_POST['aboutText'.$id], FILTER_SANITIZE_STRING);
		$aboutPicture 		= filter_var($_POST['aboutPicture'.$id], FILTER_SANITIZE_STRING);

		$sql = "UPDATE tour
						SET aboutText			=	'$aboutText',
						aboutPicture			=	'$aboutPicture'
						WHERE id 					= $id";

		$stmt = $conn->query($sql);

		header('Location: /cms');
	}

	if (isset($_POST['deleteAbout'])) {
		$id = $_POST['id'];
		$sql = "DELETE FROM about WHERE id=$id";
		$stmt = $conn->query($sql);
		header('Location: /cms');
	}
	return $get;
}
