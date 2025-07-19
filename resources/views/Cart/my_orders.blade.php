@extends('layout.master')

@section('title', 'سفارش‌های من')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">تاریخچه سفارش‌های من</h3>

    @if($orders->count() > 0)
        @foreach($orders as $order)
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <span>شماره سفارش: {{ $order->id }}</span>
                    <span class="text-muted">تاریخ: {{ $order->created_at->format('Y/m/d H:i') }}</span>
                </div>
                <div class="card-body">
                    <table class="table text-center align-middle">
                        <thead>
                            <tr>
                                <th>محصول</th>
                                <th>تعداد</th>
                                <th>قیمت واحد</th>
                                <th>جمع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->products->name}}</td> 
                                    <td>{{ $item->number }}</td>
                                    <td>{{ number_format($item->price) }} تومان</td>
                                    <td>{{ number_format($item->price * $item->number) }} تومان</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-end fw-bold">
                        جمع کل سفارش: {{ number_format($order->total_price) }} تومان
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            شما هنوز سفارشی ثبت نکرده‌اید.
        </div>
    @endif
</div>
@endsection
