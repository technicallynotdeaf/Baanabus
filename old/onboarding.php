<?php
session_start();
if (!empty($_SESSION['credential_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Baanabus Setup</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
  <div class="question">
    <h2>👋 Hi there!</h2>
    <p>Welcome to <span class="highlight">Baanabus</span>.  
       Let’s create your account.</p>
    <form id="onboard-form">
      <label for="username">Pick a username:</label><br>
      <input class="form-input" id="username" name="username" required><br><br>
      <button type="submit" class="form-button">Register Security Key</button>
    </form>
    <p id="status"></p>
  </div>
</div>

<script>
document.getElementById('onboard-form').addEventListener('submit', async (e) => {
  e.preventDefault();
  const username = document.getElementById('username').value.trim();
  const status = document.getElementById('status');
  status.textContent = "Preparing registration...";

  try {
    const challengeResp = await fetch('register-challenge.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({username})
    });
    const challenge = await challengeResp.json();

    // Create credential
    const cred = await navigator.credentials.create(challenge);
    const encoded = {
      id: cred.id,
      rawId: btoa(String.fromCharCode(...new Uint8Array(cred.rawId))),
      type: cred.type,
      response: {
        clientDataJSON: btoa(String.fromCharCode(...new Uint8Array(cred.response.clientDataJSON))),
        attestationObject: btoa(String.fromCharCode(...new Uint8Array(cred.response.attestationObject)))
      }
    };

    const regResp = await fetch('register-response.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({username, credential: encoded})
    });

    const result = await regResp.json();
    if (result.success) {
      status.textContent = "✅ Registered! Redirecting...";
      setTimeout(()=>window.location='index.php',1500);
    } else {
      status.textContent = "❌ " + (result.message || "Registration failed");
    }
  } catch(err) {
    console.error(err);
    status.textContent = "❌ Error: " + err.message;
  }
});
</script>
</body>
</html>

