@include('includes.error')
@foreach($users as $user)
<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img src="uploads/{{ $user->image }}" alt="Image">
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
           <strong>{{ $user->name }}</strong> <small>{{ $user->job_title }} in {{ $user->department }}</small>
          <br>
          <small><i class="fa fa-map-marker"></i>&nbsp;&nbsp; {{ $user->location }} -</small><small>&nbsp;started {{ Carbon\Carbon::createFromFormat('d/m/Y', $user->hire_date)->toFormattedDateString() }}</small>
        </p>
      </div>
      @if(!\Request::is('home'))
      <nav class="level is-mobile">
        <div class="level-left">
          <a href="{{ url('/userprofile/'.$user->id) }}" class="level-item tooltip">
            <span class="icon is-small"><i class="fa fa-eye"></i></span>
            <span class="tooltiptext"> View Profile </span>
          </a>
          @if (Auth::user()->role == 1)
            <a href="{{ url('/updateuser/'.$user->id) }}" class="level-item tooltip">
              <span class="icon is-small"><i class="fa fa-pencil"></i></span>
               <span class="tooltiptext"> Edit Profile </span>
            </a>
            <a href="{{ url('/deleteuser/'.$user->id) }}" class="level-item tooltip">
              <span class="icon is-small"><i class="fa fa-trash"></i></span>
               <span class="tooltiptext"> Delete Profile </span>
            </a>
          @endif
        </div>
      </nav>
      @endif
    </div>
  </article>
</div>
@endforeach

{{ $users->links() }}
