<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Article List</title>
</head>

<body>
  @extends("layouts.app")
  @section("content")
  <div class="container">
    @if(session('info'))
    <div class="alert alert-info">
      {{ session('info') }}
    </div>
    @endif
    <a href="/exportexcel" class="btn btn-info mb-4">Export Excel</a>
    <a href="" class="btn btn-success mb-4" data-toggle="modal" data-target="#exampleModal">Import Excel</a>
    <!--Start Test Modal -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="/importexcel" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">
              <div class="form-group">
                <input type="file" name="file" required/>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
        </form>
      </div>
    </div>
    <!-- End Test Modal -->
    {{ $articles->links() }}
    @foreach($articles as $hi)
    <div class="card mb-2">
      <div class="card-body">
        <h5 class="card-title">{{ $hi->fname }}</h5>
        <h5 class="card-title">{{ $hi->lname }}</h5>
        <h5 class="card-title">{{ $hi->title }}</h5>
        <div class="card-subtitle mb-2 text-muted small">
          {{ $hi->created_at->diffForHumans() }}
        </div>
        <p class="card-text">{{ $hi->category }}</p>
        <p class="card-text">{{ $hi->body }}</p>
        <a class="card-link" href="{{ url("/articles/detail/$hi->id") }}">
          View Detail &raquo;
        </a>
      </div>
    </div>
    @endforeach
  </div>
  @endsection
</body>

</html>