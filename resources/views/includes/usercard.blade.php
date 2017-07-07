<div class="box">
  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
        <img src="uploads/{{ Auth::user()->image }}" alt="Image">
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-left">
          <!-- <figure class="image is-48x48">
            <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
          </figure> -->
        </div>
        <div class="media-content">
          <p class="title is-4">{{ Auth::user()->name }}</p>
          <p class="subtitle is-6">{{ Auth::user()->location }}</p>
        </div>
      </div>

      <div class="content">
         <p>Joined: {{ Carbon\Carbon::createFromFormat('d/m/Y', Auth::user()->hire_date)->toFormattedDateString() }}</p>
         <p>Manager: {{ Auth::user()->manager }}</p>
      </div>
    </div>
  </div>
</div>