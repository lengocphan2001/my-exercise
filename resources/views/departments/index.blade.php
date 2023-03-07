@extends('layouts.app')
@section('content')
    @if (auth()->user()->is_admin)
        <a href="{{ route('admin.department.create') }}">
            <button type="button" class="btn btn-success mb-2">Thêm mới phòng ban</button>
        </a>
    @endif
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table align-center mb-0 bg-white table-hover table-responsive">
        <thead class="table-dark">
        <tr>
            <th>
                <div class="d-flex align-items-center">
                    @if(auth()->user()->is_admin)
                        <input class="form-check-input" type="checkbox" value="">
                    @endif
                    <div class="ms-3">
                        <p class="fw-bold mb-1"> Id </p>
                    </div>
                </div>
            </th>
            <th>Tên phòng ban</th>
            @if (auth()->user()->is_admin)
                <th>Actions</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @csrf
        @if ($departments)
            @foreach ($departments as $item)
                <tr>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            @if(auth()->user()->is_admin)
                                <input class="form-check-input" type="checkbox" value="">
                            @endif
                            <div class="ms-3">
                                <p class="fw-bold mb-1"> {{ $item->id }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <p class="fw-normal mb-1">{{ $item->name }}</p>
                    </td>
                    @if (auth()->user()->is_admin)
                        <td class="align-middle">
                            <a href="{{ route('admin.department.edit', $item->id) }}"
                               class="btn btn-success" type="button"
                               data-toggle="tooltip" data-placement="top" title="Edit">Edit
                            </a>
                            <a href="{{ route('admin.department.destroy', $item->id) }}"
                               onclick="return confirm('Bạn chắc chắn xóa bản ghi này')"
                               class="btn btn-danger" type="button"
                               data-toggle="tooltip" data-placement="top" title="Delete">Delete</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
