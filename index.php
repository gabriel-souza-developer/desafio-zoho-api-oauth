<?php
$accountsBase = 'https://accounts.zoho.com/oauth/v2/auth';
$client_id    = "1000.S8MRH7ENPZ4R17PF18X7KTH2V7E8VG";
$redirect_uri = "https://2535a360c4e1.ngrok-free.app/callback.php"; // mesmo cadastrado no Zoho
$scope        = "ZohoCliq.Profile.READ";

// Monta a URL de autorização
$params = [
    'scope'         => $scope,
    'client_id'     => $client_id,
    'response_type' => 'code',
    'access_type'   => 'offline',
    'redirect_uri'  => $redirect_uri,
    'prompt'        => 'consent'
];

$auth_url = $accountsBase . '?' . http_build_query($params);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login com Zoho</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <!-- Style  -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">


  <header class="app-header text-center py-3">
  </header>

  <!-- Main -->
  <main class="flex-grow-1 d-flex justify-content-center align-items-center">
    <div class="card app-card text-center shadow-sm" style="max-width: 380px; width: 100%;">
      <div class="card-body position-relative p-4">
        <div class="app-card__bg"></div>

        <h4 class="card-title mb-2" style="color: var(--primary-color); position: relative; z-index: 2;">
          <img src="./assets/img/Logo_Proxxima_Telecom.svg" alt="Logo Proxxima Telecom" height="65">
        </h4>
        <p class="mb-3" style="position: relative; z-index: 2;">Faça login com sua conta corporativa Zoho para continuar:</p>
        <a href="<?= htmlspecialchars($auth_url, ENT_QUOTES) ?>" 
           class="btn btn-primary w-100"
           style="background-color: var(--primary-color); border-color: var(--primary-color); position: relative; z-index: 2;">
          <i class="fab fa-zoho me-2"></i> Login com Zoho
        </a>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="app-footer text-center py-2 mt-3">
    <p class="mb-0">
      © 2025 Gabriel A. Souza - Backoffice Redes.
      <a href="https://github.com/gabriel-souza-developer/" target="_blank" class="app-footer__github-link ms-2">
        <i class="fab fa-github"></i>
      </a>
    </p>
  </footer>

</body>
</html>
