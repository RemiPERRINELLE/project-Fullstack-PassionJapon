<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Reaction, Ideas, Travel, Category};
use App\Http\Requests\Users as UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user/index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user/show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $usersRequest, User $user)
    {
        //return redirect()->route('profile')->with('info', 'route prise');
        $avatar = $usersRequest->avatar;
        $avatarName = $avatar->getClientOriginalName();
        if( file_exists('uploads/users/' . $user->id . '/' . $avatarName) ) {
            return back()->with('image-error', "Ce nom d'image existe déjà");
        } else {
            $avatar->move('uploads/users/' . $user->id, $avatarName);
            $user->update([
                'pseudo' => $usersRequest->pseudo,
                'avatar' => $avatarName,
                'name' => $usersRequest->name,
                'firstname' => $usersRequest->firstname,
                'sexe' => $usersRequest->sexe,
                'adress' => $usersRequest->adress,
                'postal_code' => $usersRequest->postal_code,
                'city' => $usersRequest->city,
                'country' => $usersRequest->country,
                'phone' => $usersRequest->phone,
            ]);
            return redirect()->route('profile')->with('info', 'Votre profil a bien été modifié');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword(User $user)
    {
        return view('user/editPassword', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(User $user)
    {
        return redirect()->route('profile')->with('info', 'route prise');
        // $user->update([
        //     'password' => Hash::make($user->password),
        // ]);
        // return redirect()->route('profile')->with('info', 'Votre mot de passe a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('info', 'Votre profil a bien été supprimé');
    }

    
    /**
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user =  Auth::user();
        return view('user/profile', compact('user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function comments()
    {
        $reactions = Reaction::where('reactions.user_id', Auth::user()->id)->get();
        $ideas = Reaction::where('reactions.user_id', Auth::user()->id)->join('ideas', 'reactions.idea_id', '=', 'ideas.id')->get();
        $travels = Reaction::where('reactions.user_id', Auth::user()->id)->join('travels', 'reactions.travel_id', '=', 'travels.id')->join('categories', 'travels.category_id', '=', 'categories.id')->get();
        return view('user/comments', compact('reactions', 'ideas', 'travels'));
    }

}
