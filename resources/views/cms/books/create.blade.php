@extends('cms.parent')
@section('title','Add Book')

@section('styles')

@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Book</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{ route('books.store') }}">
                    @csrf
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Validation Error!</h5>
                            @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                            @endforeach
                          </div>
                          @endif

                          @if(session()->has('message'))
                          <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h5><i class="icon fas fa-check-circle"></i>{{ session('message') }}</h5>
                            </div>
                            @endif

                      <div class="form-group">
                        <label for="book_name">Name</label>
                        <input type="text" class="form-control" name="name" id="book_name" placeholder="Enter book name">
                      </div>
                      <div class="form-group">
                        <label for="book_isbn">ISBN</label>
                        <input type="text" class="form-control" name="isbn" id="book_isbn" placeholder="Enter book isbn">
                      </div>
                      <div class="form-group">
                        <label for="author_id">Author</label>
                        <input type="text" class="form-control" name="author_id" id="author_id" placeholder="Enter book author">
                      </div>
                      <div class="form-group">
                        <label for="publisher_id">Publisher</label>
                        <input type="text" class="form-control" name="publisher_id" id="publisher_id" placeholder="Enter book publisher">
                      </div>
                      <div class="form-group">
                        <label for="publisher_id">Classification</label>
                        <input type="text" class="form-control" name="classification_id" id="classification_id" placeholder="Enter book classification">
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!--/.col (left) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
@endsection

@section('scripts')
    <!-- bs-custom-file-input -->
   <script src="{{ asset('cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
   <script type="text/javascript">
   $(document).ready(function () {
   bsCustomFileInput.init();
         });
    </script>
@endsection
