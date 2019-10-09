@if ($errors->has($field))
<span class="invalid-feedback d-block">
        <span class="text-danger">{{ $errors->first($field) }}</span>
    </span>
@endif