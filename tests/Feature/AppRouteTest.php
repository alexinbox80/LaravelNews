<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppRouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response_admin_index()
    {
        $response = $this->get(route('admin.index'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_admin_categories_index()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_admin_categories_edit()
    {
        $response = $this->get(route('admin.categories.edit', ['category' => 1]));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_admin_categories_create()
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_admin_news_index()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_admin_news_edit()
    {
        $response = $this->get(route('admin.news.edit', ['news' => 1]));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_admin_news_create()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_news_index()
    {
        $response = $this->get(route('news.index'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_news_category()
    {
        $response = $this->get(route('news.showCategory', ['id' => 1]));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_news_news()
    {
        $response = $this->get(route('news.showNews', ['id' => 1]));

        $response->assertStatus(200);
    }
}
