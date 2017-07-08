@if (Auth::user()->role == 1)
@extends('layouts.app')

@section('content')
@include('includes.header')
@include('includes.error')
<div class="container" style="margin-top: 20px">
  <div class="columns">
    <div class="column is-4">
      @include('includes.usercard')
    </div>
    <div class="column is-8">
      <div class="box">
        Add New User
      </div>
      <div class="box">
        <form class="form-horizontal" method="POST" action="{{ route('adduser') }}">
          {{ csrf_field() }}
          <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="label">Name</label>
            <p class="control has-icons-left">
              <input class="input" type="text" name="name" placeholder="Employee name" value="{{ old('name') }}">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </p>
            @if ($errors->has('name'))
              <p class="help is-danger">{{ $errors->first('name') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('job_title') ? ' has-error' : '' }}">
            <label class="label">Job Title</label>
            <p class="control has-icons-left">
              <input class="input" type="text" name="job_title" placeholder="Job Description" value="{{ old('job_title') }}">
              <span class="icon is-small is-left">
                <i class="fa fa-briefcase"></i>
              </span>
            </p>
            @if ($errors->has('job_title'))
              <p class="help is-danger">{{ $errors->first('job_title') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="label">Email</label>
            <p class="control has-icons-left">
              <input class="input" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
              <span class="icon is-small is-left">
                <i class="fa fa-envelope"></i>
              </span>
            </p>
            @if ($errors->has('email'))
              <p class="help is-danger">{{ $errors->first('email') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('hire_date') ? ' has-error' : '' }}">
            <label class="label">Hire Date</label>
            <p class="control has-icons-left">
              <input class="input" type="date" name="hire_date" placeholder="Hire Date" value="{{ old('hire_date') }}">
              <span class="icon is-small is-left">
                <i class="fa fa-calendar"></i>
              </span>
            </p>
            @if ($errors->has('hire_date'))
              <p class="help is-danger">{{ $errors->first('hire_date') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('department') ? ' has-error' : '' }}">
            <label class="label">Department</label>
            <p class="control has-icons-left">
              <select class="input" type="text" name="department">
                  <option {{ (Auth::user()->department == 'Human Resources') ? 'selected="selected"' : '' }}>Human Resources</option>
                  <option {{ (Auth::user()->department == 'Web Development') ? 'selected="selected"' : '' }}>Web Development</option>
                  <option {{ (Auth::user()->department == 'Software Engineering') ? 'selected="selected"' : '' }}>Software Engineering</option>
                  <option {{ (Auth::user()->department == 'Accounts') ? 'selected="selected"' : '' }}>Accounts</option>
                  <option {{ (Auth::user()->department == 'Social Media Management') ? 'selected="selected"' : '' }}>Social Media Management</option>
                  <option {{ (Auth::user()->department == 'Business Management') ? 'selected="selected"' : '' }}>Business Management</option>
                </select>
              <span class="icon is-small is-left">
                <i class="fa fa-building"></i>
              </span>
            </p>
            @if ($errors->has('department'))
              <p class="help is-danger">{{ $errors->first('department') }}</p>
            @endif
          </div>

          <div class="field is-grouped">
            <p class="control">
              <button class="button is-success">Submit</button>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@endif
