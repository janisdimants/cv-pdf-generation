@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      
      @component('components.card', [
        'title' => 'Image',
      ])
      @if ($cv->image)
        <img src="/storage/{{ $cv->image }}" alt="" srcset="">
      @endif
      <form action="{{ route('cvs.upload-image', [ 'cv' => $cv ]) }}" method="POST" class="container" enctype="multipart/form-data">
        @csrf
        @include('components.image-upload', [
          'name' => 'image',
          'label' => 'Choose File',
          'id' => 'cv_image_input'
        ])
        <button type="submit" class="btn btn-primary">Upload Image</button>
      </form>
      @endcomponent
      
      @component('components.card', [
      'title' => 'General'
      ]) 
      
      <form action="{{ route('cvs.update', [ 'cv' => $cv ]) }}" method="POST" class="container">
        @csrf
        <div class="form-row">
          @include('components.text-input', [
          'label' => 'First Name',
          'name' => 'first_name',
          'value' => $cv->first_name
          ])
          
          @include('components.text-input', [
          'label' => 'Last Name',
          'name' => 'last_name',
          'value' => $cv->last_name
          ])
          
          @include('components.text-input', [
          'label' => 'Email',
          'name' => 'email',
          'type' => 'email',
          'value' => $cv->email
          ])
          
          @include('components.text-input', [
          'label' => 'Birth Date',
          'name' => 'birth_date',
          'type' => 'date',
          'value' => $cv->birth_date
          ])
        </div>
        
        <button type="submit" class="btn btn-primary">Update CV</button>
      </form>
      @endcomponent
      
      @component('components.card', [
      'title' => 'Education'
      ])  
      <div class="list-group">
        @foreach ($cv->educations as $education)
        <div class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $education->name }}</h5>
            <small>{{ $education->major }}</small>
          </div>
          <p class="mb-1">{{ (new DateTime($education->from))->format('Y') }} - {{ (new DateTime($education->to))->format('Y') }}</p>
          <form action="{{ route('educations.destroy', compact('education')) }}" method="POST">
            @csrf
            @method('delete')
            <div class="col align-self-end">
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
        @endforeach
      </div>
      
      <form action="{{ route('educations.store') }}" method="POST" class="container">
        @csrf
        <input type="hidden" name="cv_id" value="{{ $cv->id }}">
        <div class="form-row">
          @include('components.text-input', [
          'label' => 'Name',
          'name' => 'name'
          ])
          
          @include('components.text-input', [
          'label' => 'Major',
          'name' => 'major'
          ])
          
          @include('components.text-input', [
          'label' => 'From',
          'name' => 'from',
          'type' => 'date'
          ])
          
          @include('components.text-input', [
          'label' => 'To',
          'name' => 'to',
          'type' => 'date'
          ])
        </div>
        
        <button type="submit" class="btn btn-primary">Add Education</button>
      </form>
      @endcomponent
      
      
      @component('components.card', [
      'title' => 'Languages'
      ])
      
      <div class="list-group">
        @foreach ($cv->languages as $language)
        <div class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $language->name }}</h5>
          </div>
          <p class="mb-1">{{ $language->level }}</p>
          <form action="{{ route('languages.destroy', compact('language')) }}" method="POST">
            @csrf
            @method('delete')
            <div class="col align-self-end">
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
        @endforeach
      </div>
      
      <form action="{{ route('languages.store') }}" method="POST">
        @csrf
        <input type="hidden" name="cv_id" value="{{ $cv->id }}">
        <div class="form-row">
          @include('components.text-input', [
          'label' => 'Name',
          'name' => 'name',
          ])
          
          @include('components.text-input', [
          'label' => 'Level',
          'name' => 'level',
          ])
          <button type="submit" class="btn btn-primary">Add Language</button>
        </div>
      </form>
      @endcomponent
    </div>
  </div>
</div>
@endsection
