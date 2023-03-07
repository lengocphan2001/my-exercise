@extends('layouts.app')
<link rel="stylesheet" href="../css/app.css">

@section('content')
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                            style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">John Doe</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">Software engineer</p>
                </td>
                <td>Senior</td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle" alt=""
                            style="width: 45px; height: 45px" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Alex Ray</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">Consultant</p>
                </td>
                <td>Junior</td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle" alt=""
                            style="width: 45px; height: 45px" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Kate Hunington</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">Designer</p>
                </td>
                <td>Senior</td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
<script src="../js/app.js"></script>
