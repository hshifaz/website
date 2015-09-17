
<div class="form-group">
    {!! Form::label('bid_title', 'Tender/Bid Title:') !!}
    {!! Form::text('bid_title', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tender_no', 'Tender No:') !!}
    {!! Form::text('tender_no', null, ['class'=> 'form-control']) !!}
</div>

@if (isset($tender))
    <div class="form-group">
        {!! Form::label('pre_bid_date', 'Pre Bid Date:') !!}
        {!! Form::date('pre_bid_date', date('Y-m-d',strtotime($tender->pre_bid_date)), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('open_bid_date', 'Opening Bid Date:') !!}
        {!! Form::date('open_bid_date', date('Y-m-d',strtotime($tender->open_bid_date)), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('post_date', 'Post Date:') !!}
        {!! Form::date('post_date', date('Y-m-d',strtotime($tender->post_date)), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remove_date', 'Remove Date:') !!}
        {!! Form::date('remove_date', date('Y-m-d',strtotime($tender->remove_date)), ['class'=> 'form-control']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::label('pre_bid_date', 'Pre Bid Date:') !!}
        {!! Form::input('date','pre_bid_date', date('Y-m-d'), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('open_bid_date', 'Opening Bid Date:') !!}
        {!! Form::input('date','open_bid_date', date('Y-m-d'), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('post_date', 'Post Date:') !!}
        {!! Form::input('date','post_date', date('Y-m-d'), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remove_date', 'Remove Date:') !!}
        {!! Form::input('date','remove_date', date('Y-m-d'), ['class'=> 'form-control']) !!}
    </div>
@endif


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=> 'btn- btn-primary form-control']) !!}
</div>