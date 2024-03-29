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
  <form method="post">
    @csrf
    <div class="mb-3">
      <label>First Name</label>
      <input type="text" name="fname" class="form-control">
    </div>
    <div class="mb-3">
      <label>Last Name</label>
      <input type="text" name="lname" class="form-control">
    </div>
    <div class="mb-3">
      <label>Title</label>
      <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
      <label>Body</label>
      <textarea name="body" class="form-control"></textarea>
    </div>   
    <div class="mb-3">
      <label>Category</label>
      <textarea name="category" class="form-control"></textarea>
    </div>   
    <input type="submit" value="Add Article" class="btn btn-primary">
  </form>
</div>
@endsection