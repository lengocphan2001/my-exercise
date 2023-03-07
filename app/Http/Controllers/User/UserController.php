<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view('users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    public function make(){
        return view('users.changepassword');
    }

    public function change(UpdatePasswordRequest $request){
        $this->userService->changePassword($request);
        return redirect()->route('user.index')->with('success', 'Thay đổi mật khẩu thành công.');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterFormRequest $request)
    {
        $this->userService->create($request);
        return redirect()->route('admin.user.index')->with('success', 'Thêm mới nhân viên thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = $this->userService->find($id);
        return view('users.update')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->route('admin.user.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->delete($id);
        return redirect()->route('admin.user.index')->with('success', 'Xóa thành công!');
    }
}
