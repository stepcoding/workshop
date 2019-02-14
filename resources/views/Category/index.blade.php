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
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td> 
                    <td>แก้ไข ลบ</td>
                    </tr>
                    <tr>
                </tbody>
            </table>
           
        </div>
    </div>
</div>
@endsection


