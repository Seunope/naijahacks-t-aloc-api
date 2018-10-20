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
                <div class="panel panel-default">
                    <div class="panel-heading">Questions Details |  <a href="{{url('/home')}}">Home</a> |  <a href="{{url('/flagged')}}">Flagged</a>
                    <div align="right">@if(!is_null($votes) ){{$votes->up_vote}} up | {{$votes->down_vote}} down @else up | down @endif</div>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <strong>{{ucfirst($questionDetails->subject)}}</strong>
                        <p>{{$questionDetails->question}}</p>
                        <p>a) {{$questionDetails->option_a}}</p>
                        <p>b) {{$questionDetails->option_b}}</p>
                        <p>c) {{$questionDetails->option_c}}</p>
                        <p>d) {{$questionDetails->option_d}}</p>
                        <p><strong><i>Ans:</i></strong> {{$questionDetails->answer}}</p>
                         <hr>
                            <p>vote correctness:
                                <a href="{{url('/vote-up/'.$questionDetails->id)}}"> up</a> I
                                <a href="{{url('/vote-down/'.$questionDetails->id)}}">down</a> </p>
                            <a>Add Comment</a>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
