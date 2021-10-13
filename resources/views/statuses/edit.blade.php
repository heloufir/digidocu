@extends('layouts.app')
@section('title','Edit Status')
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
                    {!! Form::model($status, ['route' => ['statuses.update', $status->id], 'method' => 'patch']) !!}

                    @include('statuses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
