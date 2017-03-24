<?php

namespace Commerce;

use Commerce\Http\ApiHelper;

class Service extends Http\ApiResource
{
    /**
     * Commerce\Service::localeListCountries();
     */
    public static function localeListCountries( $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/services/locale/countries';

      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Service::localeListShippingCountries();
     */
    public static function localeListShippingCountries($checkoutTokenId, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/services/locale/{checkout_token_id}/countries';
      $path_params = ['checkout_token_id' => $checkoutTokenId];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Service::localeListShippingSubdivisions();
     */
    public static function localeListShippingSubdivisions($checkoutTokenId,$countryCode, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/services/locale/{checkout_token_id}/countries/{country_code}/subdivisions';
      $path_params = ['checkout_token_id' => $checkoutTokenId,'country_code' => $countryCode];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Service::localeListSubdivisions();
     */
    public static function localeListSubdivisions($countryCode, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/services/locale/{country_code}/subdivisions';
      $path_params = ['country_code' => $countryCode];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    private static function val($arr, $key, $default = NULL)
    {
        if(isset($arr[$key])) {
            return is_bool($arr[$key]) ? var_export($arr[$key], true) : $arr[$key];
        }
        return $default;
    }
}
