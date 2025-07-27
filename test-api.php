<?php

/**
 * Simple test script to verify IP2Location.io API integration
 * This file can be run independently to test the API changes
 */

// Test IP (Google DNS)
$test_ip = '8.8.8.8';
$api_key = 'YOUR_API_KEY_HERE'; // Replace with actual API key

echo "Testing IP2Location.io API Integration\n";
echo "=====================================\n";
echo "Test IP: " . $test_ip . "\n";
echo "API URL: https://api.ip2location.io/?key=" . $api_key . "&ip=" . $test_ip . "&format=json\n\n";

// Make API request
$url = "https://api.ip2location.io/?key=" . $api_key . "&ip=" . $test_ip . "&format=json";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);

curl_close($ch);

echo "HTTP Code: " . $http_code . "\n";

if ($curl_error) {
    echo "cURL Error: " . $curl_error . "\n";
} else {
    echo "Raw Response:\n" . $response . "\n\n";

    $data = json_decode($response, true);

    if ($data) {
        echo "Parsed Response:\n";
        echo "Country: " . (isset($data['country_name']) ? $data['country_name'] : 'N/A') . "\n";
        echo "Region: " . (isset($data['region_name']) ? $data['region_name'] : 'N/A') . "\n";
        echo "City: " . (isset($data['city_name']) ? $data['city_name'] : 'N/A') . "\n";
        echo "Is Proxy: " . (isset($data['is_proxy']) ? ($data['is_proxy'] ? 'Yes' : 'No') : 'N/A') . "\n";
        echo "ASN: " . (isset($data['asn']) ? $data['asn'] : 'N/A') . "\n";
        echo "AS: " . (isset($data['as']) ? $data['as'] : 'N/A') . "\n";

        if (isset($data['error'])) {
            echo "\nAPI Error: " . $data['error']['error_message'] . "\n";
        }
    } else {
        echo "Failed to parse JSON response\n";
    }
}

echo "\nTest completed.\n";
