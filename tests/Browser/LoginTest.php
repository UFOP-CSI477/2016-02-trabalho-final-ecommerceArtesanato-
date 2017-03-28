<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    public function testLoginCliente()
    {
        $this->browse(function ($firstBrowser, $secondBrowser) {

            // Login como administrador
            $firstBrowser->visit('/login')
                ->type('email', 'admin@admin.com')
                ->type('senha', 'admin')
                ->press('Login')
                ->assertPathIs('/painel');

            $secondBrowser->visit('/login')
                ->type('email', 'teste@teste.com')
                ->type('senha', '1q2w3e4r')
                ->press('Login')
                ->assertPathIs('/painel');
        });
    }
}
