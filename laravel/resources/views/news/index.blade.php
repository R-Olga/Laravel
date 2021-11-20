@extends('layouts.master')

@section('content')
    <div class="row" style="margin:10px">
        <a class="col-md-4 btn btn-primary" style="display:block" href="{{url('news/create')}}">Add News</a>
    </div>

        @foreach($news->reverse() as $n)
            <div>
                <h3 style="color:blue">{{$n->summary}}</h3>
                <p style="color:#0b69da">{{$n->short_descrition}}
                </p>
                {!! Form::model($n, array('route' => array('news.show', $n->$id))) !!}
                <span>{{$n->created_at}}</span>
                <a style="float: right"  href="{{url('news/'.$n->id)}}">Read more</a>
                {!! Form::close() !!}


                <hr>
        @endforeach
@endsection
