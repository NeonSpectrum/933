@extends("cpanel.layouts.app")

@section("body")
<div class="card">
  <div class="card-body">
    <a class="btn btn-primary btn-sm pull-right" href="{{ url('cpanel/website/add') }}" role="button">
      <i class="fa fa-plus"></i>&nbsp;Add
    </a>
    <table class="datatable table table-striped table-bordered">
      <thead>
        <tr>
          <th width="5%">ID</th>
          <th>Label</th>
          <th>Image</th>
          <th width="5%">Action</th>
        </tr>
      </thead>
      <tbody>
         @foreach($data as $id => $row)
          <tr>
            <td>{{ $id + 1 }}</td>
            <td><h3>{{ $row->title }}</h3><br><h6><i>{{ $row->subtitle }}</i></h6></td>
            <td>
              <a href="{{ asset("uploads/" . $row->filename) }}">
                <img class="material-boxed" src="{{ asset("img/carousel/" . $row->filename) }}" alt="" height="80px">
              </a>
            </td>
            <td>
              <a class="btn btn-primary btn-sm btn-block" href="{{ url('cpanel/website/' . $row->id.'/edit') }}">
                <i class="fa fa-pencil-square-o"></i>&nbsp; Edit
              </a>
              <a class="btn btn-primary btn-sm btn-block btnDeleteData" href="javascript:void(0)" data-url="carousel/{{ $row->id }}" data-redirect="website">
                <i class="fa fa-trash"></i>&nbsp; Delete
              </a>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
