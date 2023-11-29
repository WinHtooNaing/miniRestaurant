@extends('layouts.master')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Order Listing</h1>
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
          <th>Table Number</th>
          <th>status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{$order->dish->name}}</td>
          <td>{{$order->table_id}}</td>
          <td>{{$status[$order->status]}}</td>
          <td>
            <div>
              <a href="/order/{{$order->id}}/approve" class="btn btn-warning">Approve</a>
              <a href="/order/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a>
              <a href="/order/{{$order->id}}/ready" class="btn btn-success">Ready</a>
              
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