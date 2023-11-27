@extends('layout')
@section('main-content')
<div class="float-start">
  <h4 class="pb-3"> Create Task </h4>
</div>

<div class="float-end">
  <a href="{{ route('task.index') }}" class="btn btn-info">
    <i class="fa fa-arrow-left"></i> All Task </a>
</div>


<div class="clearfix"></div>


<div class="card card-body bg-light p-4">
<form action="{{ route('task.store') }}" method="post">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title">

    <label for="title" class="form-label">Description</label>
    <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>

    <label for="title" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
      @foreach ($statuses as $status)
      <option value="{{ $status['value'] }}"> {{ $status['label'] }} </option>    
      @endforeach
    </select>
   
    <br>
    <a href="{{ route('task.index') }} " class="btn btn-info">Cancel</a>
  <button type="submit" class="btn btn-primary">
    <i class="fa fa-check"></i> Save</button>
</form>
</div>

@endsection