@extends('layout.master')

@section('content')
  <div>
    <a href="{{ route('category.create') }}" class="btn btn-success btn-sm">Create</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
      <tr>
        <td>
          {{ $category->name }}
        </td>
        <td>
          <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
          <form action="{{ route('category.destroy', $category->id) }}" method="post" class="d-inline" onsubmit="return confirm('sure?')">
            @csrf 
            @method('DELETE')
            <input type="Submit" name="delete" class="btn btn-danger btn-sm" value="Delete" >
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

  {{ $categories->links() }}

@endsection