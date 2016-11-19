<?php

namespace Commerce\Http;

/**
* HttpCallBack allows defining callables for pre and post API calls.
*/
class HttpCallBack
{
    /**
     * Callable for on-before event of API calls
     * @var callable
     */
    public static $onBeforeRequest = null;

    /**
     * Callable for on-after event of API calls
     * @var callable
     */
    public static $onAfterRequest = null;

    /**
     * Create a new HttpCallBack instance
     * @param callable|null $onBeforeRequest Called before an API call
     * @param callable|null $onAfterRequest  Called after an API call
     */
    public function __construct(callable $onBeforeRequest = null, callable $onAfterRequest = null)
    {
        HttpCallBack::$onBeforeRequest = $onBeforeRequest;
        HttpCallBack::$onAfterRequest = $onAfterRequest;
    }

    /**
     * Set on-before event callback
     * @param callable $func On-before event callable
     */
    public static function setOnBeforeRequest(callable $func)
    {
        HttpCallBack::$onBeforeRequest = $func;
    }

    /**
     * Get On-before API call event callable
     * @return callable Callable
     */
    public static function getOnBeforeRequest()
    {
        return HttpCallBack::$onBeforeRequest;
    }

    /**
     * Set On-after API call event callable
     * @param callable $func On-after event callable
     */
    public static function setOnAfterRequest(callable $func)
    {
        HttpCallBack::$onAfterRequest = $func;
    }

    /**
     * Get On-After API call event callable
     * @return callable On-after event callable
     */
    public static function getOnAfterRequest()
    {
        return HttpCallBack::$onAfterRequest;
    }

    /**
     * Call on-before event callable
     * @param  HttpRequest $httpRequest HttpRequest for this call
     */
    public static function callOnBeforeRequest(HttpRequest $httpRequest)
    {
        if(HttpCallBack::$onBeforeRequest != null)
            call_user_func(HttpCallBack::$onBeforeRequest, $httpRequest);
    }

    /**
     * Call on-after event callable
     * @param  HttpRequest $httpRequest HttpRequest for this call
     */
    public static function callOnAfterRequest(HttpContext $httpContext)
    {
        if(HttpCallBack::$onAfterRequest != null)
            call_user_func(HttpCallBack::$onAfterRequest, $httpContext);
    }
}
