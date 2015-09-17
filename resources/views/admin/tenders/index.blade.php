@extends('app')

@section('content')
    <h1>Tenders |
        <a href="/tenders/create"><button type="button" class="btn btn-success" >Create</button></a>
    </h1>
    <hr/>
    <h3>Today</h3>
    <hr/>
    @foreach($currents as $current)
        <h2>
            <a href="{{route('tenders.edit',[$current->id])}}">{{$current->bid_title}}</a>
        </h2>
        <div class="body">
            {{$current->tender_no}}
            <p>
                <b>Pre bid Date: </b>{{date('d-m-Y',strtotime($current->pre_bid_date))}} | Open Bid Date: {{date('d-m-Y',strtotime($current->open_bid_date))}}
                | Post Bid Date: {{date('d-m-Y',strtotime($current->post_date))}} | Remove Date: {{date('d-m-Y',strtotime($current->remove_date))}}
            </p>
            {!! Form::open([
           'method' => 'DELETE',
           'route' => ['tenders.destroy', $current->id]
             ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
            {!! Form::close() !!}
        </div>
    @endforeach
    {{--<h3>Upcoming</h3>--}}
    {{--<hr/>--}}
    {{--@foreach($upcoming as $upcoming)--}}
        {{--<h2>--}}
            {{--<a href="{{route('tender-edit',[$upcoming->id])}}">{{$upcoming->bid_title}}</a>--}}
            {{--<a href="{{route('tender-edit',[$upcoming->id])}}"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>--}}
        {{--</h2>--}}
        {{--<div class="body">--}}
            {{--{{$today->tender_no}}--}}
            {{--<p>--}}
                {{--<b>Pre bid Date: </b>{{date('d-m-Y',strtotime($upcoming->pre_bid_date))}} | Open Bid Date: {{date('d-m-Y',strtotime($upcoming->open_bid_date))}}--}}
                {{--| Post Bid Date: {{date('d-m-Y',strtotime($upcoming->post_date))}} | Remove Date: {{date('d-m-Y',strtotime($upcoming->remove_date))}}--}}
            {{--</p>--}}
        {{--</div>--}}
    {{--@endforeach--}}
    <h3>Past</h3>
    <hr/>
    @foreach($past as $past)

        <h2>
            <a href="{{route('tenders.edit',[$past->id])}}">{{$past->bid_title}}</a>
        </h2>
        <div class="body">
            {{$past->tender_no}}
            <p>
                <b>Pre bid Date: </b>{{date('d-m-Y',strtotime($past->pre_bid_date))}} | Open Bid Date: {{date('d-m-Y',strtotime($past->open_bid_date))}}
                | Post Bid Date: {{date('d-m-Y',strtotime($past->post_date))}} | Remove Date: {{date('d-m-Y',strtotime($past->remove_date))}}
            </p>
            {!! Form::open([
           'method' => 'DELETE',
           'route' => ['tenders.destroy', $current->id]
             ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
            {!! Form::close() !!}
        </div>
    @endforeach

@stop