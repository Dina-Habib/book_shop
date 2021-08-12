@extends('cms.parent')
@section('title','Show Books')

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

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="term">

              <a href="{{ route('books.index') }}" class=" mt-1">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
              </a>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>ISBN</th>
                <th>Author</th>
                <th>Publishing Home</th>
                <th>Book Classification</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Settings</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->publisher->name}}</td>
                        <td>{{ $book->classification->name}}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('books.edit', $book->id ) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <form role="form" method="POST" action="{{ route('books.destroy', $book->id)}}">
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
