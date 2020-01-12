<?php namespace ArielMejiaDev\StorageLink;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class StorageLinkRouteServiceProvider extends RouteServiceProvider 
{

    protected $namespace = 'ArielMejiaDev\StorageLink\Http\Controllers';

    public function map()
    {
        Route::namespace($this->namespace)->group(__DIR__ . '/../routes/web.php');
    }

}