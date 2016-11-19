<?php

namespace Commerce;

use Commerce\Http\ApiHelper;

class Order extends Http\ApiResource
{
    /**
     * Commerce\Order::all();
     */
    public static function all( $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/orders';

      $query_params = ['limit' => self::val($query_parameters, 'limit'),'page' => self::val($query_parameters, 'page')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Order::fulfillment();
     */
    public static function fulfillment($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/orders/{id}/fulfillment';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Order::payments();
     */
    public static function payments($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/orders/{id}/payments';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Order::receipt();
     */
    public static function receipt($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/orders/{id}/receipt';
      $path_params = ['id' => $id];
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
