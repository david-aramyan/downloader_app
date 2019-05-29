<?php

namespace Tests\Unit;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\DownloadResource;

class JobTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDownloader()
    {
        $this->assertTrue(class_exists(\App\Jobs\DownloadResource::class));
    }
}
