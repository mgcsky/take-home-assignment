<?php

namespace App\Providers;

use Exception;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Default namespace
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(90)->by($request->user()?->id ?: $request->ip())->response(function ($request, $limiter) {
                throw new Exception('Too Many Attempts.', Response::HTTP_TOO_MANY_REQUESTS);
            });
        });

        $this->routes(function () {
            Route::middleware([
                'api',
            ])->prefix('api/v1')
            ->name('api.v1.')
            ->namespace($this->namespace . '\Api\v1')
            ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        Route::pattern('resource_id', '[0-9]+');
    }
}
