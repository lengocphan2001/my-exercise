<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\CreateDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use App\Services\Admin\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected DepartmentService $department;
    public function __construct(DepartmentService $departmentService)
    {
        $this->department = $departmentService;
    }

    public function index()
    {
        $departments = $this->department->getAll();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        //
        $this->department->create($request);
        return redirect()->route('admin.department.index')->with('success', 'Thêm phòng ban thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = $this->department->find($id);
        return view('departments.update')->with(['method'=>'get', 'department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $department = $this->department->find($id);
        return view('departments.update')->with(['method'=>'put', 'department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, string $id)
    {
        //
        $this->department->update($request, $id);
        return redirect()->route('admin.department.index')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->department->delete($id);
        return redirect()->route('admin.department.index')->with('success', 'Xóa thành công.');
    }
}
