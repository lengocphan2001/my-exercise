@extends('layouts.app')

@section('content')
    <a href="{{ route('admin.department.index') }}">
        <button type="submit" class="btn btn-primary">Quay lại</button>
    </a>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Cập nhật thông tin</h1>
            <div>
                <form method="post" action="{{ route('admin.department.update', $department->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Tên phòng ban</label>
                        <input type="text" class="form-control" name="name" value="{{$department->name}}"/>
                    </div>
                    @if ($errors->has('name'))
                        <strong class="h6 text-danger">{{ $errors->first('name') }}</strong>
                    @endif
                    <button type="submit" class="btn btn-primary">Cập nhật thông tin phòng ban</button>
                </form>
            </div>
        </div>
    </div>
@endsection
