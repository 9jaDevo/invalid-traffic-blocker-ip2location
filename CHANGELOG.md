# Changelog

## [2.0.0] - 2025-01-XX

### Added
- IP2Location.io API integration
- Enhanced geolocation data in API responses
- HTTPS API endpoints for better security
- Improved error handling for API responses
- Migration guide documentation
- Test script for API connectivity verification

### Changed
- **BREAKING**: Migrated from IPHub.info to IP2Location.io API
- API endpoint from `http://v2.api.iphub.info/ip/` to `https://api.ip2location.io/`
- Authentication method from X-Key header to URL parameter
- Blocking logic from numeric `block` values to boolean `is_proxy` field
- Plugin version from 1.3 to 2.0
- All UI references from IPHub.info to IP2Location.io
- Registration link updated to IP2Location.io pricing page

### Improved
- API response timeout increased from 5 to 10 seconds
- Better error handling for API failures
- More descriptive blocking mode descriptions
- Enhanced API connectivity testing

### Removed
- IPHub.info API integration
- Support for IPHub's numeric block levels (1, 2)
- Old custom blocking options for non-residential and residential suspicious IPs

## [1.3.0] - Previous Release

### Added
- "Allow Known Crawlers" setting for search engine bots
- "Additional Crawler Patterns" textarea for custom User-Agent patterns
- Sanitized User-Agent header processing

### Changed
- Updated crawler detection logic
- Improved WordPress coding standards compliance

### Fixed
- User-Agent sanitization warnings
- Input validation security issues

## [1.2.0] - Previous Release

### Added
- Admin IP detection for API testing
- Styled response messages for API tests
- "Whitelist My IP" button functionality

### Changed
- API testing now uses admin's current IP instead of default

## [1.1.0] - Previous Release

### Added
- Whitelist functionality
- Basic API connectivity testing
- Multiple blocking modes

## [1.0.0] - Initial Release

### Added
- Core IPHub.info API integration
- Safe, Strict, and Custom blocking modes
- Persistent warning messages for blocked users
- Basic security measures and caching
