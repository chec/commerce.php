<?php

namespace Commerce\Http;

use Commerce\Http\HttpCallBack;
use \apimatic\jsonmapper\JsonMapper;
use Commerce\ApiHelper;
use Commerce\Exceptions;
use Commerce\Http\ApiException;
use Commerce\Http\HttpRequest;
use Commerce\Http\HttpResponse;
use Commerce\Http\HttpMethod;
use Commerce\Http\HttpContext;
use Unirest\Request;
use Commerce\Auth;
/**
 * Class ApiResource
 *
 * @package Chec
 */
class ApiResource
{

  public static $httpCallBack = null;

  public static function setHttpCallBack(HttpCallBack $httpCallBack)
  {
      self::$httpCallBack = $httpCallBack;
  }

  /**
   * Get HttpCallBack for this controller
   * @return HttpCallBack The HttpCallBack object set for this controller
   */
  public static function getHttpCallBack()
  {
      return self::$httpCallBack;
  }

  protected static function getJsonMapper()
  {
      $mapper = new JsonMapper();
      return $mapper;
  }

  public static function Request($type, $url, $parameters = []){


    $headers = array (
    'user-agent'    => Auth::$userAgent,
    'Accept'        => 'application/json',
    'X-Authorization' => Auth::$apiKey
    );

    switch($type){

      #GET!
      case 'GET':

        $httpRequest = new HttpRequest(HttpMethod::GET, $headers, $url);
        if(self::getHttpCallBack() != null) {
            self::getHttpCallBack()->callOnBeforeRequest($httpRequest);
        }
        $response = Request::get($url, $headers);

      break;

      case 'POST':

        $httpRequest = new HttpRequest(HttpMethod::POST, $headers, $url, $parameters);
        if(self::getHttpCallBack() != null) {
            self::getHttpCallBack()->callOnBeforeRequest($httpRequest);
        }
        $response = Request::post($url, $headers, Request\Body::Form($parameters));

      break;

      case 'PUT':

        $httpRequest = new HttpRequest(HttpMethod::PUT, $headers, $url, $parameters);
        if(self::getHttpCallBack() != null) {
            self::getHttpCallBack()->callOnBeforeRequest($httpRequest);
        }
        $response = Request::put($url, $headers, Request\Body::Form($parameters));

      break;

      case 'DELETE':

        $httpRequest = new HttpRequest(HttpMethod::DELETE, $headers, $url);
        if(self::getHttpCallBack() != null) {
            self::getHttpCallBack()->callOnBeforeRequest($httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::delete($url, $headers);

      break;

    }

    $httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
    $httpContext = new HttpContext($httpRequest, $httpResponse);
    HttpCallBack::callOnAfterRequest($httpContext);

    //Error handling using HTTP status codes
    if ($response->code == 401) {
      $reason = '['.ucwords(str_replace("_", ' ', $response->body->error->type)).'] '.$response->body->error->message;
      throw new ApiException($reason, $httpContext);
    }
    else if (($response->code < 200) || ($response->code > 208)) { //[200,208] = HTTP OK
        throw new ApiException("HTTP Response Not OK", $httpContext);
    }

    $to_array = json_decode(json_encode($response->body), true);

    return $to_array;

  }

}
