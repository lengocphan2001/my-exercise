<?php

namespace App\Services\Admin;

use App\Http\Requests\Department\CreateDepartmentRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DepartmentService
{
    public function getAll(){
        return Department::select('id', 'name')->get();
    }


    public function create(CreateDepartmentRequest $request){
        $request->validated();
        $department = Department::create([
            'name' => $request->get('name')
        ]);
        return $department;
    }
    public function find($id){
        return Department::find($id);
    }
    public function update(UpdateDepartmentRequest $request, $id){
        $department = $this->find($id);
        $request->validated();
        $department->name = $request->get('name');
        $department->save();
    }

    public function delete($id){
        $department = $this->find($id);
        $department->delete();
    }
}

