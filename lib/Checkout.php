<?php

namespace Commerce;

use Commerce\Http\ApiHelper;

class Checkout extends Http\ApiResource
{
    /**
     * Commerce\Checkout::capture();
     */
    public static function capture($identifier,$parameters, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{identifier}';
      $path_params = ['identifier' => $identifier];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);
      return Http\ApiResource::Request('POST', $_queryUrl, $parameters);
          }
    /**
     * Commerce\Checkout::checkDiscount();
     */
    public static function checkDiscount($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/check/discount';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['code' => self::val($query_parameters, 'code')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::checkPayWhatYouWant();
     */
    public static function checkPayWhatYouWant($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/check/pay_what_you_want';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['customer_set_price' => self::val($query_parameters, 'customer_set_price')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::checkPaypalOrderCaptured();
     */
    public static function checkPaypalOrderCaptured($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/check/paypal/captured';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::checkPaypalStatus();
     */
    public static function checkPaypalStatus($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/check/paypal/payment';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::checkQuantity();
     */
    public static function checkQuantity($id,$lineItemId, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/check/{line_item_id}/quantity';
      $path_params = ['id' => $id,'line_item_id' => $lineItemId];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['amount' => self::val($query_parameters, 'amount')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::checkShippingOption();
     */
    public static function checkShippingOption($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/check/shipping';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['country' => self::val($query_parameters, 'country'),'id' => self::val($query_parameters, 'id')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::checkVariant();
     */
    public static function checkVariant($id,$lineItemId, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/check/{line_item_id}/variant';
      $path_params = ['id' => $id,'line_item_id' => $lineItemId];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['variant_id' => self::val($query_parameters, 'variant_id'),'option_id' => self::val($query_parameters, 'option_id')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::generateToken();
     */
    public static function generateToken($identifier, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{identifier}';
      $path_params = ['identifier' => $identifier];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['type' => self::val($query_parameters, 'type')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::getLive();
     */
    public static function getLive($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/live';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::getLocationFromIP();
     */
    public static function getLocationFromIP($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/helper/location_from_ip';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['ip_address' => self::val($query_parameters, 'ip_address')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::getShippingOptions();
     */
    public static function getShippingOptions($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/helper/shipping_options';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['country' => self::val($query_parameters, 'country')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::helperValidation();
     */
    public static function helperValidation($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/helper/validation';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::isFree();
     */
    public static function isFree($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/check/is_free';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::receipt();
     */
    public static function receipt($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/receipt';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['type' => self::val($query_parameters, 'type')];
      Http\ApiHelper::appendUrlWithQueryParameters($_queryBuilder, $query_params);
      $_queryUrl = ApiHelper::cleanUrl($_queryBuilder);

      return Http\ApiResource::Request('GET', $_queryUrl);
    }
    /**
     * Commerce\Checkout::setTaxZone();
     */
    public static function setTaxZone($id, $query_parameters = [])
    {
      $_queryBuilder = Auth::$apiBase.'/checkouts/{id}/helper/set_tax_zone';
      $path_params = ['id' => $id];
      Http\ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, $path_params);
      $query_params = ['ip_address' => self::val($query_parameters, 'ip_address'),'country' => self::val($query_parameters, 'country'),'region' => self::val($query_parameters, 'region'),'postal_zip_code' => self::val($query_parameters, 'postal_zip_code')];
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
