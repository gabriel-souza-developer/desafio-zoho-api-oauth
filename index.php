<?php

$accountsBase = 'https://accounts.zoho.com/oauth/v2/auth';
$client_id    = "1000.S8MRH7ENPZ4R17PF18X7KTH2V7E8VG";
$redirect_uri = "https://0f5dc0ae7ca9.ngrok-free.app/callback.php"; // mesmo cadastrado no Zoho
$scope        = "ZohoCliq.Profile.READ";

// Monta a URL de autorização de forma segura
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
  <title>Zoho OAuth Teste</title>
</head>
<body>
  <h2>Login com Zoho</h2>

  <a href="<?= htmlspecialchars($auth_url, ENT_QUOTES) ?>">
    <button>Login no Zoho</button>
  </a>

  <footer style="margin-top:20px; font-size:16px; color:#555">
    Todos os direitos reservados
  </footer>
</body>
</html>
