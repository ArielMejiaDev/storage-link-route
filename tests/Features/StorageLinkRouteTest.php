<?php namespace ArielMejiaDev\StorageLink\Tests\Features;

use ArielMejiaDev\StorageLink\Tests\TestCase as TestCase;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StorageLinkRouteTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function can_execute_storage_link_from_a_route()
    {
        $spy = $this->spy(Filesystem::class);
        $this->get('storage-link')->assertSee('The [public/storage] directory has been linked.');
        $spy->shouldHaveReceived('link')->with(storage_path('app/public'), public_path('storage'));
        $spy->shouldHaveReceived('exists')->with(public_path('storage'));
    }

    /** @test */
    public function cannot_create_storage_link_twice()
    {
        //this mock if filesystem use method exists and it returns true.. we are going to see the message above
        $this->mock(Filesystem::class)->shouldReceive('exists')->andReturn(true);

        $this->get('storage-link')->assertSee('The "public/storage" directory already exists.');
    }

}