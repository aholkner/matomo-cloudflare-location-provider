<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\CloudflareLocationProvider;

class CloudflareLocationProvider extends \Piwik\Plugin
{
	public function deactivate()
	{
		// switch to default provider if CloudflareLocationProvider was in use
		if (LocationProvider::getCurrentProvider() instanceof \Piwik\Plugins\CloudflareLocationProvider\LocationProvider\Cloudflare) {
			LocationProvider::setCurrentProvider(LocationProvider\DefaultProvider::ID);
		}
	}
}
