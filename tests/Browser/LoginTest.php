<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'moocfans@moocfans.cn')
            ->type('password', 'moocfans')
            ->press('Login')
            ->assertSee('You are logged in!');
        });
    }
}
