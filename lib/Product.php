<?php

namespace Commerce;

use Commerce\Http\ApiHelper;

class Product extends Http\ApiResource
{
    /**
     * Commerce\Product::all();
     */
    public static function all( $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/products';

      $query_params = ['limit' => self::val($query_parameters, 'limit'),'page' => self::val($query_parameters, 'page')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Product::retrieve();
     */
    public static function retrieve($identifier, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/products/{identifier}';
      $path_params = ['identifier' => $identifier];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['type' => self::val($query_parameters, 'type')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
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
