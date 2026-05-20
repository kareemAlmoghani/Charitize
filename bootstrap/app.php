<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckType;
use App\Http\Middleware\ChangeLang;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // طريقة الاستدعاء ل global
        // $middleware->append(CheckType::class);
        // طريقة الاستدعاء ل group
        // $middleware->web(CheckType::class);
        // طريقة الاستدعاء ل alias

        // حطيناها بالاسفل
        // $middleware->alias([
        //     'admin'=>CheckType::class
        // ]);

        // هذا الاستدعاء للترجمة ولكن ما بدنا اياه
        // $middleware->web(ChangeLang::class);

        $middleware->alias([
            'admin'=>CheckType::class,
            'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
