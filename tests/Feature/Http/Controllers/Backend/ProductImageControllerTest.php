<?php

namespace Http\Controllers\Backend;

use App\Models\ProductImage;
use App\Models\User;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductImageControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_page()
    {
        $response = $this->get('products/2/images');

        $response->assertStatus(200);
    }

    public function test_users_index_url_goes_correct_view()
    {
        $response = $this->get('products/2/images');
        $response->assertViewIs('Backend.images.index');
    }

    public function test_address_create_form_page_status()
    {
        $response = $this->get('products/2/images/create');
        $response->assertOk();
    }

    public function test_users_create_url_goes_correct_view()
    {
        $response = $this->get('products/2/images/create');
        $response->assertViewIs('Backend.images.insert_form');
    }

    public function test_users_new_resource_is_created()
    {
        $image = UploadedFile::fake()->image('product.jpg');
        $data = [
            "product_id" => 2,
            "image_url" => $image,
            "alt" => "Test alt alanı",
            "seq" => 222
        ];


        $response = $this->post('/products/2/images', $data);

        $response->assertRedirect("/products/2/images");

        Storage::disk('local')->assertExists("public/products/" . $image->hashName());
    }

    public function test_users_existing_user_is_updated(){
        $entity = ProductImage::all()->last();
        $entity->city = "EDITED: " . $entity->alt;

        $id = $entity->image_id;
        $data = $entity->toArray();

        $image = UploadedFile::fake()->image('product.jpg');
        $data["image_url"] = $image;

        $response = $this->put('/products/2/images/' . $id, $data);
        $response->assertRedirect("/products/2/images");
    }


    public function test_users_latest_user_is_deleted(){
        $entity = ProductImage::all()->last();
        $id = $entity->image_id;
        $response = $this->delete('/products/2/images/' . $id);
        $response->assertJson(["message" => "Done", "id" => $id]);
    }
}
