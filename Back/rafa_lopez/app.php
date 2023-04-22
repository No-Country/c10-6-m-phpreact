<?php
require_once 'config.php';
require_once('./controllers/appController.php');
// instancia app, verifica rutas
$app = new AppController();
//$_SESSION = null;
//session_destroy();
//debug($_SESSION);
//debug($app);
//echo $app->getController();
switch ($app->getController()) {

    case 'ADMIN':
        if ((isset($_POST['human'])) && ($_POST['human'] === 'true')) {
            $app->loginUser($_POST, $app->conectarBD());
        }
        if (isset($_SESSION['admin'])) {
            require_once('./admin/admin.html');
        } else {
            require_once('./admin/login.html');
        }
        break;
    case 'LOGOUT':
        $app->logoutUser($app->conectarBD());
        require_once('./admin/login.html');
        break;
}
//$app->respuesta($respuesta);
