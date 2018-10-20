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
                    <div class="panel-heading">Questions Details |  <a href="{{url('/home')}}">Home</a> |  <a href="{{url('/flagged')}}">Flagged</a></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Question details goes here
                        {{$QuestionDetails->question}}
                        <p>a) {{$QuestionDetails->option_a}}</p>
                        <p>b) {{$QuestionDetails->option_b}}</p>
                        <p>c) {{$QuestionDetails->option_c}}</p>
                        <p>d) {{$QuestionDetails->option_d}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
