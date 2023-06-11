@extends('layouts.base')
@section('title', $title);
@section('main')
{{-- Nếu là giao diện thêm  --}}
@if ($title == "Add new category")
<h2 class="text-center text-upercase pt-5">Add new category</h2>
<form class="container p-5" method="GET" action="{{ route('category.store') }}">
  <div class="mb-3">
    <label class="form-label">ID</label>
    <input type="text" class="form-control" readonly>
    <div class="form-text">You don't have to add ID</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Category type</label>
    <input type="text" class="form-control" name="name_category">
  </div>
  <button type="submit" name="action" value="create" class="btn btn-primary">ADD</button>
</form>
@else 
{{-- Nếu là giao diện chỉnh sửa --}}
<h2 class="text-center text-upercase">Edit category</h2>
<form class="container p-5" method="HEAD" action="{{ route('category.store') }}">
  <div class="mb-3">
    <label class="form-label">ID</label>
    <input type="text" class="form-control" name="id_category" readonly value="{{ $category->ma_tloai }}">
    <div class="form-text">You don't have to edit ID</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Category type</label>
    <input type="text" class="form-control" name="name_category" value='{{$category->ten_tloai}}'>
  </div>
  <button type="submit" class="btn btn-primary" name="action" value="update">SAVE</button>
</form>
@endif




@endsection