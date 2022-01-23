<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ReportTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function only_logged_user_can_access_home()
    {
        $response = $this->get('/home')->assertRedirect('/login');
    }

    /** @test */
    public function user_can_see_home()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/home')->assertOk();
    }

    /** @test */
    public function admin_can_see_reports()
    {
        $this->actingAs(factory(User::class)->create([
            'role' => 'admin'
        ]));
        $response = $this->get('/reports')->assertOk();
    }

    /** @test */
    public function content_is_require_to_send_report()
    {
        $this->actingAs(factory(User::class)->create([
            'role' => 'admin'
        ]));

        $response = $this->post('/reports', [
            'content' => '',
            'email' => 'fadi.user@gmail.com'
        ]);

        $response->assertSessionHasErrors('content');
    }

    /** @test */
    public function report_is_sent_to__only_registered_users()
    {
        $this->actingAs(factory(User::class)->create([
            'role' => 'admin'
        ]));

        $response = $this->post('/reports', [
            'content' => 'this is content',
            'email' => 'fadi@gmail.com'
        ]);

        $response->assertSessionHasErrors('user');
    }
}
