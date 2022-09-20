<?php

namespace Tests\Browser\Admin;

use App\Models\Feedback;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FeedbackTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditForm(): void
    {
        $feedback = Feedback::factory()->create();

        $this->browse(static function (Browser $browser) use($feedback) {
            $browser->visit('/admin/feedback/1/edit')
                ->type('name', $feedback->name)
                ->type('description', $feedback->description)
                ->press('Сохранить')
                ->assertPathIs('/admin/feedback');
        });
    }

    public function testEditFormFields(): void
    {
        $this->browse(static function (Browser $browser) {
            $browser->visit('/admin/feedback/1/edit')
                ->assertSee('Имя пользователя')
                ->assertSee('Отзыв по работе проекта');
        });
    }
}
