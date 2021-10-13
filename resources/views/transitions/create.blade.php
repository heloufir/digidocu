@extends('layouts.app')
@section('title','Transitions')
@section('content')
    <section class="content-header">
        <h1>
            Transition
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'transitions.store']) !!}

                        @include('transitions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
