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