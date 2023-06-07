<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller {
   public function setCookie(Request $request) {
      $minutes = 10000;
      $response = new Response('Hello World');
      $response->withCookie(cookie('namewefwef1111', '11111wefwef111', $minutes));
      return $response;
   }
   public function getCookie(Request $request) {
      $value = $request->cookie();
      dd($value);
   }
}