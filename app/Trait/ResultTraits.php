<?php

namespace App\Trait;

use App\Models\Item;
use App\Models\Question;

trait ResultTraits
{

    public function result($q, $a)
    {
        $quiz = Question::where('quiz_id', $q)->get();
        $item = Item::where('answer_id', $a)->get();
        $count = 0;
        foreach ($quiz as $value) {
            foreach ($item as $items) {
                if ($value->id == $items->ques_id && $value->answer == $items->answer) {
                    $count++;
                }
            }
        }
        return $count * 5;
    }
}
