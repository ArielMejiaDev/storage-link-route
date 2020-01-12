<?php namespace ArielMejiaDev\StorageLink\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class StorageLinkController extends Controller
{

    public function index(Filesystem $filesystem)
    {
        if ($filesystem->exists(public_path('storage'))) {
            return 'The "public/storage" directory already exists.';
        }

        $filesystem->link(
            storage_path('app/public'), public_path('storage')
        );

        return 'The [public/storage] directory has been linked.';
    }

}