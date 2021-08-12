@extends('cms.parent')
@section('title','Edit Publisher')

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
                    <h3 class="card-title">Edit Publisher</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{ route('publishers.update', $publisher->id) }}">
                    @csrf
                    @method('PUT')
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

                      <div class="form-group">
                        <label for="publisher_name">Name</label>
                        <input type="text" class="form-control" name="name" id="publisher_name" placeholder="Enter publisher name" value="{{ $publisher->name }}">
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
