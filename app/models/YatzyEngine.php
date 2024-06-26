<?php
namespace Yatzy;

class YatzyEngine {
    const SCORE_BONUS_THRESHOLD = 63;
    const SCORE_BONUS_VALUE = 50;

    public function calculateScoreForBox($diceValues, $scoreBox) {
        $score = 0;

        foreach ($diceValues as $value) {
            if ($value == $scoreBox) {
                $score += $value;
            }
        }

        return $score;
    }

    public function updateOverallScore($scoreCard) {
        $totalScore = array_sum($scoreCard);
        $bonus = 0;

        if ($totalScore >= self::SCORE_BONUS_THRESHOLD) {
            $bonus = self::SCORE_BONUS_VALUE;
        }

        return [
            'totalScore' => $totalScore,
            'bonus' => $bonus
        ];
    }
}
