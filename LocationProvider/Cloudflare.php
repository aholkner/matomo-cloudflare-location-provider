<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\CloudflareLocationProvider\LocationProvider;

use Exception;
use Piwik\Option;
use Piwik\Piwik;
use Piwik\Plugins\UserCountry\LocationProvider;

class Cloudflare extends LocationProvider
{
    public function getLocation($info)
    {
        $location = array(
            self::COUNTRY_CODE_KEY => $_SERVER['HTTP_CF_IPCOUNTRY']
        );
        self::completeLocationResult($location);
        return $location;
    }

    public function isWorking()
    {
        return array_key_exists('HTTP_CF_IPCOUNTRY', $_SERVER);
    }

    public function isAvailable()
    {
        return true;
    }

    public function getSupportedLocationInfo()
    {
        return array(
            self::COUNTRY_CODE_KEY => true
        );
    }

    public function getInfo()
    {
        return array(
            'id' => 'cloudflare',
            'title' => 'Cloudflare',
            'description' => 'This location provider uses the HTTP_CF_IPCOUNTRY header injected by Cloudflare to determine the country of origin of each request.',
            'order' => 4
        );
    }
}
