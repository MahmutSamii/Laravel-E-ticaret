<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;


class ProductControllerTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_index_page_status()
    {
        $response = $this->get('/products');
        $response->assertOk();
    }

    public function test_users_index_url_goes_correct_view()
    {
        $response = $this->get('/products');
        $response->assertViewIs('backend.products.index');
    }

    public function test_users_create_form_page_status()
    {
        $response = $this->get('/products/create');
        $response->assertOk();
    }

    public function test_users_create_url_goes_correct_view()
    {
        $response = $this->get('/products/create');
        $response->assertViewIs('backend.products.insert_form');
    }

    public function test_users_new_resource_is_created()
    {
        $suffix = Str::random();
        $data = [
            "category_id" => 1,
            "name" => "Deneme ürünü" . $suffix,
            "price" => 679 ,
            "old_price" => 809,
            "slug" => "deneme-ürünü" . $suffix,
            "lead" => "Bu alan kısa açıklama alanıdır",
            'description' => 'adasdasdasd as das das da dasdad as das d'
        ];

        $response = $this->post('/products', $data);
        $response->assertRedirect("/products");
    }

    public function test_users_new_resource_is_created_with_optional_fields()
    {
        $suffix = Str::random();
        $data = [
            "category_id" => 444,
            "name" => "İndirimli ürünü" . $suffix,
            "price" => 67.99 ,
            "old_price" => 80.99 ,
            "slug" => "indirimli-ürünü" . $suffix,
            "lead" => "Bu alan kısa açıklama alanıdır",
            'description' => 'adasdasdasd as das das da dasdad as das d'
        ];

        $response = $this->post('/products', $data);
        $response->assertRedirect("/products");
    }

    public function test_users_existing_user_is_updated(){
        $entity = Product::all()->last();
        $entity->name = 'UPDATED' . $entity->name;
        $entity->slug = 'UPDATED' . $entity->slug;
        $data = $entity->toArray();
        $response = $this->put('/products/'.$entity->product_id,$data);
        $response->assertRedirect('/products');
    }


    public function test_users_latest_user_is_deleted(){
        $entity = Product::all()->last();
        $id = $entity->product_id;
        $response = $this->delete('/products/' . $id);
        $response->assertJson(["message" => "Done", "id" => $id]);
    }
}
