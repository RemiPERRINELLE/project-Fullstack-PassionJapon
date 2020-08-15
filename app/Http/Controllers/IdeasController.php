<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Ideas, Reaction, Media, User};
use App\Http\Requests\Ideas as IdeasRequest;

class IdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Ideas::all();
        return view('ideas/index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medias = Media::all();
        return view('ideas/create', compact('medias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdeasRequest $ideasRequest)
    {
        $idea = Ideas::create($ideasRequest->all());
        $idea->media()->attach($ideasRequest->medias);
        return redirect()->route('ideas.index')->with('info', 'L\'idée a bien été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ideas $idea)
    {
        $reactionsByUsers = Reaction::select('reactions.id', 'note', 'comment', 'reactions.user_id', 'reactions.created_at', 'ban', 'avatar', 'pseudo')->join('users', 'reactions.user_id', '=', 'users.id')->where('reactions.idea_id', $idea->id)->orderByDesc('reactions.created_at')->get();
        $idea->with('media')->get();
        return view('ideas/show', compact('idea', 'reactionsByUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ideas $idea)
    {
        $medias = Media::all();
        return view('ideas/edit', compact('idea', 'medias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IdeasRequest $ideasRequest, Ideas $idea)
    {
        $idea->update($ideasRequest->all());
        $idea->media()->sync($ideasRequest->medias);
        return redirect()->route('ideas.index')->with('info', 'L\'idée a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ideas $idea)
    {
        $idea->delete();
        return redirect()->route('ideas.index')->with('info', 'L\'idée a bien été supprimée');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $idea = Ideas::find(1);
        $idea->with('media')->get();
        return view('home', compact('idea'));
    }

}


