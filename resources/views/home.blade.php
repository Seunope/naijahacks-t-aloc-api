@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <a href="{{url('/load-questions')}}" ><button class="btn btn-primary btn-sm">Load Dummy Questions</button></a>
            </div>
        </div>
    </div>


<div class="row">
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
            <div class="panel-heading">Post A Question</div>
            <div class="panel-body">
             <form role="form" style="padding:15px;">
  <div class="form-group">
    <label for="text">Title:</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="body">Body:</label>
    <input type="text" class="form-control" id="body">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
            </div>
            </div>
</div
</div>
@endsection
