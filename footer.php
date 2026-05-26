<?php
/**
 * footer.php
 * Shared HTML footer for Baanabus pages.
 * Handles graceful DB close and closing tags.
 */

// --- Close any active database connection ---
if (isset($database) && $database instanceof PDO) {
    $database = null; // PDO cleanup
}
?>
</body>
</html>

