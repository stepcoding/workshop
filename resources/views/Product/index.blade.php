@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header">
                <h1>จัดการครุภัณฑ์</h1>
            </div>

        </div>
        <div class="col-md-4">
            <a href="{{ url('admin/product/create')}}" class="btn btn-success  btn-md" role="button">เพิ่มครุภัณฑ์</a>
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
                        <th scope="col">หมวดหมู่</th>
                        <th scope="col">บาร์โค้ด</th>
                        <th scope="col">ศูนย์ต้นทุน</th>
                        <th scope="col">เอกสารอ้างอิง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Product as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->category->first()->name}}</td>
                        <td>{{$item->barcode}}</td>
                        <td>{{$item->cost_center_code}}</td>
                        <td>{{$item->paper_description}}</td>
                        <td>{{$item->ItemStatus->first()->name}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-2 ">
                                    <a href="{{ url('admin/product/'.$item->id.'/edit')}}" class="btn btn-warning  btn-md" role="button">แก้ไข</a>
                                </div>
                                <div class="col-md-2 offset-1">
                                    <form action="{{ route('product.destroy', $item->id)}}" method="post">
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
