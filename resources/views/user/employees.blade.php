@extends('layouts.app')

@section('content')
@include('includes.header')
<div class="container" style="margin-top: 20px">
  <div class="columns">
    <div class="column is-4">
      @include('includes.usercard')
    </div>
    <div class="column is-8">
      <div class="box">
        Workbuzz Employees !
      </div>
      @include('includes.employees')
    </div>
  </div>
</div>
@endsection
