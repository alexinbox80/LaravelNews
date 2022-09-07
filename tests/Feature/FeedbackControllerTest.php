<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory;

class FeedbackControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response_news_feedback()
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);
    }

    public function test_feedback_successful_page()
    {
        $response = $this->get(route('feedback.index'));

        $response->assertStatus(200);
    }

    public function test_feedback_create_return_json_page()
    {
        $faker = Factory::create();
        $userName = $faker->userName();
        $userFeedback = $faker->text(100);

        $data = [
            'userName' => $userName,
            'userFeedback' => $userFeedback
        ];

        $response = $this->post(route('feedback.store'), $data);

        $response->assertJson($data)
            ->assertStatus(200);
    }
}
