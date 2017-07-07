@extends('layouts.app')

@section('content')
@include('includes.header')
@include('includes.error')

<div class="container" style="margin-top: 20px">
  <div class="columns">
    <div class="column is-4">
      @include('includes.usercard_foreign')
    </div>
    <div class="column is-8">
      <div class="box">
        {{ $user->name }}'s Profile
      </div>
        <div class="box">
          <div class="field{{ $errors->has('manager') ? ' has-error' : '' }}">
            <label class="label">Manager:</label> {{ $user->manager }}
          </div>

          <div class="field">
            <label class="label">Location:</label> {{ $user->location }}
          </div>

          <div class="field">
            <label class="label">Job Title:</label> {{ $user->job_title }}
          </div>

          <div class="field">
            <label class="label">Department:</label> {{ $user->department }}     
          </div>

          <div class="field">
            <label class="label">Date of birth:</label>  {{ $user->dob }}
          </div>

          <div class="field">
            <label class="label">Sex:</label>  {{ $user->gender }}
          </div>

          <div class="field">
            <label class="label">Marital Status:</label> {{ $user->marital_status }}   
          </div>

          <div class="field">
            <label class="label">Address:</label> {{ $user->address }}     
          </div>

          <div class="field">
            <label class="label">Phone Number:</label> {{ $user->phone }}
          </div>

          <div class="field">
            <label class="label"> Status: <span class="{{ ($user->status == 1)  ? 'greenball' : 'blackball'  }}"></span></label>
          </div>
        </div>
    </div>
      
    </div>
  </div>
</div>
@endsection