@extends('layouts.master')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit dish</h1>
            <a href="/dish" class="btn btn-default " >Back</a>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="card-body">
        @if($errors-> any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/dish/{{$dish->id}}" method="post" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            <div class="form-group">
                <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name',$dish->name)}}">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category"class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}" {{$cat -> id == $dish->category_id ? 'selected': ''}}>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Image</label><br>
                <img src="{{url('/images/'.$dish->image)}}" width="100" height="100" alt=""><br><br>
            <input type="file" name="dish_image" >
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>   
</div>
  <!-- /.content-wrapper -->

@endsection