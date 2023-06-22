<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    public function generateSchedule()
{
    $groupA = [
        'Team A1',
        'Team A2',
        'Team A3',
        'Team A4',
        'Team A5',
        'Team A6',
        // Add more teams to group A
    ];

    $groupB = [
        'Team B1',
        'Team B2',
        'Team B3',
        'Team B4',
        'Team B5',
        'Team B6',
        'Team B7',
        // Add more teams to group B
    ];

    $teams = array_merge($groupA, $groupB);
    shuffle($teams);

    $leagueMatches = [];
    foreach ($teams as $index1 => $team1) {
        foreach ($teams as $index2 => $team2) {
            if ($index2 > $index1) {
                $winner = $team1;
                if (rand(0, 1)) {
                    $winner = $team2;
                }
                $leagueMatches[] = [
                    'team1' => $team1,
                    'team2' => $team2,
                    'winner' => $winner,
                ];
            }
        }
    }

    $quarterFinalists = array_slice($teams, 0, 8);
    $semiFinalists = array_slice($quarterFinalists, 0, 4);
    $finalists = array_slice($semiFinalists, 0, 2);
    $champion = $finalists[array_rand($finalists)];

    $tournamentResults = [];
    foreach ($quarterFinalists as $index => $team) {
        if ($index % 2 == 0) {
            $team1 = $team;
            $team2 = $quarterFinalists[$index + 1];
        } else {
            $team1 = $quarterFinalists[$index - 1];
            $team2 = $team;
        }

        $tournamentResults[] = [
            'stage' => 'Quarter-Final',
            'team1' => $team1,
            'team2' => $team2,
            'winner' => '', // Placeholder for winner
        ];
    }
    foreach ($semiFinalists as $index => $team) {
        if ($index % 2 == 0) {
            $team1 = $team;
            $team2 = $semiFinalists[$index + 1];
        } else {
            $team1 = $semiFinalists[$index - 1];
            $team2 = $team;
        }

        $tournamentResults[] = [
            'stage' => 'Semi-Final',
            'team1' => $team1,
            'team2' => $team2,
            'winner' => '', // Placeholder for winner
        ];
    }

    $tournamentResults[] = [
        'stage' => 'Final',
        'team1' => $finalists[0],
        'team2' => $finalists[1],
        'winner' => $champion,
    ];

    // Update the winners of quarter-finals and semi-finals
    foreach ($tournamentResults as $index => $result) {
        if ($result['stage'] === 'Quarter-Final' || $result['stage'] === 'Semi-Final') {
            $winner = $result['team1']; // Assume team1 is the winner by default
            if (rand(0, 1)) {
                $winner = $result['team2']; // Randomly choose team2 as the winner
            }
            $tournamentResults[$index]['winner'] = $winner;
        }
    }

    return view('schedule', [
        'groupA' => $groupA,
        'groupB' => $groupB,
        'leagueMatches' => $leagueMatches,
        'tournamentResults' => $tournamentResults,
    ]);
}
}
