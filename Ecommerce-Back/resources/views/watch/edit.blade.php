@extends('layout.master')

@section('content')
  <div class="mb-2">
    <a href="{{route('watch.index')}}" class="btn btn-secondary btn-sm">Back</a>
  </div>
  <table class="table table-striped">
  <form action="{{ route('watch.update', $watch->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group mb-2">
        <label for="">Select Category</label>
        <select name="category_id" id="category_id" class="form-control">
          @foreach($categories as $category)
            <option value="{{ $category->id }}"
              @if($category->id == $watch->category_id)
                selected
              @endif
            >{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mb-2">
        <label for="">Enter Name</label>
        <input type="text" name="name" class="form-control" value="{{ $watch->name }}">
      </div>
      <div class="form-group mb-2">
        <label for="">Enter Price</label>
        <input type="text" name="price" class="form-control" value="{{ $watch->price }}">
      </div>
      <div class="form-group mb-2">
        <label for="">Enter Image</label>
        <input type="file" name="image" class="form-control" value="{{ $watch->image }}">
        <img src="{{ asset('/images/'.$watch->image) }}" width="150px" class="img-thumbnail" alt="">
      </div>
      <div class="form-group mb-2">
        <label for="">Enter Description</label>
        <textarea name="description" id="" cols="" rows="" class="form-control" >{{ $watch->description }}</textarea>
      </div>
      <div class="mt-2">
        <input type="submit" value="Update" class="btn btn-primary btn-sm">
      </div>
    </form>
  </table>

@endsection