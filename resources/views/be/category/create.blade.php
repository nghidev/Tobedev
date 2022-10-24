@extends('layouts.admin')
@section('content')

    <section class="section">

      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm Loại sản phẩm</h5>

              <!-- General Form Elements -->
              <form action="{{route('be.category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Loại sách</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected="1">Công nghệ thông tin</option>
                      <option value="2">Kinh tế</option>
                      <option value="3">Manga</option>
                    </select>
                  </div>
                </div> --}}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
                  <div class="col-sm-10">
                    <input type="text" name="slug" id="cate-slug" class="form-control" value="{{old('code')}}">
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tên loại</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="cate-name" class="form-control" value="{{old('code')}}">
                    {{-- @if ($errors->has('code'))
                        <span class="text-danger">{{ $errors->first('code') }}</span>
                    @endif --}}
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Sắp xếp</label>
                  <div class="col-sm-10">
                    <input type="text" name="sort_order" class="form-control" value="{{$numMaxPlusOne}}">
                    {{-- @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif --}}
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Thêm loại sản phẩm</button>
                  </div>
                </div>
                {{-- <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả </label>
                  <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" value="">
                  </div>
                </div> --}}
                {{-- <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nội dung</label>
                    <div class="col-sm-10">
                      <textarea class="text " id="summernote" name="detail" style="height: 100px; width:100%;"></textarea>
                    </div>
                  </div> --}}
                {{-- <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Giá</label>
                  <div class="col-sm-10">
                    <input type="number" name="real_price" class="form-control" value="">
                  </div>
                </div> --}}
                {{-- <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Giá khuyến mại</label>
                    <div class="col-sm-10">
                      <input type="number" name="sale_price" class="form-control" value="">
                    </div>
                  </div> --}}
                {{-- <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Chọn ảnh</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="feature_image" id="feature_image">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Sẵn trong kho</label>
                    <div class="col-sm-10">
                      <input type="number" name="inventory_number" class="form-control" value="">
                    </div>
                  </div> --}}

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>


  @endsection

  @push('js')
    <script>
        $(document).ready(function() {
          
            $("#cate-name").keyup(function() {
                const slug = stringToSlug($(this).val());
                $("#cate-slug").val(slug);
            });

            function stringToSlug(str) {
              // remove accents
              var from = "àáãảạăằắẳẵặâầấẩẫậèéẻẽẹêềếểễệđùúủũụưừứửữựòóỏõọôồốổỗộơờớởỡợìíỉĩịäëïîöüûñçýỳỹỵỷ",
                  to   = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeduuuuuuuuuuuoooooooooooooooooiiiiiaeiiouuncyyyyy";
              for (var i=0, l=from.length ; i < l ; i++) {
                str = str.replace(RegExp(from[i], "gi"), to[i]);
              }

              str = str.toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\-]/g, '-')
                    .replace(/-+/g, '-');

              return str;
            }
          
/*
            $('#cate-name').keyup(function(e) {
              $.get('{{ route('be.category.slug.add') }}',
                { 'name': $(this).val() },
                function( data ) {
                  $('#cate-slug').val(data.slug);
                }
              );
            });
            */

        });
    </script>
   
  @endpush