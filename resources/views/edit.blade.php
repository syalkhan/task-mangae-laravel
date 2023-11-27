@extends('layout')
@section('main-content')
<div class="float-start">
  <h4 class="pb-3"> Edit Task <span class="badge bg-info"> {{ $task->title }}</span></h4>
</div>

<div class="float-end">
  <a href="{{ route('task.index') }}" class="btn btn-info">All Task </a>
</div>


<div class="clearfix"></div>


<div class="card card-body bg-light p-4">
<form action="{{ route('task.update',$task->id) }}" method="post">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">

    <label for="title" class="form-label">Description</label>
    <textarea type="text" class="form-control" id="description" name="description" rows="5">{{ $task->description }}</textarea>

    <label for="title" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
      @foreach ($statuses as $status)
      <option value="{{ $status['value'] }}"{{ $task->status === $status['value'] ? 'selected' : '' }}> {{ $status['label'] }} </option>    
      @endforeach
    </select>
   
    <br>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

@endsection