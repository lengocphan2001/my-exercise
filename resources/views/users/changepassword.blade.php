@extends('layouts.app')

@section('content')
    <a href="{{ route('user.index') }}">
        <button type="submit" class="btn btn-primary">Quay lại</button>
    </a>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Đổi mật khẩu</h1>
            <div>
                <form method="post" action="{{ route('user.change')}}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="password" >Mật khẩu mới</label>
                        <input type="password" class="form-control" name="password" autocomplete="password"/>
                    </div>
                    @if ($errors->has('password'))
                        <strong class="h6 text-danger">{{ $errors->first('password') }}</strong>
                    @endif
                    <div class="form-group mb-2">
                        <label for="password-confirm">Nhập lại</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
