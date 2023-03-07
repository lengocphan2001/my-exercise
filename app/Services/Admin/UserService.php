<?php

namespace App\Services\Admin;

use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAll(){
        return User::select('id', 'email', 'name', 'is_admin')->get();
    }


    public function create(RegisterFormRequest $request){
        $request->validated();
        $user = User::create([
            'name' => "Your name",
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        return $user;
    }
    public function find($id){
        return User::find($id);
    }
    public function update(UpdateUserRequest $request, $id){
        $user = $this->find($id);
        $request->validated();
        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->save();
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
    }

    public function changePassword(UpdatePasswordRequest $request){
        $request->validated();
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password),
            'is_first_login' => 0
        ]);
    }
}
