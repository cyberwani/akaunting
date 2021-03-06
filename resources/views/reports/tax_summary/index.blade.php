@extends('layouts.admin')

@section('title', trans('reports.summary.tax'))

@section('new_button')
<span class="new-button"><a href="{{ url('reports/tax-summary') }}?print=1&status={{ request('status') }}&year={{ request('year', $this_year) }}" target="_blank" class="btn btn-success btn-sm"><span class="fa fa-print"></span> &nbsp;{{ trans('general.print') }}</a></span>
@endsection

@section('content')
<!-- Default box -->
<div class="box box-success">
    <div class="box-header">
        <div class="pull-left" style="margin-left: 5px">
            <a href="{{ url('reports/tax-summary') }}?year={{ request('year', $this_year) }}"><span class="badge @if (request('status') == '') bg-green @else bg-default @endif">{{ trans('general.all') }}</span></a>
            <a href="{{ url('reports/tax-summary') }}?status=paid&year={{ request('year', $this_year) }}"><span class="badge @if (request('status') == 'paid') bg-green @else bg-default @endif">{{ trans('invoices.paid') }}</span></a>
            <a href="{{ url('reports/tax-summary') }}?status=upcoming&year={{ request('year', $this_year) }}"><span class="badge @if (request('status') == 'upcoming') bg-green @else bg-default @endif">{{ trans('general.upcoming') }}</span></a>
        </div>
        {!! Form::open(['url' => 'reports/tax-summary', 'role' => 'form', 'method' => 'GET']) !!}
        <div class="pull-right">
            @stack('year_input_start')
            {!! Form::select('year', $years, request('year', $this_year), ['class' => 'form-control input-filter input-sm', 'onchange' => 'this.form.submit()']) !!}
            @stack('year_input_end')
        </div>
        {!! Form::close() !!}
    </div>

    @include('reports.tax_summary.body')
</div>
<!-- /.box -->
@endsection
