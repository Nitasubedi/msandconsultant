<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function allTeam()
    {
        $teams = Team::all();
        foreach ($teams as $key => $team) {
            $team->image = asset($team->image) ?? '-';
            unset($team->created_at, $team->updated_at);
        }
        return response([
            'Success' => true,
            'data' => $teams
        ]);
    }
}
