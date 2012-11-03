<?php
	require_once('/database/DBConnect_inc.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		session_start();
		
		$strUsername = $_POST['username'];
		$strPassword = $_POST['password'];
		
		$strSQLQuery = 	"SELECT Username, Password ".
						"FROM users WHERE ".
						"Username = '".$strUsername."' AND ". 
						"Password = '".$strPassword."'";
		print_r($strSQLQuery);
		$result = mysql_query($strSQLQuery);
		print_r($result);
		$rows = mysql_num_rows($result);

		$hostname = $_SERVER['HTTP_HOST'];
		$path = dirname ($_SERVER['PHP_SELF']);

		print_r($rows);
		
		if ( $rows != 0 )
		{
			$_SESSION['loggedIn'] = true;
			if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') 
			{
		        if (php_sapi_name() == 'cgi') 
		        {
		        	header('Status: 303 See Other');
		        	header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
		        }
		        else 
		        {
		        	header('HTTP/1.1 303 See Other');
		        	header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
		        }
		        echo 'login successfull';
	        }
		}
		$error = '<label id="login_form_error_label" style="color:red;">Falscher Nutzername oder Passwort</label><br />';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>Geschützter Bereich</title>
	</head>
		<div id="login_main">
			<div class="form">
				Please enter Username and Password.
			</div>			
			<form name="login_form" action="login.php" method="post">
				<input type="text" name="username"><br />
				<input type="password" name="password"><br />
				<?php echo (isset($error) ? $error:''); ?>
				<input type="submit" name="submit" value="submit">
			</form>
		</div>
</html>
		