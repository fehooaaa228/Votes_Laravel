<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function showAll(){
        $votes = Vote::orderByDesc('id')->paginate(5);

        return view('index', ['votes' => $votes]);
    }

    public function create(Request $request){
        $vote = new Vote();
        $vote->title = $request->title;
        $vote->text = $request->text;
        $vote->negative = 0;
        $vote->positive = 0;
        $vote->save();

        return redirect('/');
    }

    public function showVote($id){
        $votes = Vote::all();
        return view('show_vote', ['vote' => $votes[$id - 1]]);
    }

    public function incPos($id){
        $vote = Vote::where('id', $id)->first();

        $vote->positive++;
        $vote->save();

        return back();
    }

    public function incNeg($id){
        $vote = Vote::where('id', $id)->first();

        $vote->negative++;
        $vote->save();

        return back();
    }
}
