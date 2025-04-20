<?php

//inicializamos una nueva sesion de curl ; hc = curl handle

//Declaracion de la API 
const API_URL = 'https://whenisthenextmcufilm.com/api';

//Inicializamos una nueva sesion de cURL 
$hc = curl_init(API_URL);

//Indicamos que queremos recibir el resultado de la petición sin mostrarla en pantalla 

curl_setopt($hc, CURLOPT_RETURNTRANSFER, true);

//Ejecutamos la petición y guardamos en resultado en una variable

$result = curl_exec($hc);

/*una forma alternativa sería usar la función file_get_contents() de PHP, 
pero cURL es más flexible y potente para manejar peticiones HTTP.*/

//$result = file_get_contents(API_URL); //Si solo quieres hacer un GET de una API

$data = json_decode($result, true);

curl_close($hc);
?>

<style>
    body {
        background: #181a1b;
        color: #fff;
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 90vh;
        width: 100%;
    }
    .poster-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #23272b;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.3);
        padding: 2rem;
        max-width: 400px;
        margin: 2rem auto;
    }
    .poster-container img {
        max-width: 100%;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 12px rgba(0,0,0,0.2);
    }
    .poster-container h1 {
        margin: 0 0 1rem 0;
        font-size: 2rem;
        text-align: center;
    }
    .poster-container p {
        margin: 0.5rem 0;
        font-size: 1.1rem;
        text-align: center;
    }
    .poster-container .release-date {
        font-weight: bold;
        color: #ffb347;
        margin-top: 1rem;
        font-size: 1.2rem;
    }

    
body {
    background: linear-gradient(135deg, #181a1b 0%, #23272b 50%, #3a1c71 100%);
    color: #fff;
    min-height: 100vh;
    margin: 0;
    font-family: 'Segoe UI', Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
}

</style>
<?php if ($data): ?>
    <div class="poster-container">
        <img src="<?= htmlspecialchars($data['poster_url']) ?>" alt="Póster de <?= htmlspecialchars($data['title']) ?>">
        <h1><?= htmlspecialchars($data['title']) ?></h1>
        <p><?= htmlspecialchars($data['overview']) ?></p>
        <p class="release-date">Estreno: <?= htmlspecialchars($data['release_date']) ?></p>
        <p>Faltan <strong><?= htmlspecialchars($data['days_until']) ?></strong> días</p>
    </div>
<?php else: ?>
    <div class="poster-container">
        <h1>No se pudo obtener la información de la próxima película de Marvel.</h1>
    </div>
<?php endif; ?>
OKAMI N.S. Todos los derechos reservados. 
