# Matomo Cloudflare Geolocation plugin

## Description

Provides country-code geolocation for Matomo (Piwik) using Cloudflare headers.  Use this
instead of the default GeoIP2 plugin if all tracking requests are being routed through Cloudflare.

This plugin trusts the country code provided in the `HTTP_CF_IPCOUNTRY` header injected by 
Cloudflare, and does not require any GeoIP database.

If requests are tracked outside of Cloudflare, no geolocation information will be available.

