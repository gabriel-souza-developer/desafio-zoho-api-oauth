<?php
// Inicia sessão para controle de login
session_start();

// Configurações Zoho
$accountsBase = 'https://accounts.zoho.com/oauth/v2/auth';
$client_id    = "1000.S8MRH7ENPZ4R17PF18X7KTH2V7E8VG";
$redirect_uri = "https://gabriel-souza-developer.github.io/script-backoffice-redes-proxxima"; // Alterar pra NGROK 
$scope        = "ZohoCliq.Profile.READ"; // nível de permissão

// Monta URL de autorização
$params = [
    'scope'         => $scope,
    'client_id'     => $client_id,
    'response_type' => 'code',
    'access_type'   => 'offline',
    'redirect_uri'  => $redirect_uri,
    'prompt'        => 'consent'
];

$auth_url = $accountsBase . '?' . http_build_query($params); //transforma o array em uma query strin

// Variável para controlar se o usuário está logado
$isLoggedIn = isset($_SESSION['access_token']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio Zoho API OAuth 2.0</title>
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
    <?php if (!$isLoggedIn): ?>
      <a href="<?= htmlspecialchars($auth_url, ENT_QUOTES) ?>" class="app-header__login">
        <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
      </a>
    <?php else: ?>
      <a href="callback.php?logout=1" class="app-header__login">
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
        <p class="mb-3">Faça login com sua conta corporativa Zoho para continuar!</p>

        <?php if (!$isLoggedIn): ?>
          <a href="<?= htmlspecialchars($auth_url, ENT_QUOTES) ?>" class="btn btn-zoho"> <!-- se não existe um access token na sessão, o usuário não está logado. -->
            <i class="fa-solid fa-arrow-right-to-bracket"></i> Entrar com Zoho
          </a>
        <?php else: ?>
          <h4 class="mb-3" style="color: var(--primary-color);">Login realizado com sucesso!</h4>
          <p>Você está autenticado e pode continuar.</p>
          <a href="callback.php?logout=1" class="btn btn-zoho mt-3">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
          </a>
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
