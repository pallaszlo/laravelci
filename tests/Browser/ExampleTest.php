<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://laravelci.test/')
                    ->assertSee('Laravel');
        });
    }

    public function testExample()
    {
        $this->browse(function ($browser) {
            //We'll test the register feature here
            $browser->visit('http://laravelci.test/')
                    ->clickLink('Register')
                    ->value('#name', 'Samson') 
                    ->value('#email', 'samson@test.com')
                    ->value('#password', '00000000')
                    ->value('#password_confirmation', '00000000')
                    ->click('button[type="submit"]') 

            //We'll test the login feature here
                    ->press('Samson');
                    if ($browser->seeLink('Log Out')) {
                        $browser->clickLink('Log Out')

                        ->clickLink('Login')
                        ->value('#email', 'samson@test.com')
                        ->value('#password', '00000000')
                        ->click('button[type="submit"]');
                    }

        });
    }
}
