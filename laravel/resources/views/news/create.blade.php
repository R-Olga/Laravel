@extends('layouts.master')

@section('content')

    @if(count(session('errors')) > 0)
        <div class="alert alert-danger">
            @foreach(session('errors')->all() as $err)
                {{$err}} <br>
            @endforeach
        </div>
    @endif

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    {{Form::model($news, array('action' => 'NewsController@store', 'class'=>'form', 'style'=>'color:blue'))}}
        <div class="form-group">
            {!! Form::label('summary', 'Header:', array('class'=>'col-md-2', 'style'=>'margin:5px 0')) !!}
            {!! Form::text('summary', '', array('class'=>'col-md-10', 'style'=>'margin:5px 0')) !!}
        </div>

    <div class="form-group">
        {!! Form::label('short_descrition', 'Short Text:', array('class'=>'col-md-2', 'style'=>'margin:5px 0')) !!}
        {!! Form::text('short_descrition', '', array('class'=>'col-md-10', 'style'=>'margin:5px 0')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('full_text', 'Article:', array('class'=>'col-md-2', 'style'=>'margin:5px 0')) !!}
        {!! Form::textarea('full_text', '', array('class'=>'col-md-10', 'style'=>'margin:5px 0', 'cols'=>'', 'roes'=>'')) !!}
    </div>

    <button class="col-md-12 btn btn-primary" style="margin: 10px 0">Add</button>
    {!! Form::close() !!}

    <div class="row">
        <a style="margin:20px; float:right; font-weight:bold; color:blue" href="{{url('news')}}">Back to main page</a>
    </div>
@endsection
