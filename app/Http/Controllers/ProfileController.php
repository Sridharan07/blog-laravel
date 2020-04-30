<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
Use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'about' => 'required'
            
        ]);

        $user = Auth::user();

        $slug = Str::slug($request->name); 

        $user->name =$request->name;
        $user->email = $request->email;
        $user->slug = $slug;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;

        if($request->input('password')){
            $user->password = bcrypt($request->password);
        }

        $user->save();
        $user->profile->save();

        if($request->hasFile('avatar'))
        {
            if ( file_exists($user->profile->avatar) ) unlink($user->profile->avatar);
            
            $avatar = $request->avatar;
            $new_avatar = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatar', $new_avatar);
            $user->profile->avatar = 'uploads/avatar/'.$new_avatar;
            $user->profile->save();
        }

        return redirect()->route('profile')->with('success', 'Profile Successfully Updated');
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
