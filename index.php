<?php 
	if(!isset($_SESSION)){session_start();};
	$image_user = "";
	if(isset($_SESSION["BATEC_usr_image"])){$image_user = $_SESSION["BATEC_usr_image"];}
	$msg   		= "";
	$attempt 	= "";
	if(isset($_SESSION["BATEC_FILE_ATTEMPT_INDEX"])){
	$HOST_CONFIG_INI 		= $_SESSION["BATEC_FILE_ATTEMPT_INDEX"];	
	
		$fp = fopen($HOST_CONFIG_INI, "r");
		$linea 		= "";
		while(!feof($fp)) {
			$linea .= fgets($fp);
		}
		if($linea !=""){
			$dt = json_decode($linea);
			fclose($fp);
			if($dt->ATTEMPT!=""){	$attempt 	= $dt->ATTEMPT;}
			if($dt->MESSAGE!=""){	$msg    	= $dt->MESSAGE;}
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Backend para App Juerguea">
    <meta name="author" content="Sistema Control Asistencias">
    <link rel="shortcut icon" href="img/items/ic_launcher.png" />
    <title>SISTEMA BATEC</title>
	<link href="css/primeui/font-awesome.css" rel="stylesheet" type="text/css" >
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="css/primeui/primeui.min.css" rel="stylesheet" type="text/css" />
	<link href="css/primeui/theme.css" rel="stylesheet" type="text/css" />
	<link href="css/owner/login.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/jquery/jquery-ui.js"></script>
    <script src ="js/primeui/primeui.min.js"></script>
    <script src="js/owner/utility.js"></script>
    <script src="js/owner/login.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body >
	<div class="bg"></div>
	<div class="modal-dialog" style="width:80%;">
      <div class="modal-content">
      	<div id="dlglogin"  title="<img src='img/items/ic_launcher.png' class='icon-title-formLogin' />
        <label class='title-formLogin'>BATEC - INICIO SESI&Oacute;N</label>" appendTo="body">
    	<form role="form" id="frm_login" method="POST" action="/batec/system/view/view_login.php"  >
            <img class="image_user_login" src="<?php if($image_user!=""){ echo 'img/users/'.$image_user.".jpg";} 
			else{ echo 'img/items/user1.png';} ?>" width="100px" height="100px" />
            <input type="hidden" id="msg" name="msg" value="<?php echo $msg; ?>" />
            <input type="hidden" id="attempt" name="attempt" value="<?php echo $attempt; ?>" />
            <input class="form-control" id="usr" 
            placeholder="Usuario" name="usr" type="text" autofocus tabindex="1" >
            <input class="form-control" id="pwd" 
            placeholder="Clave" name="pwd" type="password" value="" tabindex="2">
        </form>
        <div id="msgs"></div>
        </div>
      </div>
    </div>
</body>
</html>
