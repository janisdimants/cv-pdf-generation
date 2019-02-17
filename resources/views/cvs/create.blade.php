@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create CV</div>
        
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          
          <form action="{{ route('cvs.store') }}" method="POST" class="container">
            @csrf
            <div class="form-row">
              @include('components.text-input', [
              'label' => 'First Name',
              'name' => 'first_name',
              ])
              
              @include('components.text-input', [
              'label' => 'Last Name',
              'name' => 'last_name',
              ])
              
              @include('components.text-input', [
              'label' => 'Email',
              'name' => 'email',
              'type' => 'email'
              ])
              
              @include('components.text-input', [
              'label' => 'Birth Date',
              'name' => 'birth_date',
              'type' => 'date'
              ])
            </div>
            
            <button type="submit" class="btn btn-primary">Create CV</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
