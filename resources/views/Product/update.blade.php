@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('สร้างครุภัณฑ์ใหม่') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('product.update', $Product->id) }}" enctype="multipart/form-data">
                        @csrf {{ method_field('PATCH') }}


                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('หมวดหมู่คุรภัณฑ์') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="asset_category_id">
                                    @foreach ($Category as $item)
                                         <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('รหัสบาร์โค้ด') }}</label>

                            <div class="col-md-6">
                                <input id="barcode" type="text" class="form-control{{ $errors->has('sbarcode') ? ' is-invalid' : '' }}" name="barcode" value="{{$Product->barcode}}"
                                    required> @if ($errors->has('barcode'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('barcode') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cost_center_code" class="col-md-4 col-form-label text-md-right">{{ __('รหัสศูนย์ต้นทุน') }}</label>

                            <div class="col-md-6">
                                <input id="cost_center_code" type="text" class="form-control" name="cost_center_code" value="{{$Product->cost_center_code}}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="paper_description" class="col-md-4 col-form-label text-md-right">{{ __('เอกสารอ้างอิง') }}</label>

                            <div class="col-md-6">
                                <input id="paper_description" type="text" class="form-control" name="paper_description" value="{{$Product->paper_description}}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="asset_item_status_id" class="col-md-4 col-form-label text-md-right">{{ __('สถานะ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="asset_item_status_id">
                                         @foreach ($ItemStatus as $item)
                                         <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
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
