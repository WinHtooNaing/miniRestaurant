@extends('layouts.master')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dish Panel</h1>
          <a href="/dish/create" class="btn btn-success ">Create</a>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    @if(session('message'))
    <div class="alert alert-success">
      {{session('message')}}
    </div>
    @endif
    <table id="myTable" class="display">
      <thead>
        <tr>
          <th>Dish Name</th>
          <th>Category Name</th>
          <th>Created</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($dishes as $dish)
        <tr>
          <td>{{$dish->name}}</td>
          <td>{{$dish->category->name}}</td>
          <td>{{$dish->created_at}}</td>
          <td>
            <div class="form-row">
              <a style="margin-right: 10px;" href="/dish/{{$dish->id}}/edit" class="btn btn-warning">Edit</a>
              <form action="/dish/{{$dish->id}}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
              </form>
            </div>

          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<!-- /.content-wrapper -->

@endsection