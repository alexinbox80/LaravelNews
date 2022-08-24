<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response_news_order()
    {
        $response = $this->get('/order');

        $response->assertStatus(200);
    }
    public function test_order_successful_page()
    {
        $response = $this->get(route('order.index'));

        $response->assertStatus(200);
    }

    public function test_order_create_return_json_page()
    {
        $faker = Factory::create();
        $userName = $faker->userName();
        $userPhone = $faker->numerify('##########');
        $userEmail = $faker->email();
        $userUrl = $faker->url();
        $userDescription = $faker->text(100);

        $data = [
            'userName' => $userName,
            'userPhone' => $userPhone,
            'userEmail' => $userEmail,
            'userUrl' => $userUrl,
            'userDescription' => $userDescription
        ];

        $response = $this->post(route('order.store'), $data);

        $response->assertJson($data)
            ->assertStatus(200);
    }
}
