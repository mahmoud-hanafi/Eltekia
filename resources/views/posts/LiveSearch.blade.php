@extends('layouts.app')
@section('content')
    <h1 align="center"> Live Searching Using AJAX</h1>
    <hr>
    
    <div class="panel panel-default">
          <div class="panel-heading">
                <h3 class="panel-title">Search Post data</h3>
          </div>
          <div class="panel-body">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search post data.">
          </div>
          <div class="table-responsive">
                <h3 align="center"> Total data : <span id="total_records"></span></h3>
                <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Body</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
          </div>
    </div>
    
@endsection

<script>
    $(document).ready(function () {

    });
</script>