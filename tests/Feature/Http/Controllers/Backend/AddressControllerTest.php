<?php

namespace Http\Controllers\Backend;

use App\Models\Adress;
use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;
use Tests\TestCase;

class AddressControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_page()
    {
        $response = $this->get('users/1/addresses');

        $response->assertStatus(200);
    }

    public function test_users_index_url_goes_correct_view()
    {
        $response = $this->get('users/1/addresses');
        $response->assertViewIs('Backend.addresses.index');
    }

    public function test_address_create_form_page_status()
    {
        $response = $this->get('users/1/addresses/create');
        $response->assertOk();
    }

    public function test_users_create_url_goes_correct_view()
    {
        $response = $this->get('users/1/addresses/create');
        $response->assertViewIs('Backend.addresses.insert_form');
    }

    public function test_users_new_resource_is_created()
    {
        $data = [
            'user_id' =>2,
            'city' => 'İstanbul',
            'district' => 'çekmeköy',
            'zipcode' => 12145,
            'address' => 'Açık adres alanıdır.',
            'is_default' => false
        ];
        $response = $this->post('/users/1/addresses', $data);
        $response->assertRedirect('/users/1/addresses');
    }

    public function test_users_existing_user_is_updated(){
        $entity = Adress::all()->last();
        $entity->city = 'UPDATED' . $entity->city;
        $entity->district = 'district' . $entity->district;
        $data = $entity->toArray();
        $response = $this->put('/users/1/addresses/'.$entity->address_id,$data);
        $response->assertRedirect('/users');
    }


    public function test_users_latest_user_is_deleted(){
        $addr = Adress::all()->last();
        $addr_id = $addr->address_id;
        $response = $this->delete('/users/1/addresses/'.$addr_id);
        $response->assertJson(['message' =>'Done','id'=>$addr_id]);
        $this->assertDeleted($addr);
    }
}
