<?php
/**
 * Created by PhpStorm.
 * User: Gathem
 * Date: 10/19/2018
 * Time: 7:27 PM
 */ ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Questions Details |  <a href="{{url('/home')}}"><span class="label label-default">Home</span></a> |  <a href="{{url('/flagged')}}"><span class="label label-info">Flagged</span></a>
                    <div align="right">@if(!is_null($votes) ){{$votes->up_vote}} up | {{$votes->down_vote}} down @else up | down @endif</div>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <strong>{!! ucfirst($questionDetails->subject) !!}</strong>
                        <p>{!! $questionDetails->question !!}</p>
                        <p>a) {!! $questionDetails->option_a !!}</p>
                        <p>b) {!! $questionDetails->option_b !!}</p>
                        <p>c) {!! $questionDetails->option_c !!}</p>
                        <p>d) {!! $questionDetails->option_d !!}</p>
                        <p><strong><i>Ans:</i></strong> {!! $questionDetails->answer !!}</p>
                         <hr>
                            <p>vote correctness:
                                <a href="{{url('/vote-up/'.$questionDetails->id)}}"> up</a> I
                                <a href="{{url('/vote-down/'.$questionDetails->id)}}">down</a> </p>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add Comment</button>
 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a comment</h4>
        </div>
        <div class="modal-body">
        <form role="form">
        <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="comment">Comment:</label>
    <textarea class="form-control" rows="5" id="comment"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                            <!-- //Modal -->
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
