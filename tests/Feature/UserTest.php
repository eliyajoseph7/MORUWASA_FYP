<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Customer;
use App\Models\Meter;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function only_login_users_can_see_the_dashboard()
    {
        $response = $this->get('/home')->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_see_the_register_page()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/setup')->assertOk();
    }

    /** @test */
    public function authenticated_users_can_register_customer()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/addCustomer', [
            'name' => 'Eliya Joseph', 
            'street' => 'sabasaba', 
            'gender' => 'M', 
            'phone' => '+255123456789', 
            'category' => 'domestic',
            'meter_no' => '12345678',
        ]);

        $this->assertCount(1, Customer::all());
    }


    /** @test */
    public function authenticated_users_can_register_meter()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/addMeter', [
            'customer_id' => '1', 
            'type' => 'postpaid', 
            'meter_no' => '12345678',
        ]);

        $this->assertCount(1, Meter::all());
    }

    
    /** @test */
    public function testing_user_registration()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/registerStaff', [
            'firstname' => 'Eliya',
            'lastname' => 'Joseph',
            'username' => 'Eliya',
            'occupation' => 'bill manager',
            'gender' => 'M',
            'phone' => "+255123456789",
            'permission' => 'superuser',
            'email' => 'eliya@test.com',
            'password' => '12345678',
        ]);

        $this->assertCount(1, User::all());
    }
    
    /** @test */
    public function generate_water_bill_control_number_and_send_message()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/generate')->assertOk();
    }
}
