<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Reaction, User, Ideas, Travel};
use App\Http\Requests\Reaction as ReactionRequest;

class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reactions = Reaction::all();
        $users = User::all();
        $ideas = Ideas::all();
        $travels = Travel::all();
        return view('reactions/index', compact('reactions', 'users', 'ideas', 'travels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $ideas = Ideas::all();
        $travels = Travel::all();
        return view('reactions/create', compact('users', 'ideas', 'travels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReactionRequest $reactionRequest)
    {
        Reaction::create($reactionRequest->all());
        return redirect()->back()->with('info', 'La reaction a bien été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reaction $reaction)
    {
        $user = $reaction->user;
        $idea = $reaction->idea;
        $travel = $reaction->travel;
        return view('reactions/show', compact('reaction', 'user', 'idea', 'travel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reaction $reaction)
    {
        $user = $reaction->user;
        $idea = $reaction->idea;
        $travel = $reaction->travel;
        return view('reactions/edit', compact('reaction', 'user', 'idea', 'travel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReactionRequest $reactionRequest, Reaction $reaction)
    {
        $reaction->update($reactionRequest->all());
        return redirect()->route('comments')->with('info', 'La réaction a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reaction $reaction)
    {
        $reaction->delete();
        return back()->with('info', 'La réaction a bien été supprimée');
    }
}
