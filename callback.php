<?php
// callback.php - Recebe o "code" do Zoho

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Configurações do App Zoho
    $client_id = "1000.S8MRH7ENPZ4R17PF18X7KTH2V7E8VG";
    $client_secret = "d4e4b62b338aa7bf1b1d3d5c317badf259cad8f5d5";
    $redirect_uri = "https://0f5dc0ae7ca9.ngrok-free.app/callback.php"; 

    // Endpoint do Zoho para trocar code por token
    $url = "https://accounts.zoho.com/oauth/v2/token";

    // Dados que vamos enviar via POST
    $data = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    ];

    // Inicializa cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // só para teste local/ngrok

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    echo "<h2>Login realizado com sucesso!</h2>";
    echo "<p>Código recebido do Zoho:</p><pre>{$code}</pre>";

    echo "<h3>HTTP Status Code:</h3><pre>{$httpCode}</pre>";
    if ($curlError) {
        echo "<h3>Erro cURL:</h3><pre>{$curlError}</pre>";
    }

    echo "<h3>Resposta bruta do Zoho:</h3><pre>{$response}</pre>";

    $tokenInfo = json_decode($response, true);
    if ($tokenInfo && isset($tokenInfo['access_token'])) {
        echo "<p>Access Token recebido:</p><pre>" . htmlspecialchars($tokenInfo['access_token']) . "</pre>";
    } else {
        echo "<p>Não foi possível obter o access token. Veja acima a resposta bruta do Zoho para detalhes.</p>";
    }

} else {
    echo "<h2>Erro!</h2><p>Nenhum código foi recebido. Verifique o redirect_uri e tente novamente.</p>";
}
?>
