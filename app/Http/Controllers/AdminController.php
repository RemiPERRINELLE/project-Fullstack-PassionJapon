<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Reaction, Articles, Ideas, Travel, Category};
use App\Http\Requests\Users as UsersRequest;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $articles = Articles::all();
        $ideas = Ideas::all();
        $categories = Category::all();
        return view('admin/dashboard', compact('articles', 'ideas', 'categories'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function moderation()
    {
        $users = User::all();
        return view('admin/moderation', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param $myonoff
     * @return \Illuminate\Http\Response
     */
    public function banUpdate(Request $request, User $user)
    {        
        $ban = 'myonoffswitch'.$user->id;
        $user->update([
            'ban' => $request->$ban,
        ]);
        if( $user->ban == 1 ) {
            return back()->with('info', 'L\'utilisateur '.$user->pseudo.' est désormais banni');
        } else {
            return back()->with('info', 'L\'utilisateur '.$user->pseudo.' n\'est plus banni');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
