
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('department', 'Department:') !!}
    {!! Form::text('department', null, ['class'=> 'form-control']) !!}
</div>

@if (isset($career))
    <div class="form-group">
        {!! Form::label('post_date', 'Post Date:') !!}
        {!! Form::date('post_date', date('Y-m-d',strtotime($career->post_date)), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('due_date', 'Due Date:') !!}
        {{--{!! Form::input('date','due_date', date('Y-m-d'), ['class'=> 'form-control']) !!}--}}
        {!! Form::date('due_date', date('Y-m-d',strtotime($career->due_date)), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remove_date', 'Remove Date:') !!}
        {!! Form::date('remove_date', date('Y-m-d',strtotime($career->remove_date)), ['class'=> 'form-control']) !!}
    </div>

    @else

    <div class="form-group">
        {!! Form::label('post_date', 'Post Date:') !!}
        {!! Form::input('date','post_date', date('Y-m-d'), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('due_date', 'Due Date:') !!}
        {!! Form::input('date','due_date', date('Y-m-d'), ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remove_date', 'Remove Date:') !!}
        {!! Form::input('date','remove_date', date('Y-m-d'), ['class'=> 'form-control']) !!}
    </div>

@endif

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=> 'btn- btn-primary form-control']) !!}
</div>
