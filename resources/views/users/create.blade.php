@extends('layouts.app')

@section('content')
    <a href="{{ route('admin.user.index') }}">
        <button type="submit" class="btn btn-primary">Quay lại</button>
    </a>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Tạo mới</h1>
            <div>
                <form method="POST" action="{{ route('admin.user.store') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email"/>
                    </div>
                    @if ($errors->has('email'))
                        <strong class="h6 text-danger">{{ $errors->first('email') }}</strong>
                    @endif
                    <div class="form-group mb-2">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password"/>
                    </div>
                    @if ($errors->has('password'))
                        <strong class="h6 text-danger">{{ $errors->first('password') }}</strong>
                    @endif
                    <div class="form-group mb-2">
                        <label for="password_confirmation">Enter repassword:</label>
                        <input type="password" class="form-control" name="password_confirmation"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
                </form>
            </div>
        </div>
    </div>
@endsection
