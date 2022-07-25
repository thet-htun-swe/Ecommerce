@extends('layout.master')

@section('content')
  <div class="mb-2">
    <a href="{{route('category.index')}}" class="btn btn-secondary btn-sm">Back</a>
  </div>
  <table class="table table-striped">
    <form action="{{ route('category.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="">Enter Category</label>
        <input type="text" id="name" name="name" class="form-control">
      </div>
      <div class="mt-2">
        <input type="submit" value="Create" class="btn btn-primary btn-sm">
      </div>
    </form>
  </table>

@endsection