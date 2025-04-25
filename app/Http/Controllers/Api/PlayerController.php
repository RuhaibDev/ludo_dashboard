<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Accept JSON {name, email, type}, save to DB,
     * and return JSON {name, email, uuid}.
     */
    public function store(Request $request)
    {
        // 1) Validate the incoming JSON
        $data = $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:players,email',
            'type'  => 'required|string|max:50',
        ]);

        // 2) Create a new Player. UUID is set automatically in the model.
        $player = Player::create($data);

        // 3) Return only the fields we want
        return response()->json([
            'name'  => $player->name,
            'email' => $player->email,
            'uuid'  => $player->uuid,
        ], 201);
    }
}
