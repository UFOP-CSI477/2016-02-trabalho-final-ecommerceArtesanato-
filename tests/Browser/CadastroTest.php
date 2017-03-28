<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CadastroTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('nome', 'teste')
                ->type('email', str_random(5) . '@teste.com')
                ->type('senha', '1q2w3e4r')
                ->type('senha_confirmation', '1q2w3e4r')
                ->type('endereco', 'Rua da Mentira, 01, Centro - Brasília, Brasil')
                ->press('Cadastrar')
                ->assertPathIs('/');
        });
    }
}
