<?php

namespace Commerce;

class Auth
{
    // @var string The Chec API key to be used for requests.
    public static $apiKey;

    // @var string The base URL for the Chec API.
    public static $apiBase = 'https://api.chec.io/v1';

    // @var string The base URL for the Chec API uploads endpoint.
    public static $apiUploadBase = 'https://uploads.chec.io';

    // @var string|null The version of the Chec API to use for requests.
    public static $apiVersion = null;

    public static $userAgent = 'Commerce.php/v1';

    const VERSION = '1.0.0';

    public static function getApiKey()
    {
        return self::$apiKey;
    }

    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    public static function getApiVersion()
    {
        return self::$apiVersion;
    }

    public static function setApiVersion($apiVersion)
    {
        self::$apiVersion = $apiVersion;
    }

}
