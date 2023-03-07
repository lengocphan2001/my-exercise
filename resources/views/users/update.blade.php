@extends('layouts.app')

@section('content')
    <a href="{{ route('admin.user.index') }}">
        <button type="submit" class="btn btn-primary">Quay lại</button>
    </a>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Cập nhật thông tin</h1>
            <div>
                <form method="post" action="{{ route('admin.user.update', $user->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-2">
                        <label for="stock_name">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                    </div>
                    @if ($errors->has('name'))
                        <strong class="h6 text-danger">{{ $errors->first('name') }}</strong>
                    @endif
                    <div class="form-group mb-2">
                        <label for="stock_name">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}"/>
                    </div>
                    @if ($errors->has('email'))
                        <strong class="h6 text-danger">{{ $errors->first('email') }}</strong>
                    @endif
                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                </form>
            </div>
        </div>
    </div>
@endsection
