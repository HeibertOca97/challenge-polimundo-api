<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::orderBy('id', 'desc')->get();

        return response([
            'success' => true,
            'data' => $tickets
        ], Response::HTTP_OK);
    }

    public function show($id){
        $ticket = Ticket::find($id);

        return response([
            'success' => true,
            'data' => $ticket
        ], Response::HTTP_OK);
    }
}
