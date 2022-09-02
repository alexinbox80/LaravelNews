<?php

namespace Tests\Browser\Admin;

use App\Models\Category;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateForm(): void
    {
        $category = Category::factory()->create();

        $this->browse(static function (Browser $browser) use($category) {
            $browser->visit('/admin/categories/create')
                ->type('title', $category->title)
                ->type('author', $category->author)
                //->type('image', $category->image)
                ->type('description', $category->description)
                ->press('Сохранить')
                ->assertPathIs('/admin/categories');
        });
    }

    public function testEditForm(): void
    {
        $category = Category::factory()->create();

        $this->browse(static function (Browser $browser) use($category) {
            $browser->visit('/admin/categories/1/edit')
                ->type('title', $category->title)
                ->type('author', $category->author)
                //->type('image', $category->image)
                ->type('description', $category->description)
                ->press('Сохранить')
                ->assertPathIs('/admin/categories');
        });
    }

    public function testCreateFormFields(): void
    {
        $this->browse(static function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->assertSee('Заголовок')
                ->assertSee('Автор')
                ->assertSee('Изображение')
                ->assertSee('Описание');
        });
    }
}
