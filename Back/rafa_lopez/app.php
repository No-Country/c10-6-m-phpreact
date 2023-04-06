<?php
// requerimientos base
require_once('config.php');
require_once('./controller/controllerapp.php');
// instancia aplicacion
$app = new ControllerApp();
// router aplicacion llama cada controlador segun peticion, si no existe  error 404
try {
    match ($app->getRuta()['controller']) {
        'login' => include_once('./controller/controllerlogin.php'),
        'admin' => include_once('./controller/controlleradmin.php'),
        'cliente' => include_once('./controller/controllercliente.php'),
        'cocina' => include_once('./controller/controllercocina.php'),
        'mesa' => include_once('./controller/controllermesa.php'),
        'mozo' => include_once('./controller/controllermozo.php'),
        'error' => include_once('./error-404.html'),
    };
} catch (\UnhandledMatchError $e) {
    echo '<h4>Ruta no encontrada</h4>';
    include_once('./error-404.html');
}
// elimina instacia
$app = null;
