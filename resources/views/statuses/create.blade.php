@extends('layouts.app')
@section('title','Statuses')
@section('content')
    <section class="content-header">
        <h1>
            Status
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'statuses.store']) !!}

                        @include('statuses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
