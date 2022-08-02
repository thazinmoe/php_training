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
  <form action="/articles/update" method="post">
    @csrf
    <div class="mb-3">
      <label>First Name</label>
      <input type="text" value="{{$article->fname}}" name="fname" class="form-control">
    </div>
    <input style="display:none" type="number" name="id" value="{{$article->id}}">
    <div class="mb-3">
      <label>Last Name</label>
      <input type="text" value="{{$article->lname}}" name="lname" class="form-control">
    </div>
    <div class="mb-3">
      <label>Title</label>
      <input type="text" value="{{$article->title}}" name="title" class="form-control">
    </div>
    <div class="mb-3">
      <label>Category</label>
      <input type="text" value="{{$article->category}}" name="category" class="form-control">
    </div>
    <div class="mb-3">
      <label>Body</label>
      <textarea name="body"  class="form-control">{{$article->body}}</textarea>
    </div>   
    <input type="submit" value="Update Article" class="btn btn-primary">
  </form>
</div>
@endsection