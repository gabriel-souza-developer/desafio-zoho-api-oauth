<?php
// callback.php - Recebe o "code" do Zoho

$accessToken = null;
$code = null;
$httpCode = null;
$curlError = null;
$response = null;

if (isset($_GET['code'])) { // verifica se existe code
    $code = $_GET['code'];

    $client_id = "1000.S8MRH7ENPZ4R17PF18X7KTH2V7E8VG";
    $client_secret = "d4e4b62b338aa7bf1b1d3d5c317badf259cad8f5d5";
    $redirect_uri = "https://2535a360c4e1.ngrok-free.app/callback.php"; 

    $url = "https://accounts.zoho.com/oauth/v2/token";

    $data = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    $tokenInfo = json_decode($response, true);
    if ($tokenInfo && isset($tokenInfo['access_token'])) {
        $accessToken = $tokenInfo['access_token'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Callback Zoho</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background-color: var(--light-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    .app-card {
      background-color: var(--light-color);
      max-width: 450px;
      width: 90%;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 2rem;
      text-align: center;
      position: relative;
    }
    .app-card h2 {
      color: var(--primary-color);
      margin-bottom: 1rem;
    }
    .app-card p {
      margin-bottom: 0.8rem;
    }
    .app-card pre {
      background: #f1f1f1;
      padding: 10px;
      border-radius: 6px;
      overflow-x: auto;
    }
    .app-footer {
      text-align: center;
      padding: 1rem;
      width: 100%;
      margin-top: 2rem;
      font-size: 0.9rem;
      border-top: 1px solid var(--form-section-border);
      background-color: var(--dark-color);
      color: var(--light-color);
    }
    .app-footer__github-link {
      color: var(--light-color);
      margin-left: 8px;
      text-decoration: none;
    }
    .app-footer__github-link:hover {
      color: var(--accent-color);
    }
    .success {
      color: green;
      font-weight: 600;
    }
    .error {
      color: red;
      font-weight: 600;
    }
    .app-logo {
      height: 60px;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <div class="app-card">
    <img src="./assets/img/Logo_Proxxima_Telecom.svg" alt="Logo Proxxima Telecom" class="app-logo">
    <h2 class="success">Login realizado com sucesso!</h2>
    
 <!--    <?php if ($accessToken): ?>
        <h2 class="success">Login realizado com sucesso!</h2>
        <p>Código recebido do Zoho:</p>
        <pre><?= htmlspecialchars($code) ?></pre>

        <p>Access Token:</p>
        <pre><?= htmlspecialchars($accessToken) ?></pre>

        <p>HTTP Status Code: <?= $httpCode ?></p>
        <?php if ($curlError): ?>
            <p class="error">Erro cURL:</p>
            <pre><?= htmlspecialchars($curlError) ?></pre>
        <?php endif; ?>
        <p>Resposta bruta do Zoho:</p>
        <pre><?= htmlspecialchars($response) ?></pre>
    <?php elseif ($code): ?>
        <h2 class="error">Não foi possível obter o Access Token</h2>
        <p>Veja abaixo a resposta do Zoho:</p>
        <pre><?= htmlspecialchars($response) ?></pre>
    <?php else: ?>
        <h2 class="error">Erro!</h2>
        <p>Nenhum código foi recebido. Verifique o redirect_uri e tente novamente.</p>
    <?php endif; ?> -->
  </div>

  <footer class="app-footer">
    © 2025 Gabriel A. Souza - Backoffice Redes.
    <a href="https://github.com/gabriel-souza-developer/" target="_blank" class="app-footer__github-link">
      <i class="fab fa-github"></i>
    </a>
  </footer>

</body>
</html>
