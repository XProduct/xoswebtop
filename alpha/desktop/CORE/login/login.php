<?

include("include/session.php");

global $session, $form;
/* Login attempt */
$retval = $session->login($_POST['user'], $_POST['pass'], true);

/* Login successful */
if($retval){
	header("Location: https://xos.xproduct.net/alpha/desktop/index.php");
} 
/* Login failed */
else{
	$_SESSION['value_array'] = $_POST;
	$_SESSION['error_array'] = $form->getErrorArray();
	header("Location: https://xos.xproduct.net/alpha/desktop/CORE/login/index.php");
}

?>