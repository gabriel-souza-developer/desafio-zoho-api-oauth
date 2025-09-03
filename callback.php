<?php

session_start(); //controlar login/logout

if (isset($_GET['logout'])) {
    session_destroy(); // Destroi a sessão
    header("Location: index.php"); 
    exit; // Encerra o script
}


// Variáveis para guardar os dados do Zoho

$accessToken = null;
$code = null; // código que o Zoho envia para trocar pelo token.
$httpCode = null; // código HTTP da resposta (200 = sucesso).
$curlError = null;
$response = null; // resposta completa do Zoho em JSON


if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $client_id = "1000.S8MRH7ENPZ4R17PF18X7KTH2V7E8VG";
    $client_secret = "d4e4b62b338aa7bf1b1d3d5c317badf259cad8f5d5";
    $redirect_uri = "https://gabriel-souza-developer.github.io/script-backoffice-redes-proxxima"; // // alterar pra NGROK 

    $url = "https://accounts.zoho.com/oauth/v2/token"; // endpoint

    // Dados para troca do código pelo access token
    $data = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    ];

    // Configura cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); //onde
    curl_setopt($ch, CURLOPT_POST, true); // envio via POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Para dev/local, cuidado em produção, porque desativ o SSL

    // Executa requisição
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // ajudam a debugar se algo der errado
    $curlError = curl_error($ch);
    curl_close($ch);

    // Converte resposta em array
    $tokenInfo = json_decode($response, true);

    // Se existir access token, salva na sessão
    if ($tokenInfo && isset($tokenInfo['access_token'])) {
        $accessToken = $tokenInfo['access_token'];
        $_SESSION['access_token'] = $accessToken;
    }
}

// URL de logout
$logout_url = "callback.php?logout=1";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Callback Zoho OAuth 2.0</title>
  <link rel="icon" type="image/png" href="https://proxxima.net/storage/app/media/xx.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Header -->
<header class="app-header">
    <div class="app-header__title">
      <a href="/" class="app-header__login">
        <i class="fa-solid fa-code"></i> Desafio Zoho API OAuth 2.0
      </a>
    </div>
  <?php if ($accessToken): ?>
    <a href="<?= $logout_url ?>" class="app-header__login">
      <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
  <?php endif; ?>
</header>

<!-- Main -->
<main class="flex-grow-1 d-flex justify-content-center align-items-center">
  <div class="app-card">
    <div class="app-card__bg"></div>
    <div class="card-body text-center">
      <h4 class="card-title mb-3">
        <img src="./assets/img/Logo_Proxxima_Telecom.svg" alt="Logo Proxxima Telecom" class="app-logo">
      </h4>

      <?php if ($accessToken): ?>
        <!-- Mensagem de login com sucesso -->
        <h4 class="mb-3" style="color: var(--primary-color);">Login realizado com sucesso!</h4>
        <p>Você está autenticado e pode continuar navegando!</p>

        <!-- Botão de logout dentro do card -->
        <a href="<?= $logout_url ?>" class="btn btn-zoho mt-3">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>

      <?php else: ?>
        <!-- Caso não tenha recebido token, mostra erro -->
        <h4 class="mb-3" style="color: var(--secondary-color);">Erro!</h4>
        <p>Nenhum código foi recebido ou não foi possível obter o Access Token.</p>
      <?php endif; ?>

    </div>
  </div>
</main>

<!-- Footer -->
<footer class="app-footer">
  <p class="mb-0">
    © 2025 Gabriel A. Souza - Backoffice Redes.
    <a href="https://github.com/gabriel-souza-developer/" target="_blank" class="app-footer__github-link ms-2">
      <i class="fab fa-github"></i>
    </a>
  </p>
</footer>

</body>
</html>
