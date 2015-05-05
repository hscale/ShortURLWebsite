@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h2>URL shortner</h2>
            {!! Form::open()!!}
            {!! Form::text('url',null, ['placeholder'=>'Insert your URL here and press enter!',
            'class'=>'form-control'])!!}
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-default'])!!}
            </div>
            {!! Form::close() !!}
            @if($errors->any())
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
