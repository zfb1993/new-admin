<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class SignDecode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取签名
        if (!isset($request->sign)){
            response()->json(['message' => '您未登录'], Response::HTTP_UNAUTHORIZED)->send();
            exit;
        }
        $sign = $request->sign;
        $sign = base64_decode($sign);
        $timeStamp = substr($sign, -20);
        $timeStamp = base64_decode($timeStamp);
        $secret = 'AJZ11bguZxcvLG#';
        $checkSign = md5($secret.$timeStamp).base64_encode($timeStamp);
        if ($checkSign != $sign){
            response()->json(['message' => '您未登录'], Response::HTTP_UNAUTHORIZED)->send();
            exit;
        }
        return $next($request);
    }
}
