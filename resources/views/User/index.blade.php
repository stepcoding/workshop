@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header">
                <h1>ระบบจัดการผู้ใช้งาน</h1>
            </div>

        </div>
        <div class="col-md-4">
            <a href="{{ url('admin/user/create')}}" class="btn btn-success  btn-md" role="button">เพิ่มผู้ใช้งานใหม่</a>
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
                        <th scope="col">จำนวน</th>
                        <th scope="col">หน่วย</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->roles->first()->name}}</td>
                        @if($item->id != 1)
                        <td>
                            <div class="row">
                                <div class="col-md-2 ">
                                    <a href="{{ url('admin/user/'.$item->id.'/edit')}}" class="btn btn-warning  btn-md" role="button">แก้ไข</a>
                                </div>
                                <div class="col-md-2 offset-1">
                                    <form action="{{ route('user.destroy', $item->id)}}" method="post">
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
