@extends('app')

@section('content')
    <h1>{{$tender->bid_title}}</h1>
    <hr/>
    <tender>
        <p>
            <b>Pre bid Date: </b>{{date('d-m-Y',strtotime($tender->pre_bid_date))}} | Open Bid Date: {{date('d-m-Y',strtotime($tender->open_bid_date))}}
            | Post Bid Date: {{date('d-m-Y',strtotime($tender->post_date))}} | Remove Date: {{date('d-m-Y',strtotime($tender->remove_date))}}
        </p>
    </tender>

@stop