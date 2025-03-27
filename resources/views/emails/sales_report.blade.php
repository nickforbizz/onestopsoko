@component('mail::message')
# {{ $period }} Sales Report ({{ $start->format('M d, Y') }} - {{ $end->format('M d, Y') }})

**Total Sales:** {{ number_format($total, 2) }}

@component('mail::table')
| Product       | Quantity | Price    | Total     |
| ------------- | -------- | -------- | --------- |
@foreach ($sales as $sale)
| {{ $sale->product->title }} | {{ $sale->quantity }} | ${{ $sale->amount }} | ${{ $sale->total_amount }} |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent