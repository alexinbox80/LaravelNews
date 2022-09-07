<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_news_successful_page()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_admin_news_create_successful_page()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertViewIs('admin.news.create')
            ->assertStatus(200);
    }

    public function test_admin_news_edit_successful_page()
    {
        $response = $this->get(route('admin.news.edit', ['news' => '1']));

        $response->assertViewIs('admin.news.edit')
            ->assertStatus(200);
    }

    public function test_admin_news_create_return_json_page()
    {
        $faker = Factory::create();
        $title = $faker->jobTitle();
        $description = $faker->text(100);

        $data = [
            'title' => $title,
            'description' => $description
        ];

        $response = $this->post(route('admin.news.store'), $data);

        $response->assertJson($data)
            ->assertStatus(200);
    }
}
