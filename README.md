# Invalid Traffic Blocker

**Contributors:** mao## Changelog

### 2.0
- **BREAKING CHANGE**: Migrated from IPHub.info API to IP2Location.io API.
- Updated API endpoints and request format to use IP2Location.io's REST API.
- Modified blocking logic to use IP2Location.io's `is_proxy` boolean field instead of IPHub's numeric block values.
- Updated Safe Mode to block IPs where `is_proxy` is true.
- Updated Strict Mode to function the same as Safe Mode (IP2Location.io uses boolean proxy detection).
- Updated Custom Mode to allow selection of proxy blocking based on `is_proxy` field.
- Updated API connectivity testing to work with IP2Location.io format.
- Updated all references from IPHub.info to IP2Location.io in UI and documentation.
- Improved error handling for IP2Location.io API responses.
- Updated registration link to point to IP2Location.io pricing page.

### 1.3
- Added "Allow Known Crawlers" setting to automatically bypass IP checks for common search engine bots (Googlebot, Bingbot, Slurp, DuckDuckBot, Baiduspider, YandexBot).
- Introduced "Additional Crawler Patterns" textarea so admins can specify extra User-Agent regexes to whitelist.
- Updated `invatrbl_check_visitor_ip()` to use `filter_input()` and `sanitize_text_field()` when reading `$_SERVER['HTTP_USER_AGENT']` to comply with WP security standards.
- Ensured User-Agent checks are fully sanitized to eliminate any `InputNotSanitized` warnings during plugin review.
- Streamlined front-end blocking logic so known crawlers (built-in or custom) are skipped before performing IPHub API lookups.
- Minor code refactoring and cleanup to align with WordPress Plugin Coding Standards.**Tags:** invalid traffic, blocker, ip, adsense, vpn  
**Requires at least:** 4.5  
**Tested up to:** 6.8  
**Stable tag:** 2.0  
**License:** GPLv2 or later  
**License URI:** [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html)  
**Requires PHP:** 7.2  
**Text Domain:** invalid-traffic-blocker-ip2location  

## Short Description

Protect your site from invalid traffic by blocking suspicious IPs using the IP2Location.io API.

## Description

Invalid Traffic Blocker is a WordPress plugin that uses the IP2Location.io API to detect and block unwanted traffic such as bots, VPNs, and suspicious IP addresses. This helps AdSense publishers and website owners ensure that only valid traffic is served. This is not an official plugin for IP2Location.io.

## Installation

1. Upload the plugin files to the `/wp-content/plugins/invalid-traffic-blocker` directory or install the plugin through the WordPress plugins screen.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Navigate to `Settings > Invalid Traffic Blocker` in your WordPress admin dashboard.
4. Enter your IP2Location.io API key, choose your desired blocking mode, and add any trusted IP addresses to the whitelist.
5. Save your settings and use the "Test API Connectivity" and "Whitelist My IP" buttons as needed.

## Frequently Asked Questions

### What is Invalid Traffic Blocker?

Invalid Traffic Blocker is a WordPress plugin that uses the IP2Location.io API to detect and block unwanted traffic, including bots, VPNs, and suspicious IP addresses. It helps ensure that only valid traffic reaches your website.

### How do I configure the plugin?

After activating the plugin, go to `Settings > Invalid Traffic Blocker`. Here you can enter your API key, select a blocking mode, and manage your IP whitelist.

### What if my API key is missing or invalid?

If the API key is missing or incorrect, the plugin will not perform any blocking. Make sure to obtain a valid API key from [IP2Location.io](https://www.ip2location.io/pricing).

### Can I update the whitelist later?

Yes, you can update the list of whitelisted IP addresses at any time from the settings page.

### How do I whitelist my IP?

Click the "Whitelist My IP" button on the settings page to add your current IP address to the whitelist.

## Changelog

### 1.3
- Added “Allow Known Crawlers” setting to automatically bypass IP checks for common search engine bots (Googlebot, Bingbot, Slurp, DuckDuckBot, Baiduspider, YandexBot).
- Introduced “Additional Crawler Patterns” textarea so admins can specify extra User-Agent regexes to whitelist.
- Updated `invatrbl_check_visitor_ip()` to use `filter_input()` and `sanitize_text_field()` when reading `$_SERVER['HTTP_USER_AGENT']` to comply with WP security standards.
- Ensured User-Agent checks are fully sanitized to eliminate any `InputNotSanitized` warnings during plugin review.
- Streamlined front-end blocking logic so known crawlers (built-in or custom) are skipped before performing IPHub API lookups.
- Minor code refactoring and cleanup to align with WordPress Plugin Coding Standards.

### 1.2

- Use admin's current IP for API testing instead of a default.
- Fancy info boxes for API test responses (green for success, red for errors).
- "Whitelist My IP" button to add the admin's current IP to the whitelist automatically.

### 1.1

- Added whitelist functionality and basic API connectivity testing.
- Introduced multiple blocking modes.

### 1.0

- Initial release with core functionality:
  - Integration with IPHub.info API.
  - Multiple blocking modes: Safe, Strict, and Custom.
  - Persistent warning message for blocked users.
  - Basic security measures and caching implementation.

## Upgrade Notice

### 2.0

This is a major update that migrates from IPHub.info to IP2Location.io API. You will need to obtain a new API key from IP2Location.io and update your settings. The plugin now uses IP2Location.io's boolean proxy detection system instead of IPHub's numeric block values.

### 1.3

This update adds an option to allow known search engine crawlers and custom User-Agent patterns to bypass the IP check, and ensures full sanitization of the User-Agent header to meet WordPress security requirements.

## Screenshots

1. Admin settings page with API key, blocking mode options, and whitelist functionality.
2. API connectivity test output showing a green info box on success.
3. Warning message for blocked users.

## External Services ##
This plugin connects to the IP2Location.io API to validate IP addresses and determine whether they are proxies, VPNs, or invalid traffic sources.
Data transmitted:
  • The visitor's IP address is sent to IP2Location.io each time a check is performed.
Purpose:
  • To determine if the IP is a proxy/VPN (is_proxy field) and decide whether to block access.
Terms and Privacy:
  • IP2Location.io Terms of Service: [https://www.ip2location.io/terms-of-service](https://www.ip2location.io/terms-of-service)
  • IP2Location.io Privacy Policy: [https://www.ip2location.io/privacy-policy](https://www.ip2location.io/privacy-policy)
