<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $create = User::create([
            'name'     => 'Randy',
            'email'    => 'randirandir476@gmail.com',
            'password' => 'NamiRandy1234',
            'id_hak_akses' => 2,
        ]);
        if (!$create){
            $this->assertTrue(false);
        }
        $this->assertTrue(true);

    }
}
