<?php

// namespace App\Http;
use Illuminate\Foundation\Application;
// use App\Http\Middleware\MustBeAdmin;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// use Illuminate\Foundation\Http\Kernel as HttpKernel;


// class AppMiddleware
// {
//    public function (Middleware $middleware) {
//         // Using a string
//         $middleware->append(\App\Http\Middleware\MyMiddleware::class);
    
//         // Or adding multiple
//         $middleware->append([
//             \App\Http\Middleware\MyMiddleware::class,
//             \App\Http\Middleware\MyOtherMiddleware::class,
//         ]);
//     }
// }

// class Kernel extends HttpKernel 
// {
//     protected function casts(): array 
//     {
//         return [
//             'admin' => MustBeAdmin::class,
//         ];
//     }
// };

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->alias (['admin' => MustBeAdmin::class,]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
