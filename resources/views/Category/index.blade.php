@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header">
                <h1>จัดการหมวดหมู่ครุภัณฑ์</h1>
            </div>

        </div>
        <div class="col-md-4">
            <a href="{{ url('admin/category/create')}}" class="btn btn-success  btn-md" role="button">เพิ่มหมวดหมู่ครุภัณฑ์</a>
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
                        <th scope="col">หน่วย</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">รูป</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Category as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->unit_name}}</td>
                        <td>{{$item->description}}</td>
                        <td><img src="{{url('images')}}{{'/'}}{{$item->picture_path}}" alt="" width="100px" height="100px"></td>
                        @if ($item->active == 1)
                        <td>เปิดใช้งาน</td>
                        @else
                        <td>ปิดใช้งาน</td>
                        @endif
                        <td>
                            <div class="row">
                                <div class="col-md-2 ">
                                    <a href="{{ url('admin/category/'.$item->id.'/edit')}}" class="btn btn-warning  btn-md" role="button">แก้ไข</a>
                                </div>
                                <div class="col-md-2 offset-1">
                                    <form action="{{ route('category.destroy', $item->id)}}" method="post">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-md " type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
