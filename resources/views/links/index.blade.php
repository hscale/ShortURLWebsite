@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Articles</div>
                    @foreach($links as $link)
                        <div class="panel-body">Here is the short code for the given url {{$link->url}}
                            <h1><a href="{{$link->url}}" target="_blank">{{$link->hash}}</a></h1>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection