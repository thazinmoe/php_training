@extends('layouts.app')
@section('content')
<div class="container">
  @if($errors->any())
  <div class="alert alert-warning">
    <ol>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ol>
  </div>
  @endif
  <form action="/comments/update" method="post">
    @csrf
    <div class="mb-3">
      <label>Content</label>
      <input type="text" value="{{$comment->content}}" name="content" class="form-control">
    </div>
    <input style="display:none" type="number" name="article_id" value="{{$comment->article_id}}">
    <input style="display:none" type="number" name="user_id" value="{{$comment->user_id}}">   
    <input type="submit" value="Update Comment" class="btn btn-primary">
  </form>
</div>
@endsection