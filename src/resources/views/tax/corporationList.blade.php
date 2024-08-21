@extends('web::layouts.app')

@section('title', trans('billing::tax.corporation_tax_overview_selection'))
@section('page_header', trans('billing::tax.corporation_tax_overview_selection'))

@section('content')
    @include("treelib::giveaway")

    <div class="card">
        <div class="card-header d-flex flex-row- align-items-baseline justify-content-between">
            <h3 class="card-title flex-grow-1">{{ trans('billing::tax.corporation_tax_overview_selection') }}</h3>
        </div>
        <div class="card-body">
            <table class="table DataTable table-hover table-striped">
                <thead>
                <tr>
                    <th>{{ trans('billing::tax.corporation') }}</th>
                    <th>{{ trans('billing::tax.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($corporations as $corporation)
                        <tr>
                            <td>@include("web::partials.corporation",["corporation"=>$corporation])</td>
                            <td><a href="{{ route("tax.corporationOverviewPage",["id"=>$corporation->corporation_id]) }}">{{ trans('billing::tax.view_tax_details') }}</a> </td>
                        </tr>
                    @endforeach
                </tbody>
                @if($corporations->isEmpty())
                    <tfoot>
                        <tr>
                            <td colspan="2">{{ trans('billing::tax.no_corporation_with_tax_invoices') }}</td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
        @include("treelib::creator-code")
    </div>

    <div class="card">
        <div class="card-header d-flex flex-row- align-items-baseline justify-content-between">
            <h3 class="card-title flex-grow-1">{{ trans('billing::tax.regenerate_tax_invoices') }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route("tax.regenerateInvoices") }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="month">{{ trans('billing::tax.month') }}</label>
                    <input type="month" name="month" id="month" class="form-control" style="max-width: 20em">
                    <small>{{ trans('billing::tax.regenerate_tax_invoices_desc') }}</small>
                </div>
                <button type="submit" class="btn btn-primary">{{ trans('billing::tax.regenerate_tax_invoices') }}</button>
            </form>
        </div>
        @include("treelib::creator-code")
    </div>
@endsection

@push('javascript')
    <script>
        $(".DataTable").DataTable();
    </script>
@endpush

