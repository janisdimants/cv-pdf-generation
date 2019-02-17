
<div class="form-group col-12 col-sm-6">
  <label for="{{ $id ?? 'text_input_'.$name }}">{{ $label }}</label>
  <input 
    type="{{ $type ?? 'text' }}"
    class="form-control @if($errors->has($name)) is-invalid @endif"
    id="{{ $id ?? 'text_input_'.$name }}"
    name="{{ $name }}"
    placeholder="{{ $label }}"
    value="{{ old($name, $value ?? null) }}"
  >
  @if($errors->has($name))
    @foreach ($errors->get($name) as $error)
      <div class="invalid-feedback">
        {{ $error }}
      </div>
    @endforeach
  @endif
</div>