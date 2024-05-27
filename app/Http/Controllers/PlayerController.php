<?php

namespace App\Http\Controllers;
use App\Models\Player;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function index() {
        $player = Player::orderBy('id')->get();
        return Inertia::render('Players', ['player' => $player]);
    }

    public function show(Player $player) {
        return inertia('View', ['player' => $player]);
    }

    public function create()
    {
        return inertia("Create");
    }
    

    public function store(Request $request) {
        $request->validate([
            'player_name' => 'required',
            'college' => 'required',
            'birthdate' => 'required',
            'position' => 'required',
            'draft_year' => 'required'

        ]);

        Player::create($request->all());

        return redirect('/players');
    }

    public function update(Request $request, Player $player) {
        $fields = $request->validate([
            'player_name' => 'required',
            'college' => 'required',
            'birthdate' => 'required',
            'position' => 'required',
            'draft_year' => 'required'

        ]);

        $player->update($fields);

        return redirect('/players');
    }

    public function destroy(Player $player){
        $player->delete();
        return redirect('/players');
    }
}
