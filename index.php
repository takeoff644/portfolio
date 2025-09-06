<?php
// Redirect direct hits to this page to index.html
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	header('Location: index.html');
	exit();
}

// Example: Check requested URI against allowed pages
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// List of valid pages or paths (add your valid pages here)
$valid_pages = ['/', '/index.html'];

// If the requested page is invalid, handle 404
if (!in_array($request_uri, $valid_pages)) {
	// Option 1: Show 404 response with message
	http_response_code(404);
	echo "<h1>404 Not Found</h1>";
	echo "<p>The page you requested does not exist.</p>";
	echo "<p><a href='index.html'>Return to Home Page</a></p>";
	exit();

	// Option 2: Redirect to a custom 404 page instead (uncomment if desired)
	// header('Location: /404.html');
	// exit();
}
