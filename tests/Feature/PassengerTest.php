<?php

namespace Tests\Feature;

use App\Models\Passenger;
use Database\Seeders\PassengerSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PassengerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_passengers_and_there_are_no_records()
    {
        $response = $this->getJson('/api/passengers');

        $this->assertDatabaseCount('passengers', 0); 

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'success' => true,
                'data' => []
            ]);
    }

    public function test_get_all_passengers_and_if_there_are_records()
    {
        $this->seed(PassengerSeeder::class);

        $response = $this->getJson('/api/passengers');
        
        $passenger = Passenger::all();
        $this->assertModelExists($passenger[0]);

        $this->assertDatabaseCount('passengers', 10); 

        $response->assertStatus(200); 
    }

    public function test_find_passenger_by_id_and_there_is_no_record()
    {
        $response = $this->getJson("/api/passengers/1");

        $this->assertDatabaseCount('passengers', 0); 

        $response->assertExactJson([
            'success' => true,
            'data' => null
        ])->assertStatus(200); 
    }

    public function test_find_passenger_by_id_and_there_is_record()
    {
        $this->seed(PassengerSeeder::class);

        $passengers = Passenger::all();
        $passenger = $passengers[0];

        $response = $this->getJson("/api/passengers/{$passenger->id}");

        $this->assertModelExists($passenger);

        $this->assertDatabaseCount('passengers', 10); 

        $response->assertJson(fn (AssertableJson $json) => 
            $json->has('success')
                 ->has('data', fn($json) => 
                 $json->where('id', $passenger->id)
                      ->where('name', $passenger->name)
                      ->etc()
                 )
        )->assertStatus(200); 
    }

}
