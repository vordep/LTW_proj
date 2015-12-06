<?php
require_once realpath(dirname(__FILE__) . "/config.php");
include TEMPLATES_PATH .'/header.php';

$currentPage = isset($_GET['page']) ? $_GET['page'] : 'signIn';
// add more pages as needed 
$pagesWithMandatoryLogin = array('profile','events','myevents','search');

// if the current page is one of the pages with mandatory login
foreach ($pagesWithMandatoryLogin as $page) {
	// and user is not logged in
	if ($currentPage === $page && $_SESSION['username'] === null) {
		echo "
		<script type=\"text/javascript\">
			window.alert('You are not signed in.');
			window.location.href = 'index.php';
		</script>
		";

		// redirect to sign in page
		$currentPage = 'signIn';
		break;
	}
}
switch($currentPage){
    case'signUp':
        include'templates/signUp.php';
        break;

    case 'events':
        include'templates/events.php';
        break;

	case 'myevents':
		include'templates/myEvents.php';
		break;

	case 'search':
		include'templates/search.php';
		break;

	case 'addevent':
		include'templates/addevent.php';
		break;

	case 'profile':
		include'templates/profile.php';
		break;

    default:
        include'templates/signIn.php';
        break;
}
