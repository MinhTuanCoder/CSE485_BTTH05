@extends('layouts.base')
@section('title','Category page')
@section('main')
<!-- Table view data -->
<div class="container">
  
    <div class="row">
        <h1 class="text-white text-center rounded-3 mt-2  bg-primary">{{ session('success')}}</h1>
        <h1 class="text-white text-center rounded-3 mt-2 bg-danger" >{{ session('error') }}</h1>
        <h2 class="text col-10 ml-1">Category manager</h2>
        <a href="{{ route('category.add') }}" class="btn btn-success col-2 mb-4"><i class='bi bi-plus'></i> New Category</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name category</th>
                <th scope="col" class="text text-center">Action</th>
                @foreach($categories as $category)
            <tr>
                <td> {{ $category->ma_tloai }}</td>
                <td> {{ $category->ten_tloai }}</td>
                <td class='text-center'>
                    
                    <a class='mx-3' href='{{ route('category.edit',['id'=> $category->ma_tloai]) }}'><i
                            class='bi bi-pencil'></i></a>
                    <a class='' href='{{ route('category.delete',['id'=> $category->ma_tloai]) }}'><i
                            class='bi bi-trash3'></i></a>
                </td>
            </tr>
            @endforeach

            </tr>
        </thead>
        <tbody>

    </table>
</div>

@endsection