<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function likeit(Reply $reply)
    {
        //uses relationship on model
       $reply->like()->create([
           //'user_id' => auth()->id()
           'user_id' => 1
       ]);
    }

    public function unLikeIt(Reply $reply)
    {
        //
        //return Like::latest()->get();
        ///Leverages the relationship
        //$reply->like()->where(['user_id', auth()->id()])->first()->delete();
        $reply->like()->where('user_id', '1')->first()->delete();
    }


}
