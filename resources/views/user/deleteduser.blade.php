@extends('layouts.app')

@section('content')
@include('includes.header')

@foreach($users as $user)
<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img src="{{ $user->image }}" alt="Image">
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
           <a href="{{ url('/userprofile/'.$user->id) }}"><strong>{{ $user->name }}</strong></a>  <span class="{{ ($user->status == 1)  ? 'greenball' : 'blackball'  }}"></span><small>{{ $user->job_title }} in {{ $user->department }}</small>
          <br>
          <small><i class="fa fa-map-marker"></i>&nbsp;&nbsp; {{ $user->location }} -</small><small>&nbsp;started {{ Carbon\Carbon::createFromFormat('Y-m-d', $user->hire_date)->toFormattedDateString() }}</small>
        </p>
      </div>
      @if(!\Request::is('home'))
      <nav class="level is-mobile">
        <div class="level-left">
          @if (Auth::user()->role == 1)
            <a href="{{ url('/restoreuser/'.$user->id) }}" class="level-item tooltip">
              <span class="icon is-small"><i class="fa fa-refresh"></i></span>
               <span class="tooltiptext"> Activate User </span>
            </a>
          @endif
        </div>
      </nav>
      @endif
    </div>
  </article>
</div>
@endforeach
@endsection

{{ $users->links() }}