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
            <div class="col-md-2">
            <div class="panel panel-warning">
                <p>&nbsp&nbsp Search By</p>
                <ul>
                    <li><a href="{{url('/search')}}">Question</a></li>
                    <li>Subject</li>
                    <li>Exam Type</li>
                    <li>Year</li>
                </ul>
            </div>
            </div>
            <div class="col-md-8 col-md-8">
                <div class="panel panel-warning">
                    <div class="panel-heading">  <strong>Flagged Question  </strong> |
                        <a href="{{url('/home')}}"><span class="label label-default">Home</span></a> |
                        <a href="{{url('/search')}}"><span class="label label-info">Search</span></a>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                    <center>{{ $flaggedQuestion->links() }}</center>
                    @if(!$flaggedQuestion->isEmpty())
                        @foreach($flaggedQuestion as $question)
                            <?php $vote =0; ?>
                            @if(!is_null($question->vote))
                               <?php $vote = $question->vote->up_vote + $question->vote->down_vote; ?>
                            @endif
                            <div class="panel-body">
                                <p><strong>{!! ucfirst($question->subject) !!} :</strong> {!! $question->question !!}</p>
                                <a href="{{url('/flagged/'.$question->id)}}">vote ({{$vote}})</a> ||
                                <a href="{{url('/flagged/'.$question->id)}}"> comment(o)</a>
                                <p> {{timeAgo($question->created_at)}}</p>
                            </div>

                            <hr>
                        @endforeach
                    @endif
                    <center>{{ $flaggedQuestion->links() }}</center>

                </div>
            </div>
            <div class="col-md-2">
            <div class="panel panel-warning">
                <p>&nbsp&nbsp Recently Flagged</p>
                <ul>
                    <li><a href="{{url('flagged/1')}}">What is the meaning of..</a> </li>
                    <li><a href="{{url('flagged/1')}}">When did Nigeria gained inde...</a> </li>
                    <li><a href="{{url('flagged/1')}}">How many apples</a> </li>
                    <li><a href="{{url('flagged/1')}}">Mixtures of two chemical..</a> </li>
                </ul>

                <p>&nbsp&nbsp Most Popular</p>
                <ul>
                    <li>Ajaa...</li>
                    <li>Money.. </li>
                    <li>Hope for Live</li>
                    <li>Year</li>
                </ul>
            </div>
            </div>
        </div>
    </div>
@endsection
