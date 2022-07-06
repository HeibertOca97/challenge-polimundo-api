<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PassengerController extends Controller
{
    public function index(){
        $passengers = Passenger::orderBy('id', 'desc')->get();

        return response([
            'success' => true,
            'data' => $passengers
        ], Response::HTTP_OK);
    }


    public function show($id){
        $passenger = Passenger::find($id);

        return response([
            'success' => true,
            'data' => $passenger
        ], Response::HTTP_OK);
    }
}
