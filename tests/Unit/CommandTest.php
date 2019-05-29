<?php

namespace Tests\Unit;

use App\Resource;
use Tests\TestCase;
use Illuminate\Support\Facades\Bus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\DownloadResource;

class CommandTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testList()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\ResourcesList::class));


    }
    public function testDonwload()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\ResourceDownload::class));


    }
}
