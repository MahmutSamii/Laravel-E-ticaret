<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;


class CategoryControllerTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_index_page_status()
    {
        $response = $this->get('/categories');
        $response->assertOk();
    }

    public function test_users_index_url_goes_correct_view()
    {
        $response = $this->get('/categories');
        $response->assertViewIs('Backend.categories.index');
    }

    public function test_users_create_form_page_status()
    {
        $response = $this->get('/categories/create');
        $response->assertOk();
    }

    public function test_users_create_url_goes_correct_view()
    {
        $response = $this->get('/categories/create');
        $response->assertViewIs('Backend.categories.insert_form');
    }

    public function test_users_new_resource_is_created()
    {
        $suffix = Str::random();
        $data = [
            "name" => "Deneme kategorisi-" . $suffix,
            "slug" => "deneme-kategorisi-" . $suffix
        ];

        $response = $this->post('/categories', $data);
        $response->assertRedirect("/categories");
    }

    public function test_users_existing_user_is_updated(){
        $entity = Category::all()->last();
        $entity->name = 'UPDATED' . $entity->name;
        $entity->slug = 'UPDATED' . $entity->slug;
        $data = $entity->toArray();
        $response = $this->put('/categories/'.$entity->category_id,$data);
        $response->assertRedirect('/categories');
    }


    public function test_users_latest_user_is_deleted(){
        $entity = Category::all()->last();
        $id = $entity->category_id;
        $response = $this->delete('/categories/' . $id);
        $response->assertJson(["message" => "Done", "id" => $id]);
    }
}
