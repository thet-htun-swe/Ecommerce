@extends('layout.master')

@section('content')
  <div>
    <a href="{{ route('watch.create') }}" class="btn btn-success btn-sm">Create</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
    @foreach($watches as $watch)
      <tr>
        <td>
          <img src="{{ asset('/images/'.$watch->image) }}" width="120px" class="img-thumbnail" alt="">
        </td>
        <td>
          {{ $watch->name }}
        </td>
        <td>
          {{ $watch->price }}
        </td>
        <td>
          {{ $watch->description }}
        </td>
        <td>
          <a href="{{ route('watch.edit', $watch->id) }}" class="btn btn-primary btn-sm">Edit</a>
          <form action="{{ route('watch.destroy', $watch->id) }}" method="post" class="d-inline" onsubmit="return confirm('sure?')">
            @csrf 
            @method('DELETE')
            <input type="Submit" name="delete" class="btn btn-danger btn-sm" value="Delete" >
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

  {{ $watches->links() }}

@endsection