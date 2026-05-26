<?php
/**
 * init.php
 * Shared logic-only include for API endpoints and secure scripts.
 * Does NOT output HTML.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 0); // prevent HTML errors from leaking into JSON
header_remove('X-Powered-By'); // small hardening step

// --- Base paths ---
$rootPath = __DIR__;
$configDir = "$rootPath/configs";

// --- Ensure config folder exists ---
if (!is_dir($configDir)) {
    mkdir($configDir, 0700, true);
}

// --- Resolve credential-based config ---
$credentialId = $_SESSION['credential_id'] ?? null;
$config = null;

if ($credentialId) {
    $cfgPlain = "$configDir/$credentialId.json";
    $cfgEnc   = "$configDir/$credentialId.json.enc";

    if (file_exists($cfgPlain)) {
        // Unencrypted stub (user just registered)
        $config = json_decode(file_get_contents($cfgPlain), true);
    } elseif (file_exists($cfgEnc) && !empty($_SESSION['config'])) {
        // Config already decrypted in this session
        $config = $_SESSION['config'];
    }
}

// --- Database connection (only if path known and file exists) ---
$database = null;
if (!empty($config['sqlite_path']) && is_string($config['sqlite_path'])) {
    $dbPath = $config['sqlite_path'];
    // Only try to connect if the database file exists, or if the directory exists (for new DB creation)
    $dbDir = dirname($dbPath);
    if (file_exists($dbPath) || (is_dir($dbDir) && is_writable($dbDir))) {
        try {
            $database = new PDO('sqlite:' . $dbPath);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("DB connect failed: " . $e->getMessage());
            $database = null; // Ensure it's null on failure
        }
    }
}

// --- Helper for JSON responses ---
function json_response($data, $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

