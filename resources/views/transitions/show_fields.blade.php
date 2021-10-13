<!-- Name Field -->
<div class="form-group">
    {!! Form::label('status_from', 'Status from:') !!}
    <p>{{ $transition->status_from_name }}</p>
</div>


<!-- Value Field -->
<div class="form-group">
    {!! Form::label('status_to', 'Status to:') !!}
    <p>{{ $transition->status_to_name }}</p>
</div>


