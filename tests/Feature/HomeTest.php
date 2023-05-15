<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    // use WithoutMiddleware;
    /**
     * Test homepage working status.
     *
     * @return void
     */
    public function test_welcome_page_sucess()
    {
        $response = $this->get('/');
        $response->assertViewIs('welcome');
        $response->assertSuccessful();
    }

    /**
     * Test auth login page working status.
     *
     * @return void
     */
    public function test_auth_login_page_sucess()
    {
        $response = $this->get('/login');
        $response->assertViewIs('auth.login');
        $response->assertSuccessful();
    }

    /**
     * Test auth register page working status.
     *
     * @return void
     */
    public function test_auth_register_page_sucess()
    {
        $response = $this->get('/register');
        $response->assertViewIs('auth.register');
        $response->assertSuccessful();
    }

    /**
     * Test homepage working status.
     *
     * @return void
     */
    public function test_home_page_sucess()
    {
        // $this->withoutMiddleware();
        $response = $this->get('/home');
        // $response->assertViewIs('home');
        $response->assertStatus(302);
    }
    
    // /**
    //  * Test homepage working status.
    //  *
    //  * @return void
    //  */
    // public function test_welcome_page_sucess()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    // /**
    //  * Test homepage working status.
    //  *
    //  * @return void
    //  */
    // public function test_welcome_page_sucess()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    // /**
    //  * Test homepage working status.
    //  *
    //  * @return void
    //  */
    // public function test_welcome_page_sucess()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    // /**
    //  * Test homepage working status.
    //  *
    //  * @return void
    //  */
    // public function test_welcome_page_sucess()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    // /**
    //  * Test homepage working status.
    //  *
    //  * @return void
    //  */
    // public function test_welcome_page_sucess()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }


}
