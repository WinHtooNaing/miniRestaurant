<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h3>Order Form</h3>


        </div>
    </div>
    @if(session('message'))
    <div class="alert alert-success">
      {{session('message')}}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">New Order</h4><br><br>
        
            <form action="{{route('order.submit')}}" method="post">
                @csrf
                <div class="row">
                    @foreach($dishes as $dish)
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{url('/images/'.$dish->image)}}" width="150" height="150" alt=""><br>
                                <h5 class="card-title">{{$dish->name}}</h5><br>
                                <input type="number" name="{{$dish->id}}">
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                <div class="form-group">
                    <select name="table" id="">
                        @foreach($tables as $table)
                            <option class="form-group" value="{{$table->id}}">{{$table->number}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Submit" class="btn btn-success"><br/>
            </form>
            </div>
    </div>






    <div class="card">
        <div class="card-body">
        <h4 class="card-title">New Order</h4><br><br>
    
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
              <a href="/order/{{$order->id}}/serve" class="btn btn-success">serve</a>
              
            </div>

          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

    </div>
    </div>








    <script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</body>

</html>