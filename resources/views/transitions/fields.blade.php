<div class="col-sm-12">
    <div class="row">
        <!-- Status from Field -->
        <div class="form-group col-sm-6 {{ $errors->has('status_from_id') ? 'has-error' :'' }}">
            <label for="status_from">Status from:</label>
            <select class="form-control select2" id="status_from"
                    name="status_from_id">
                @foreach($statuses as $status)
                    @if($status)
                        <option value="{{$status->id}}" {!! $status->id == (old('status_from_id') ?? $transition->status_from_id) ? 'selected' : '' !!}>{{$status->name}}</option>
                    @else
                        <option value="{{ null }}" {!! null == old('status_from_id') ? 'selected' : '' !!}></option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <!-- Status to Field -->
        <div class="form-group col-sm-6 {{ $errors->has('status_to_id') ? 'has-error' :'' }}">
            <label for="status_to">Status to:</label>
            <select class="form-control select2" id="status_to"
                    name="status_to_id">
                @foreach($statuses as $status)
                    @if($status)
                        <option value="{{$status->id}}" {!! $status->id == (old('status_to_id') ?? $transition->status_to_id) ? 'selected' : '' !!}>{{$status->name}}</option>
                    @else
                        <option value="{{ null }}" {!! null == old('status_to_id') ? 'selected' : '' !!}></option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transitions.index') !!}" class="btn btn-default">Cancel</a>
</div>
