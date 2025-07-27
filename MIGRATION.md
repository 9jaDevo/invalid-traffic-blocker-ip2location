# Migration Guide: From IPHub.info to IP2Location.io

## Overview

Version 2.0 of the Invalid Traffic Blocker plugin migrates from IPHub.info API to IP2Location.io API. This document explains the changes and how to migrate your existing setup.

## Why the Change?

- **Better API Documentation**: IP2Location.io provides clearer and more comprehensive API documentation
- **Improved Reliability**: More stable API endpoints and better error handling
- **Enhanced Features**: IP2Location.io provides additional geolocation data alongside proxy detection
- **Better Free Tier**: More generous free tier limits for testing and small sites

## What Changed?

### API Endpoint
- **Before**: `http://v2.api.iphub.info/ip/{IP_ADDRESS}`
- **After**: `https://api.ip2location.io/?key={API_KEY}&ip={IP_ADDRESS}&format=json`

### Authentication
- **Before**: X-Key header
- **After**: API key as URL parameter

### Response Format
- **Before**: `{"block": 1}` (1 = non-residential, 2 = residential suspicious)
- **After**: `{"is_proxy": true}` (boolean true/false)

### Blocking Modes
- **Safe Mode**: Now blocks when `is_proxy` is `true`
- **Strict Mode**: Same as Safe Mode (IP2Location.io uses boolean detection)
- **Custom Mode**: Allows selecting proxy blocking based on `is_proxy` field

## Migration Steps

### 1. Get IP2Location.io API Key
1. Visit [IP2Location.io Pricing](https://www.ip2location.io/pricing)
2. Sign up for a free or paid account
3. Copy your API key from the dashboard

### 2. Update Plugin Settings
1. Go to `Settings > Invalid Traffic Blocker` in WordPress admin
2. Replace your old IPHub API key with the new IP2Location.io API key
3. Test the API connectivity using the "Test API Connectivity" button
4. Review your blocking mode settings (they should work the same way)

### 3. Verify Configuration
1. Use the "Test API Connectivity" button to ensure the API is working
2. Check that your whitelist IPs are still configured correctly
3. Test with a known VPN/proxy IP to ensure blocking works

## API Response Comparison

### IPHub.info Response
```json
{
  "ip": "8.8.8.8",
  "countryCode": "US",
  "countryName": "United States",
  "asn": 15169,
  "isp": "Google LLC",
  "block": 0
}
```

### IP2Location.io Response
```json
{
  "ip": "8.8.8.8",
  "country_code": "US",
  "country_name": "United States of America",
  "region_name": "California",
  "city_name": "Mountain View",
  "latitude": 37.38605,
  "longitude": -122.08385,
  "zip_code": "94035",
  "time_zone": "-07:00",
  "asn": "15169",
  "as": "Google LLC",
  "is_proxy": false
}
```

## Benefits of IP2Location.io

1. **More Geographic Data**: Includes city, region, coordinates, and timezone
2. **HTTPS by Default**: Secure API endpoints
3. **Better Error Handling**: Clear error messages in API responses
4. **Consistent Response Format**: Always returns JSON with consistent field names
5. **Better Documentation**: Comprehensive API documentation with examples

## Troubleshooting

### API Key Issues
- Ensure you're using the IP2Location.io API key, not the old IPHub key
- Check that your API key has sufficient quota
- Verify the API key is active in your IP2Location.io dashboard

### Different Blocking Behavior
- IP2Location.io uses boolean proxy detection vs IPHub's numeric levels
- Safe and Strict modes now work identically
- Custom mode allows the same proxy blocking as other modes

### Testing
- Use the included `test-api.php` file to test API connectivity outside WordPress
- Replace `YOUR_API_KEY_HERE` with your actual API key
- Run via command line: `php test-api.php`

## Support

If you encounter issues during migration:

1. Use the "Test API Connectivity" button in plugin settings
2. Check the WordPress debug log for any errors
3. Verify your API key at IP2Location.io dashboard
4. Ensure your server can make HTTPS requests to api.ip2location.io

## Rollback (if needed)

If you need to rollback to IPHub.info:
1. Keep a backup of version 1.3 of the plugin
2. Deactivate version 2.0
3. Install version 1.3
4. Restore your IPHub.info API key

Note: We recommend using IP2Location.io for better features and reliability.
