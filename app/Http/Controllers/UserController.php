<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Reaction, Ideas, Travel, Category, Sale};
use App\Http\Requests\Users as UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



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
            $user->update([
                'pseudo' => $usersRequest->pseudo,
                'name' => $usersRequest->name,
                'firstname' => $usersRequest->firstname,
                'sexe' => $usersRequest->sexe,
                'adress' => $usersRequest->adress,
                'postal_code' => $usersRequest->postal_code,
                'city' => $usersRequest->city,
                'country' => $usersRequest->country,
                'phone' => $usersRequest->phone,
            ]);
    
            if( $usersRequest->avatar ) {
                $avatar = $usersRequest->avatar;
                $avatarName = $avatar->getClientOriginalName();
                
                if( file_exists('uploads/users/' . $user->id . '/' . $avatarName) ) {
                    return back()->with('image-error', "Ce nom d'image existe déjà");
                } else {
                    $avatar->move('uploads/users/' . $user->id, $avatarName);
                    $user->update([
                        'avatar' => $avatarName
                    ]);
                }
            }
    
            return redirect()->route('profile')->with('info', 'Votre profil a bien été modifié');        
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
    public function updatePassword(Request $request, User $user)
    {

//         if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
//             // The passwords matches
//             return redirect()->back()->with("currentPassword-error","Your current password does not matches with the password you provided. Please try again.");
//         }

//         if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
//             //Current password and new password are same
//             return redirect()->back()->with("newPassword-error","New Password cannot be same as your current password. Please choose a different password.");
//         }

//         $validatedData = $request->validate([
//             'current-password' => 'required',
//             'new-password' => 'required|string|min:6|confirmed',
//         ]);
// dd('ok');
//         //Change Password
//         $user = Auth::user();
//         $user->password = bcrypt($request->get('new-password'));
//         $user->save();

//         return redirect()->back()->with("success","Password changed successfully !");


        if (!(Hash::check($request->currentPassword, Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("currentPassword-error","Votre mot de passe actuel ne correspond pas.");
        }

        if(strcmp($request->currentPassword, $request->newPassword) == 0){
            //Current password and new password are same
            return redirect()->back()->with("newPassword-error","Le nouveau mot de passe ne peut être identique à l'ancien.");
        }

        $validatedData = $request->validate([
            'newPassword' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user->update([
            'password' => bcrypt($request->newPassword)
        ]);

        return redirect()->route('profile')->with('info', 'Votre mot de passe a bien été modifié');
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
        $user =  Auth::user();
        $reactions = Reaction::where('reactions.user_id', Auth::user()->id)->get();
        $ideas = Reaction::where('reactions.user_id', Auth::user()->id)->join('ideas', 'reactions.idea_id', '=', 'ideas.id')->get();
        $travels = Reaction::select('travels.id', 'date_start', 'title')->where('reactions.user_id', Auth::user()->id)->join('travels', 'reactions.travel_id', '=', 'travels.id')->join('categories', 'travels.category_id', '=', 'categories.id')->get();
        return view('user/comments', compact('user','reactions', 'ideas', 'travels'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function commands()
    {
        $user =  Auth::user();
        $sales = Sale::where('sales.user_id', Auth::user()->id)->orderByDesc('sales.created_at')->get();
        $travels = Sale::select('travels.id', 'title', 'price', 'date_start')->where('sales.user_id', Auth::user()->id)->join('travels', 'sales.travel_id', '=', 'travels.id')->join('categories', 'travels.category_id', '=', 'categories.id')->get();
        return view('user/commands', compact('user','sales', 'travels'));
    }

}
