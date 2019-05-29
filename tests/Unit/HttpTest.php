<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HttpTest extends TestCase
{
//    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetResourcesTest()
    {
        $response = $this->get( '/resources');
        $response ->assertStatus(200);
    }

    public function testGetAddResourceTest()
    {
        $response = $this->get( '/resources/add');
        $response ->assertStatus(200);
    }

    public function testApiPost()
    {
        $url = "https://www.washingtonpost.com/resizer/F-za1gpR1bDTi6NK34KYz9zBN-U=/1484x0/arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/UUTHJJQ7Q4I6TJ2ZFOCUDO56EA.jpg";
        $this->post('api/resources/add', ['url' => $url])
            ->assertStatus(200)
            ->assertJson(['success'=>'true']);

    }

    public function testApiGetTest()
    {
        $this->get('api/resources')
            ->assertStatus(200);
    }
}
