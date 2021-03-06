<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Travel, Category, Reaction};
use App\Http\Requests\Travel as TravelRequest;
use Illuminate\Support\Facades\Auth;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = Travel::all();
        $categories = Category::all();
        return view('travels/index', compact('travels', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('travels/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelRequest $travelRequest)
    {
        Travel::create($travelRequest->all());
        $category = $travel->category;
        return redirect()->route('categories.show', $category->id)->with('info1', 'Le voyage de la catégorie ')->with('travelId', $travel->id)->with('category', $category->title)->with('info2', ' a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Travel $travel)
    {
        $user = Auth::user();
        $category = $travel->category;
        $reactionsByUsers = Reaction::select('reactions.id', 'note', 'comment', 'reactions.user_id', 'reactions.updated_at', 'ban', 'avatar', 'pseudo')->where('reactions.travel_id', $travel->id)->join('users', 'reactions.user_id', '=', 'users.id')->orderByDesc('reactions.created_at')->get();
        return view('travels/show', compact('user','travel', 'category', 'reactionsByUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Travel $travel)
    {
        $categories = Category::all();
        $category = $travel->category;
        return view('travels/edit', compact('travel', 'category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelRequest $travelRequest, Travel $travel)
    {
        $travel->update($travelRequest->all());
        $category = $travel->category;
        return redirect()->route('categories.show', $category->id)->with('info1', 'Le voyage de la catégorie ')->with('travelId', $travel->id)->with('category', $category->title)->with('info2', ' a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travel $travel)
    {
        $travel->delete();
        $category = $travel->category;
        return redirect()->route('categories.show', $category->id)->with('infoA', 'Le voyage de la catégorie ')->with('categoryTitle', $category->title)->with('infoB', ' a bien été supprimé');
    }
}
