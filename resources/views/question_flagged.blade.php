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
                    <div class="panel-heading">  <strong>Flagged Question  </strong> |  <a href="{{url('/home')}}">Home</a></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                    {{ $flaggedQuestion->links() }}
                    @if(!$flaggedQuestion->isEmpty())
                        @foreach($flaggedQuestion as $question)
                            <div class="panel-body">
                                <p><strong>{{ucfirst($question->subject)}} :</strong> {{$question->question}}</p>
                                <a href="{{url('/flagged/'.$question->id)}}">Vote (0)</a> ||
                                <a href="{{url('/flagged/'.$question->id)}}"> comment(o)</a>
                                <p> {{timeAgo($question->created_at)}}</p>
                            </div>

                            <hr>
                        @endforeach
                    @endif
                    {{ $flaggedQuestion->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
