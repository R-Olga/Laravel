@extends('layouts.master')

@section('content')
    <div class="row" style="margin:10px">
        <a class="col-md-4 btn btn-primary" style="display:block" href="{{url('news/create')}}">Add News</a>
    </div>

        @foreach($news->reverse() as $n)
            <h3 style="color:blue">{{$n->summary}}</h3>
            <p style="color:#0b69da">{{$n->short_descrition}}
            </p>
            <p>{{$n->updated_at}}
                <a style="float:right; color:blue" href="">Read more</a>
            </p>
            <hr>
        @endforeach
@endsection
