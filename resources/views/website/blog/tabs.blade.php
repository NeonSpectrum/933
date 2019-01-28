@if($data->count() > 0)
  <div class="content">
    <div class="row">
      @foreach($data as $row)
        <div class="col s12 m7">
          <img src="{{ asset('uploads/' . $row->filename) }}" width="100%">
        </div>
        <div class="col s12 m5 blog-card">
          <div class="subtitle">{{ $row->formattedType }}</div>
          <div class="title">{{ $row->title }}</div>
          <p>
            {{ $row->content }}
          </p>
          <a class="waves-effect waves-light btn" href="{{ url('blog/' . $row->type . "/" . $row->title) }}">See More</a>
        </div>
      @endforeach
    </div>
  </div>
@else
  <div class="content">
    <div class="row">
      NO DATA TO SHOW
    </div>
  </div>
@endif
