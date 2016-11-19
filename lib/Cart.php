<?php

namespace Commerce;

use Commerce\Http\ApiHelper;

class Cart extends Http\ApiResource
{
    /**
     * Commerce\Cart::add();
     */
    public static function add($id,$parameters, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/carts/{id}';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);
      return Http\ApiResource::Request('POST', $_queryUrl, $parameters);
          }
    /**
     * Commerce\Cart::contents();
     */
    public static function contents($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/carts/{id}/items';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Cart::create();
     */
    public static function create( $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/carts';

      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Cart::delete();
     */
    public static function delete($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/carts/{id}';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('DELETE', $_queryUrl);
    }
    /**
     * Commerce\Cart::remove();
     */
    public static function remove($id,$lineItemId, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/carts/{id}/items/{line_item_id}';
      $path_params = ['id' => $id,'line_item_id' => $lineItemId];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('DELETE', $_queryUrl);
    }
    /**
     * Commerce\Cart::reset();
     */
    public static function reset($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/carts/{id}/items';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('DELETE', $_queryUrl);
    }
    /**
     * Commerce\Cart::retrieve();
     */
    public static function retrieve($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/carts/{id}';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Cart::update();
     */
    public static function update($id,$lineItemId,$parameters, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/carts/{id}/items/{line_item_id}';
      $path_params = ['id' => $id,'line_item_id' => $lineItemId];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);
      return Http\ApiResource::Request('PUT', $_queryUrl, $parameters);
          }
    private static function val($arr, $key, $default = NULL)
    {
        if(isset($arr[$key])) {
            return is_bool($arr[$key]) ? var_export($arr[$key], true) : $arr[$key];
        }
        return $default;
    }
}
