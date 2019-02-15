@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header">
                <h1>จัดการสิทธิ์</h1>
            </div>

        </div>

        <div class="col-md-4">
            <a href="{{ url('admin/role/create')}}" class="btn btn-success  btn-md" role="button">เพิ่มสิทธิ์ใหม่</a>
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">

                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">รายการ</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role as $item)
                    <tr>
                        <th scope="row"> {{$item->id}}</th>
                        <td> {{$item->name}}</td>
                        @if($item->id != 1)

                        <td>
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{ url('admin/role/'.$item->id.'/edit')}}" class="btn btn-warning  btn-md" role="button">แก้ไข</a>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('role.destroy', $item->id)}}" method="post">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-md " type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        @endif
                    </tr>
                    <tr>
                        @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
