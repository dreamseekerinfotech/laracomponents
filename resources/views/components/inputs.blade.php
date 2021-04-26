<div class="form-group">
    <label for="{{ $for }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $for }}" placeholder="{{ $placeholder }}">
    {{$slot}}
</div>