@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('แก้ไขหมวดหมู่ครุภัณฑ์') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('category.update', $Category->id) }}" enctype="multipart/form-data">
                        @csrf {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อรายการ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $Category->name }}"
                                    required autofocus> @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('รายละเอียด') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('	description') ? ' is-invalid' : '' }}" name="description" value="{{ $Category->description }}"
                                    required> @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit_name" class="col-md-4 col-form-label text-md-right">{{ __('หน่วย') }}</label>

                            <div class="col-md-6">
                                <input id="unit_name" type="text" class="form-control" name="unit_name" value="{{ $Category->unit_name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('สถานะ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="active">
                                         <option value="1">เปิดใช้งาน</option>
                                          <option value="2">ปิดใช้งาน</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('รูป') }}</label>
                            <div class="col-md-6">
                              <img src="{{url('images')}}{{'/'}}{{$Category->picture_path}}" alt="" width="100px" height="100px">
                                <input type="file" name="picture_path" class="form-control" accept="image/x-png,image/gif,image/jpeg" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('อัพเดท') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
