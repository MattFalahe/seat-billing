@if($invoice->state == "open")
    <span class="badge badge-warning">{{ trans('billing::tax.tax_state_open') }}</span>
@elseif($invoice->state == "pending")
    <span class="badge badge-secondary">{{ trans('billing::tax.tax_state_pending') }}</span>
@elseif($invoice->state == "completed")
    <span class="badge badge-success">{{ trans('billing::tax.tax_state_completed') }}</span>
@elseif($invoice->state == "prediction")
    <span class="badge badge-success">{{ trans('billing::tax.tax_state_prediction') }}</span>
@elseif($invoice->state == "overtaxed")
    <span class="badge badge-danger">{{ trans('billing::tax.tax_state_overtaxed') }}</span>
@else
    <span class="badge badge-danger">BUG: Invalid state</span>
@endif