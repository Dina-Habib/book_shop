@extends('cms.parent')
@section('title','Show Publisher')

@section('styles')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('content')
<section class="content">
 <div class="container-fluid">
 <!-- /.row -->
 <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Responsive Hover Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->id }}</td>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->created_at }}</td>
                        <td>{{ $publisher->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('publishers.edit', $publisher->id ) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <form role="form" method="POST" action="{{ route('publishers.destroy', $publisher->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
 </div>
 </div>
 </div>
      </section>
@endsection

@section('scripts')
@endsection
