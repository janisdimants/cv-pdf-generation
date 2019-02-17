<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input
      type="file" 
      class="custom-file-input @if($errors->has($name)) is-invalid @endif" 
      id="{{ $id ?? 'image_upload'.$name }}"
      name="{{ $name }}" 
      aria-describedby="inputGroupFileAddon01"
    >
    <label
      class="custom-file-label" 
      for="{{ $id ?? 'image_upload'.$name }}"
    >
      {{ $label }}
    </label>
    @if($errors->has($name))
      @foreach ($errors->get($name) as $error)
        <div class="invalid-feedback">
          {{ $error }}
        </div>
      @endforeach
    @endif
  </div>
</div>