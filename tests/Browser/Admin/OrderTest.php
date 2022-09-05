<?php

namespace Tests\Browser\Admin;

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
    public function testEditForm(): void
    {
        $order = Order::factory()->create();

        $this->browse(static function (Browser $browser) use($order) {
            $browser->visit('/admin/order/1/edit')
                ->type('name', $order->name)
                ->type('phone', $order->phone)
                ->type('email', $order->email)
                ->type('url', $order->url)
                ->type('description', $order->description)
                ->press('Сохранить')
                ->assertPathIs('/admin/order');
        });
    }

    public function testEditFormFields(): void
    {
        $this->browse(static function (Browser $browser) {
            $browser->visit('/admin/order/1/edit')
                ->assertSee('Имя пользователя')
                ->assertSee('Номер телефона')
                ->assertSee('Электронная почта')
                ->assertSee('Ссылка на ресурс')
                ->assertSee('Информации о том, что необходимо');
        });
    }
}
