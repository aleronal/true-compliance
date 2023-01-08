<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    protected $property;


    public function setUp():void
    {
        parent::setUp();

        Artisan::call('db:seed', ['--class' => 'SqlFileSeeder']);

        $this->property = Property::first();

    }

    public function test_single_property_can_be_retrieved()
    {
        $response = $this->get('api/property/1');

        $response->assertStatus(200)
        ->assertJsonStructure(
            ['data' => [
                'id',
                'organisation',
                'property_type',
                'parent_property_id',
                'uprn',
                'address',
                'town',
                'postcode',
                'live'
                ]
            ]
        );
    }

    public function test_a_single_property_can_be_updated()
    {

        $payload = [
            'organisation' => 'updated',
            'property_type' => $this->property->property_type,
            'parent_property_id'=> $this->property->parent_property_id,
            'uprn'=> $this->property->uprn,
            'address'=> $this->property->address,
            'town'=> $this->property->town,
            'postcode'=> $this->property->postcode,
            'live'=> $this->property->live,
        ];
        $response = $this->put('/api/property/1',$payload);

        $this->assertDatabaseHas('properties',[
            'id'=> $this->property->id,
            'organisation' => 'updated'
        ]);

    }

    public function test_a_single_record_can_de_deleted()
    {
        $this->delete('/api/property/1');
        $this->assertDatabaseMissing('properties',[
            'id'=> $this->property->id,
        ]);


    }
}
