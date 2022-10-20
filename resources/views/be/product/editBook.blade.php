@extends('layouts.admin')
@section('content')


  

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sửa Sản Phẩm</h5>

              <!-- General Form Elements -->
              <form action="{{route('be.product.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Loại sách</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="category_id" id="category_id" aria-label="Default select example">
                      @foreach ($cats as $cat)
                      <option 
                      @if($findUpdate->category_id == $cat->id)
                      selected 
                      
                      @endif
                      value="{{ $cat->id }}">{{ $cat->name }}</option>
                      @endforeach
                      {{-- <option value="1">Công nghệ thông tin</option>
                      <option  value="2">Kinh tế</option>
                      <option selected value="3">Manga</option> --}}
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Mã số</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" class="form-control" value="{{$findUpdate->id}}">
                    {{-- <input type="text" name="code" class="form-control" value="{{$findUpdate->code}}"> --}}

                    <input type="text" name="code" class="form-control" value="{{(old('code'))? old('code'):$findUpdate->code}}">

                    
                    @if ($errors->has('code'))
                      <span class="text-danger">{{ $errors->first('code') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Tên</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{$findUpdate->name}}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả </label>
                  <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" value="{{$findUpdate->description}}">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nội dung</label>
                    <div class="col-sm-10">
                      <textarea class="text" name="detail" style="height: 100px; width:100%;"  >{!!$findUpdate->detail!!}</textarea>
                    </div>
                  </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Giá</label>
                  <div class="col-sm-10">
                    <input type="number" name="real_price" class="form-control" value="{{$findUpdate->real_price}}">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Giá khuyến mại</label>
                    <div class="col-sm-10">
                      <input type="number" name="sale_price" class="form-control" value="{{$findUpdate->sale_price}}">
                    </div>
                  </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Chọn ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="feature_image" id="feature_image">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Sẵn trong kho</label>
                    <div class="col-sm-10">
                      <input type="number" name="feature_image" class="form-control" value="{{$findUpdate->inventory_number}}">
                    </div>
                  </div>
                {{-- <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control">
                  </div>
                </div> --}}

                
                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" >Cập nhật</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>


  @endsection