@extends('layouts.admin')
@section('content')
<a href="{{ route('be.category.create') }}" class="btn btn-success"><i
    class="material-icons">&#xE147;</i> <span>Thêm loại sản phẩm</span></a>
    
   {{ $categories->count() }}
      
@endsection
