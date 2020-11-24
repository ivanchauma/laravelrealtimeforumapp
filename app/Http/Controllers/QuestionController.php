<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }
    public function index(Question $question)
    {
        //Isso ai abaixo foi buscar no model, a relacao hasMany
        //return $question->replies;
        return Question::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       /* $question = new Question;
        $question->title = $request->title;
        $question->slug = $request->slug;
        $question->user_id = $request->user_id;
        $question->body = $request->body;
        $question->category_id = $request->category_id;
        $question->save(); */

        Question::create($request->all());
        //You have user_id in here,must be authenticated, this way use
        //auth()->user()->question()->create($request->all());
        return response()->json("Saved ok", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
       return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
        $question->update($request->all());
        return request()->json('Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        $question->delete();
        return response()->json("Deleted", 204);
    }
}
