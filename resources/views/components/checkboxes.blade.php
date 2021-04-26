@props([
    'for',
    'label',
    'name',
    'value'
])

<div class="form-check">
  <input class="form-check-input" name="{{$name}}" type="checkbox" value="{{$value}}" id="{{$for}}">
  <label class="form-check-label" for="{{$for}}">
  {{$label}}
  </label>
</div>