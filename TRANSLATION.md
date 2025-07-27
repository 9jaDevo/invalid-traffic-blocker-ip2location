# Language File Template for Invalid Traffic Blocker

This plugin supports internationalization (i18n) and localization (l10n). The text domain is `invalid-traffic-blocker-ip2location`.

## Translatable Strings

The following strings in the plugin are available for translation:

### Admin Interface
- "You are not allowed to perform this action."
- "Error: API key is not set."
- "Error: API Connection Error: "
- "Error: API Error: HTTP Code "
- "Error: API Error: "
- "Success: API Response: "
- "Access Restricted"
- "Skip IP check for known crawler User-Agents"
- "One regex per line, e.g. ^MyCustomBot"
- "Add any extra User-Agent patterns (one per line) to whitelist."

### Frontend Messages
- "Access Restricted" (page title when blocked)

## Creating Language Files

To create a translation for this plugin:

1. Use a tool like Poedit or Loco Translate
2. Create a `.po` file for your language (e.g., `invalid-traffic-blocker-ip2location-es_ES.po` for Spanish)
3. Translate all the strings listed above
4. Compile to a `.mo` file
5. Place both files in the plugin's `languages/` directory

## Language Directory Structure

```
/wp-content/plugins/invalid-traffic-blocker-ip2location/
  languages/
    invalid-traffic-blocker-ip2location-es_ES.po
    invalid-traffic-blocker-ip2location-es_ES.mo
    invalid-traffic-blocker-ip2location-fr_FR.po
    invalid-traffic-blocker-ip2location-fr_FR.mo
    ... (other languages)
```

## Plugin Text Domain

The plugin uses the text domain: `invalid-traffic-blocker-ip2location`

All translatable strings use WordPress standard functions:
- `esc_html__()`
- `esc_html_e()`
- `esc_attr_e()`

## Example Translation Function Call

```php
echo esc_html__('Error: API key is not set.', 'invalid-traffic-blocker-ip2location');
```

This will look for a translation of "Error: API key is not set." in the language files for the `invalid-traffic-blocker-ip2location` text domain.
