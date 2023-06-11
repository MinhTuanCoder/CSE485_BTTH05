@extends('layouts.base')
@section('title', 'Delete category');
@section('main')
   
    <form action="" method="GET" class="narrow container text-center">
      <h1 class="text-white text-center rounded-3 mt-2 bg-warning" >Other recordings will be deleted if you delete these category</h1>
        <h1>Delete Category</h1>
        <p>Click confirm to delete the category: <em>{{ $id }}</em></p>
       
        <input type="submit" name="delete" value="Confirm" class="btn btn-primary">
        <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>
      </form>

@endsection