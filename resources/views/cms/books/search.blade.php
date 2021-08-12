@extends('cms.parent')
@section('title','Add Book')

@section('styles')

@endsection
@section('content')
<div class="wrapper  wrapper1">
	<div class="container">
		<div class="row">
			<div class="module span12">
				<div class="module-head">
					<h3>Search Books</h3>
				</div>
				<div class="module-body">
					<form class="form-horizontal row-fluid">
						<div class="control-group">
							<label class="control-label">Name or author<br>of the book</label>
							<div class="controls">
								<textarea class="span12" rows="2"></textarea>
							</div>
						</div>

						<div class="control-group">
							<div class="controls" id="search_book_button">
								<a class="btn btn-default">Search Book</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="display: none;">
			<div class="module span12">
				<div class="module-body">
		            <table class="table table-striped table-bordered table-condensed">
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
		                <tbody id="book-results"></tbody>
		            </table>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="categories_list" id="categories_list" value="{{ json_encode($categories_list) }}">
</div>
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
