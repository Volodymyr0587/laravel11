<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiceGameController extends Controller
{
    public function index()
    {
        return view('dice-game.index');
    }

    public function roll(Request $request)
    {
        $diceRolls = [];
        for ($i = 0; $i < 5; $i++) {
            $diceRolls[] = rand(1, 6);
        }

        $score = $this->calculateScore($diceRolls);

        $diceImages = array_map(function ($roll) {
            return 'storage/dice/dice-six-faces-' . $roll . '.png';
        }, $diceRolls);

        return view('dice-game.index', [
            'diceRolls' => $diceRolls,
            'diceImages' => $diceImages,
            'score' => $score,
        ]);
    }

     private function calculateScore($diceRolls)
    {
        sort($diceRolls);
        $counts = array_count_values($diceRolls);
        $score = 0;

        // Check for special combinations first
        if ($diceRolls == [1, 2, 3, 4, 5]) {
            $score += 150;
        } elseif ($diceRolls == [2, 3, 4, 5, 6]) {
            $score += 250;
        } else {
            // Calculate score for other combinations
            foreach ($counts as $num => $count) {
                switch ($num) {
                    case 1:
                        if ($count == 1) $score += 10;
                        if ($count == 2) $score += 20;
                        if ($count == 3) $score += 100;
                        if ($count == 4) $score += 200;
                        if ($count == 5) $score += 1000;
                        break;
                    case 2:
                        if ($count == 3) $score += 20;
                        if ($count == 4) $score += 40;
                        if ($count == 5) $score += 200;
                        break;
                    case 3:
                        if ($count == 3) $score += 30;
                        if ($count == 4) $score += 60;
                        if ($count == 5) $score += 300;
                        break;
                    case 4:
                        if ($count == 3) $score += 40;
                        if ($count == 4) $score += 80;
                        if ($count == 5) $score += 400;
                        break;
                    case 5:
                        if ($count == 1) $score += 5;
                        if ($count == 2) $score += 10; // Adding this to ensure pairs of 5 are accounted for
                        if ($count == 3) $score += 50;
                        if ($count == 4) $score += 100;
                        if ($count == 5) $score += 500;
                        break;
                    case 6:
                        if ($count == 3) $score += 60;
                        if ($count == 4) $score += 120;
                        if ($count == 5) $score += 600;
                        break;
                }
            }
        }

        return $score;
    }

}
