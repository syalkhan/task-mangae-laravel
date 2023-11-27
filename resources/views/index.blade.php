@extends('layout')
@section('main-content')
<div class="float-start">
    <h4 class="pb-3"> My Tasks </h4>
</div>

<div class="float-end">
    <a href="{{route('task.create')}}" class="btn btn-info">
        <i class="fa fa-plus-circle pr-2"></i> Create Task </a>
</div>
<div class="clearfix"></div>

@foreach($tasks as $task)
<div class="card mt-3" >
    <div class="card-header">

    @if ($task->status == 'Todo')
    {{$task->title}}
                
                @else
                <del>{{ $task->title }}</del>
                @endif

        
        <span class="badge rounded-pill text-bg-warning">{{$task->created_at->diffForHumans()}}</span>
    </div>
    <div class="card-body">
        <div class="card-text">

            <div class="float-start">
            @if ($task->status == 'Todo')
            {{$task->description}}
                
                @else
                <del>{{$task->description}}</del>
                @endif
               
                <br>


                @if ($task->status == 'Todo')
                <span class="badge rounded-pill text-bg-info">Todo</span>
                @else
                <span class="badge rounded-pill text-bg-success">Done</span>
                @endif


                <small>Last Updated - {{$task->updated_at->diffForHumans()}}</small>

            </div>

            <div class="float-end">
                <a href="{{ route('task.edit', $task->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                
                <form style="display:inline" action= "{{ route('task.destroy', $task->id) }}" method="post">
                @csrf
                @method('DELETE')
                    <button type='submit' class="btn btn-danger" > <i class="fa fa-trash"></i> </button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endforeach

@if (count($tasks) == 0)
<div class="alert alert-danger p-2">
    Task empty
</div>
@endif
@endsection