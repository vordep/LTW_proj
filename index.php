<?php
require_once realpath(dirname(__FILE__) . "/config.php");
include TEMPLATES_PATH .'/header.php';

$currentPage = isset($_GET['page']) ? $_GET['page'] : 'signUp';
/*// add more pages as needed 
$pagesWithMandatoryLogin = array('profile');

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
}*/
switch($currentPage){
        case'signUp':
        include'templates/signup.php';
        break;
        
}
