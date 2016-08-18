<?

error_reporting(0);

class loginAction{

	function validateUser($user, $pwd, $user_code){

		//include_once("lib/captcha/php-captcha.inc.php");

		include_once("lib/sql.injection.php"); 

		$error1='';

		$query1='';

		

		if ($user != '') {

			$link=conectarse_servicios('dgti');

			$user=Formatear($user);

			$pwd=Formatear($pwd);

			$busca = "select estatus,nombres,usuario,id from registro where usuario = '$user' and pass = '$pwd'";

	

			$resultado=mysql_query($busca, $link);

			

			if(mysql_num_rows($resultado)>0)

			{

				$row = mysql_fetch_row($resultado);

				

			

				if($row[0] == 0)

					return "No tienes permiso para acceder al sistema.";

				$id_usuario = $row[3];
				
				$res="OK";

	

				if($res=="OK")

				{  

					$_SESSION['status'] = 'authorized';

					$_SESSION['servicios_user'] = $user;

		

					header("location: index.php");

				} else return "Ocurrio un error al ingresar al sistema";

			

			} else return "Usuario y Contrase�a Incorrectos";

						

						

		} else {

			return 'El codigo capturado no es correcto.';

		}

	}



	function log_User_Out() {

		if(isset($_SESSION['status'])) {

			unset($_SESSION['status']);

			

			if(isset($_COOKIE[session_name()])) 

				setcookie(session_name(), '', time() - 1000);

				session_id();

				session_destroy();

		}

		header("location: index.php");

	}

	

	function confirm_Member() {

		session_id();

		session_start();

		if($_SESSION['status'] !='authorized') header("location: user.login.php");

	}



}



?>