<?php

namespace Tests\Browser;

use App\Models\Order;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class OrderTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateForm(): void
    {
        $order = Order::factory()->create();

        $this->browse(static function (Browser $browser) use($order) {
            $browser->visit('/order')
                ->type('name', $order->name)
                ->type('phone', $order->phone)
                ->type('email', $order->email)
                ->type('url', $order->url)
                ->type('description', $order->description)
                ->press('Сохранить')
                ->assertPathIs('/order');
        });
    }

    public function testCreateFormFields(): void
    {
        $this->browse(static function (Browser $browser) {
            $browser->visit('/order')
                ->assertSee('Имя пользователя')
                ->assertSee('Номер телефона')
                ->assertSee('Электронная почта')
                ->assertSee('Ссылка на ресурс')
                ->assertSee('Информации о том, что необходимо');
        });
    }
}
