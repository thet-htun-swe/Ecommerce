@extends('layout.master')

@section('content')
  <div class="mb-2">
    <a href="{{route('watch.index')}}" class="btn btn-secondary btn-sm">Back</a>
  </div>
  <table class="table table-striped">
    <form action="{{ route('watch.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-2">
        <label for="">Select Category</label>
        <select name="category_id" id="category_id" class="form-control">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mb-2">
        <label for="">Enter Name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group mb-2">
        <label for="">Enter Price</label>
        <input type="text" name="price" class="form-control">
      </div>
      <div class="form-group mb-2">
        <label for="">Enter Image</label>
        <input type="file" name="image" class="form-control">
      </div>
      <div class="form-group mb-2">
        <label for="">Enter Description</label>
        <textarea name="description" id="" cols="" rows="" class="form-control"></textarea>
      </div>
      <div class="mt-2">
        <input type="submit" value="Create" class="btn btn-primary btn-sm">
      </div>
    </form>
  </table>

@endsection