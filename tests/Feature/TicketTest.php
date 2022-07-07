<?php

namespace Tests\Feature;

use App\Models\Ticket;
use Database\Seeders\TicketSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_tickets_and_there_are_no_records()
    {
        $response = $this->getJson('/api/tickets');

        $this->assertDatabaseCount('tickets', 0); 

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'success' => true,
                'data' => []
            ]); 
    }

    public function test_get_all_tickets_and_if_there_are_records()
    {
        $this->seed(TicketSeeder::class);

        $response = $this->getJson('/api/tickets');
        
        $tickets = Ticket::all();
        $this->assertModelExists($tickets[0]);

        $this->assertDatabaseCount('tickets', 10); 

        $response->assertStatus(200);
    }

    public function test_find_ticket_by_id_and_there_is_no_record()
    {
        $response = $this->getJson("/api/tickets/1");

        $this->assertDatabaseCount('tickets', 0); 

        $response->assertExactJson([
            'success' => true,
            'data' => null
        ])->assertStatus(200);
    }

    public function test_find_ticket_by_id_and_there_is_record()
    {
        $this->seed(TicketSeeder::class);

        $tickets = Ticket::all();
        $ticket = $tickets[0];

        $response = $this->getJson("/api/tickets/{$ticket->id}");
        
        $this->assertModelExists($ticket);

        $this->assertDatabaseCount('tickets', 10);

        $response->assertJson(fn (AssertableJson $json) => 
            $json->has('success')
                 ->has('data', fn($json) => 
                 $json->where('id', $ticket->id)
                      ->where('origin_city', $ticket->origin_city)
                      ->etc()
                 )
        )->assertStatus(200);
    }

}
