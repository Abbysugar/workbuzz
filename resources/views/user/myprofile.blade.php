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
        My Profile
      </div>
        <div class="box">
        <form class="form-horizontal" method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="field{{ $errors->has('manager') ? ' has-error' : '' }}">
            <label class="label">Manager</label>
            <p class="control has-icons-left">
              <input class="input" type="text" name="manager" placeholder="your manager" value="{{ Auth::user()->manager }}">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </p>
            @if ($errors->has('manager'))
              <p class="help is-danger">{{ $errors->first('manager') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('location') ? ' has-error' : '' }}">
            <label class="label">Location</label>
            <p class="control has-icons-left">
              <input class="input" type="text" name="location" placeholder="work location" value="{{ Auth::user()->location }}">
              <span class="icon is-small is-left">
                <i class="fa fa-map-marker"></i>
              </span>
            </p>
            @if ($errors->has('location'))
              <p class="help is-danger">{{ $errors->first('location') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('job_title') ? ' has-error' : '' }}">
            <label class="label">Job Title</label>
            <p class="control has-icons-left">
              <input class="input" type="text" name="job_title" placeholder="Job title" value="{{ Auth::user()->job_title }}">
              <span class="icon is-small is-left">
                <i class="fa fa-briefcase"></i>
              </span>
            </p>
            @if ($errors->has('job_title'))
              <p class="help is-danger">{{ $errors->first('job_title') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('job_title') ? ' has-error' : '' }}">
            <label class="label">Department</label>
            <p class="control has-icons-left">
               <span class="select"> 
                <select class="input" type="text" name="department">
                  <option {{ (Auth::user()->department == 'Human Resources') ? 'selected="selected"' : '' }}>Human Resources</option>
                  <option {{ (Auth::user()->department == 'Web Development') ? 'selected="selected"' : '' }}>Web Development</option>
                  <option {{ (Auth::user()->department == 'Software Engineering') ? 'selected="selected"' : '' }}>Software Engineering</option>
                  <option {{ (Auth::user()->department == 'Accounts') ? 'selected="selected"' : '' }}>Accounts</option>
                  <option {{ (Auth::user()->department == 'Social Media Management') ? 'selected="selected"' : '' }}>Social Media Management</option>
                  <option {{ (Auth::user()->department == 'Business Management') ? 'selected="selected"' : '' }}>Business Management</option>
                </select>
              </span>
              <span class="icon is-small is-left">
                <i class="fa fa-building"></i>
              </span>
            </p>
            @if ($errors->has('department'))
              <p class="help is-danger">{{ $errors->first('department') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="label">dob</label>
            <p class="control has-icons-left">
              <input class="input" type="date" name="dob" placeholder="birthday" value="{{ Auth::user()->dob }}">
              <span class="icon is-small is-left">
                <i class="fa fa-calendar"></i>
              </span>
            </p>
            @if ($errors->has('dob'))
              <p class="help is-danger">{{ $errors->first('dob') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label class="label">Sex</label>
            <p class="control has-icons-left">
            <span class="select"> 
                <select class="input" type="text" name="gender">
                  <option {{ (Auth::user()->gender == 'female') ? 'selected="selected"' : '' }}>female</option>
                  <option {{ (Auth::user()->gender == 'male') ? 'selected="selected"' : '' }}>male</option>
                  <option {{ (Auth::user()->gender == 'other') ? 'selected="selected"' : '' }}>other</option>
                </select>
              </span>
            <span class="icon is-small is-left">
              <i class="fa fa-user"></i>
            </span>
              
            </p>
            @if ($errors->has('gender'))
              <p class="help is-danger">{{ $errors->first('gender') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('marital_status') ? ' has-error' : '' }}">
            <label class="label">Marital Status</label>
            <p class="control has-icons-left">
            <span class="select"> 
                <select class="input" type="text" name="marital_status" value="{{ Auth::user()->marital_status}}">
                  <option {{ (Auth::user()->marital_status == 'single') ? 'selected="selected"' : '' }}> single</option>
                  <option {{ (Auth::user()->marital_status == 'married') ? 'selected="selected"' : '' }}> married</option>
                  <option {{ (Auth::user()->marital_status == 'divorced') ? 'selected="selected"' : '' }}> divorced</option>
                </select>
              </span>
            <span class="icon is-small is-left">
              <i class="fa fa-heart"></i>
            </span>
              
            </p>
            @if ($errors->has('marital_status'))
              <p class="help is-danger">{{ $errors->first('marital_status') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="label">Address</label>
            <p class="control has-icons-left">
              <input class="input" type="text" name="address" placeholder="home address" value="{{ Auth::user()->address }}">
              <span class="icon is-small is-left">
                <i class="fa fa-home"></i>
              </span>
            </p>
            @if ($errors->has('address'))
              <p class="help is-danger">{{ $errors->first('address') }}</p>
            @endif
          </div>

          <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="label">Phone</label>
            <p class="control has-icons-left">
              <input class="input" type="text" name="phone" placeholder="phone number" value="{{ Auth::user()->phone }}">
              <span class="icon is-small is-left">
                <i class="fa fa-phone"></i>
              </span>
            </p>
            @if ($errors->has('phone'))
              <p class="help is-danger">{{ $errors->first('phone') }}</p>
            @endif
          </div>

          <div class="field is-horizontal">
            <div class="field-label">
              <label class="label">Status</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <label class="radio">
                    <input type="radio" name="status" value="1"  {{ (Auth::user()->status == 1) ? 'checked="checked"' : '' }}>
                    Active
                  </label>
                  <label class="radio">
                    <input type="radio" name="status" value="0" {{ (Auth::user()->status == 0) ? 'checked="checked"' : '' }}>
                    Inactive
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="group">
          <label for="image"> Image (.jpg) </label>
          <input class="control" id="name" name="image" type="file" >
        </div>

          <div class="field is-grouped">
            <p class="control">
              <button class="button is-success">Save</button>
            </p>
          </div>
        </div>
      </form>
    </div>
      
    </div>
  </div>
</div>
@endsection
