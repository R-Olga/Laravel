@extends('layouts.master')

@section('content')
    <div class="container" style="text-align:center">
        <div class="row">
        <h1>{{$news->summary}}</h1>

        @if ($news->image != '')

            <img src="{{asset($news->image)}}" alt="{{$news->summary}}" height="250px">
        @endif

        <p style="color:#0b69da; text-align:justify">{{$news->full_text}}</p>
        </div>
        <div class="row text-right">
            {!! Form::model($news, array('route'=>array('news.update', $news->id))) !!}
            {{Form::hidden('_method', 'PUT')}}
            <a style="margin:20px; color:blue; font-weight:bold" href="{{url('news/'.$news->id.'/edit')}}">Edit news</a>
            <a style="margin:20px; color:blue; font-weight:bold" href="{{url('news')}}">Back to main page</a>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
