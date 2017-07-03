@foreach($users as $user)
<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
           <strong>{{ $user->name }}</strong> <small>{{ $user->job_title }} in Department</small>
          <br>
          <small><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Location -</small><small>&nbsp;started {{ Carbon\Carbon::createFromFormat('d/m/Y', $user->hire_date)->toFormattedDateString() }}</small>
        </p>
      </div>
      <nav class="level is-mobile">
        <div class="level-left">
          <a class="level-item tooltip">
            <span class="icon is-small"><i class="fa fa-eye"></i></span>
            <span class="tooltiptext"> View Profile </span>
          </a>
          @if (Auth::user()->role == 1)
            <a class="level-item tooltip">
              <span class="icon is-small"><i class="fa fa-pencil"></i></span>
               <span class="tooltiptext"> Edit Profile </span>
            </a>
            <a class="level-item tooltip">
              <span class="icon is-small"><i class="fa fa-trash"></i></span>
               <span class="tooltiptext"> Delete Profile </span>
            </a>
          @endif
        </div>
      </nav>
    </div>
  </article>
</div>
@endforeach

{{ $users->links() }}
