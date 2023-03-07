@extends('layouts.app')
@section('content')
    <a href="{{ route('admin.department.index') }}">
        <button type="submit" class="btn btn-primary">Quay lại</button>
    </a>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Tạo mới</h1>
            <div>
                <form method="POST" action="{{ route('admin.department.store') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Tên phòng ban:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    @if ($errors->has('email'))
                        <strong class="h6 text-danger">{{ $errors->first('email') }}</strong>
                    @endif
                    <button type="submit" class="btn btn-primary">Thêm phòng ban</button>
                </form>
            </div>
        </div>
    </div>
@endsection
