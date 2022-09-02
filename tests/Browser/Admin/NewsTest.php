<?php

namespace Tests\Browser\Admin;

use App\Models\News;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateForm(): void
    {
        $news = News::factory()->create();

        $this->browse(static function (Browser $browser) use($news) {
            $browser->visit('/admin/news/create')
                ->select('category_id', range(1, 10))
                ->type('title', $news->title)
                ->type('author', $news->author)
                ->select('status', News::ACTIVE)
                ->type('description', $news->description)
                ->press('Сохранить')
                ->assertPathIs('/admin/news');
        });
    }

    public function testEditForm(): void
    {
        $news = News::factory()->create();

        $this->browse(static function (Browser $browser) use($news) {
            $browser->visit('/admin/news/1/edit')
                ->select('category_id', range(1, 10))
                ->type('title', $news->title)
                ->type('author', $news->author)
                ->select('status', News::ACTIVE)
                ->type('description', $news->description)
                ->press('Сохранить')
                ->assertPathIs('/admin/news');
        });
    }

    public function testCreateFormFields(): void
    {
        $this->browse(static function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSee('Выбрать категорию')
                ->assertSee('Заголовок')
                ->assertSee('Автор')
                ->assertSee('Статус')
                ->assertSee('Изображение')
                ->assertSee('Описание');
        });
    }
}
