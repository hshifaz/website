@extends('app')

@section('content')
    <h1>Careers
        <a href="/careers/create"><button type="button" class="btn btn-success" >Create</button></a>
    </h1>
    <hr/>
    <h3>Available Careers</h3>
    <hr/>
    @foreach($careers as $career)
        <h2>
            <a href="{{route('careers.edit',[$career->id])}}">{{$career->title}}</a>
            {{--<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>--}}
        </h2>
        <div class="body">
            <b>Department: </b>{{$career->department}}
            <b>Post Date: </b>{{date('d-m-Y',strtotime($career->post_date))}}
            <b>Due Date: </b>{{date('d-m-Y',strtotime($career->due_date))}}
            <b>Remove Date: </b>{{date('d-m-Y',strtotime($career->remove_date))}}
            {!! Form::open([
           'method' => 'DELETE',
           'route' => ['careers.destroy', $career->id]
             ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
            {!! Form::close() !!}
        </div>
    @endforeach
    @foreach($dues as $due)
        <h3>Due Careers</h3>
        <hr/>
        <h2>
            <a href="{{route('careers.edit',[$due->id])}}">{{$due->title}}</a>
        </h2>
        <div class="body">
            <b>Department: </b>{{$due->department}}
            <b>Post Date: </b>{{date('d-m-Y',strtotime($due->post_date))}}
            <b>Due Date: </b>{{date('d-m-Y',strtotime($due->due_date))}}
            <b>Remove Date: </b>{{date('d-m-Y',strtotime($due->remove_date))}}
        </div>
        {!! Form::open([
           'method' => 'DELETE',
           'route' => ['careers.destroy', $due->id]
             ]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
        {!! Form::close() !!}
    @endforeach
@stop