<?php
// router.php for PHP built-in server
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files directly
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Helper to simulate Apache RewriteRule
function match_url($pattern, $uri, $params = []) {
    if (preg_match($pattern, $uri, $matches)) {
        foreach ($params as $key => $index) {
            $_GET[$key] = $matches[$index] ?? '';
        }
        return true;
    }
    return false;
}

// ----------------------------------------------------------------------
// Specific Rules from .htaccess
// ----------------------------------------------------------------------

// Admin Specifics
if (match_url('#^/admin/dichvu-editgroups/([A-Za-z0-9-]+)#', $uri, ['module' => 'admin', 'action' => 'dichvu-editgroups', 'id' => 1])) goto run;
if (match_url('#^/admin/dichvugame-groups/([A-Za-z0-9-]+)#', $uri, ['module' => 'admin', 'action' => 'dichvugame-groups', 'id' => 1])) goto run;
if (match_url('#^/admin/dichvugame-edit/([A-Za-z0-9-]+)#', $uri, ['module' => 'admin', 'action' => 'dichvugame-edit', 'id' => 1])) goto run;

// Client Specifics
if (match_url('#^/client/dichvugame/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'dichvugame', 'id' => 1])) goto run;
if (match_url('#^/client/spin/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'spin', 'id' => 1])) goto run;
if (match_url('#^/client/home/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'home', 'shop' => 1])) goto run;
if (match_url('#^/client/blog/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'blog', 'id' => 1])) goto run;
if (match_url('#^/client/giftbox/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'giftbox', 'id' => 1])) goto run;
if (match_url('#^/client/verify/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'verify', 'token' => 1])) goto run;
if (match_url('#^/client/notification/view/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'notification-view', 'id' => 1])) goto run;
if (match_url('#^/client/profile-ctv/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'profile-ctv', 'username' => 1])) goto run;
if (match_url('#^/client/order/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'order', 'trans_id' => 1])) goto run;
if (match_url('#^/client/payment/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'payment', 'invoice' => 1])) goto run;
if (match_url('#^/client/verify-otp-mail/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'verify-otp-mail', 'token' => 1])) goto run;

// Other Specifics
if (match_url('#^/page/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'page', 'slug' => 1])) goto run;
if (match_url('#^/join/([A-Za-z0-9-]+)#', $uri, ['module' => 'client', 'action' => 'join', 'ref' => 1])) goto run;

// Dashboard aliases
if (preg_match('#^/(Dashboard|Dashbroad|dashboard)#', $uri)) {
    $_GET['module'] = 'client';
    $_GET['action'] = 'home';
    goto run;
}

// Generic Client
if (match_url('#^/client/([A-Za-z0-9-]+)#', $uri)) {
    $_GET['module'] = 'client';
    preg_match('#^/client/([A-Za-z0-9-]+)#', $uri, $m);
    $_GET['action'] = $m[1];
    goto run;
}

// Generic Admin
if (match_url('#^/admin/([A-Za-z0-9-]+)#', $uri)) {
    $_GET['module'] = 'admin';
    preg_match('#^/admin/([A-Za-z0-9-]+)#', $uri, $m);
    $_GET['action'] = $m[1];
    if (isset($_GET['id'])) unset($_GET['id']); // Clear potential conflicting params
    // Re-check specific admin rules that have IDs if they were caught here (simplified logic)
    // Actually, earlier specific rules would have caught them.
    goto run;
}
if ($uri === '/admin') {
    $_GET['module'] = 'admin';
    $_GET['action'] = '';
    goto run;
}

// Generic CTV
if (match_url('#^/ctv/([A-Za-z0-9-]+)#', $uri)) {
    $_GET['module'] = 'ctv';
    preg_match('#^/ctv/([A-Za-z0-9-]+)#', $uri, $m);
    $_GET['action'] = $m[1];
    goto run;
}
if ($uri === '/ctv') {
    $_GET['module'] = 'ctv';
    $_GET['action'] = '';
    goto run;
}

// Common
if (match_url('#^/common/([A-Za-z0-9-]+)#', $uri)) {
    $_GET['module'] = 'common';
    preg_match('#^/common/([A-Za-z0-9-]+)#', $uri, $m);
    $_GET['action'] = $m[1];
    goto run;
}

// Root
if ($uri === '/' || $uri === '/index.php') {
    $_GET['module'] = 'client';
    $_GET['action'] = 'home';
    goto run;
}

// Default rewrites if nothing matched but it looks like a path
// RewriteRule ^client$ /index.php?module=client&action=$1...
if ($uri === '/client') {
    $_GET['module'] = 'client';
    $_GET['action'] = '';
    goto run;
}

// If no match and not static file, default to home (Like 404 handling or fallback)
$_GET['module'] = 'client';
$_GET['action'] = 'home';

run:
// Emulate needed globals or env
require_once 'index.php';
