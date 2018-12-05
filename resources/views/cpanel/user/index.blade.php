@extends("cpanel.layouts.app")

@section("body")
<div class="card">
  <div class="card-body">
    <a class="btn btn-primary btn-sm pull-right" href="{{ url('cpanel/author/add') }}" role="button">
      <i class="fa fa-plus"></i>&nbsp;Add
    </a>
    <table class="datatable table table-striped table-bordered">
      <thead>
        <tr>
          <th width="5%">ID</th>
          <th>Name</th>
          <th>Position</th>
          <th width="5%">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $id => $row)
          <tr>
            <td>{{ $id + 1 }}</td>
            <td>{{ $row->users->profiles->name }}</td>
            <td>{{ $row->users->profiles->position }}</td>
            <td>
              <a class="btn btn-primary btn-sm btn-block" href="{{ url('cpanel/author/' . $row->id . "/edit") }}">
                <i class="fa fa-pencil-square-o"></i>&nbsp;Edit
              </a>
              <a class="btn btn-primary btn-sm btn-block btnDeleteData" href="javascript:void(0)" data-url="authors/{{ $row->id }}" data-redirect="author">
                <i class="fa fa-trash"></i>&nbsp;Delete
              </a>
            </td>
          </tr>
         @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection