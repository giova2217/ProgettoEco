<?php
// Starting the session
session_start();

// Function that generates a CSRF token
function generate_csrf_token() {
    return bin2hex(random_bytes(32));
}

// Function to set and retrieve CSRF token
function csrf_token() {
    // Check if CSRF token is already set in session
    if (!isset($_SESSION['csrf_token'])) {
        // Generate a new CSRF token
        $_SESSION['csrf_token'] = generate_csrf_token();
    }

    return $_SESSION['csrf_token'];
}

// Function to validate CSRF token
function validate_csrf_token($token) {
    // Check if token stored in the session matches
    if (!hash_equals($_SESSION['csrf_token'], $token)) {
        // Token mismatch, invalid request
        return false;
    }

    return true;
}
?>
