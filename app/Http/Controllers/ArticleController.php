<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

use Illuminate\Http\Request;

class ArticleController extends Controller implements HasMiddleware
{
   public static function middleware(): array
   {
       return [
           new Middleware('auth', only: ['create']),
       ];
   }
}