
<!-- Value Field -->
<div class="form-group col-sm-12 {{ $errors->has('name') ? 'has-error' :'' }}">
    {!! Form::label('name', optional($status)->name) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('statuses.index') !!}" class="btn btn-default">Cancel</a>
</div>
