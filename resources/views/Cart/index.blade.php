@extends('layout.master')

<!-- @section('title', 'سبد خرید') -->

@section('content')
<div class="container py-4">
    <h3 class="mb-4">سبد خرید شما</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>تصویر</th>
                    <th>عنوان</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>جمع</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td><img src="{{ asset('storage/' . $item['image']) }}" width="60"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price']) }} تومان</td>
                        <td>
                            <a href="{{ route('cart.decrease', $id) }}" class="btn btn-sm btn-warning">-</a>
                            {{ $item['quantity'] }}
                            <a href="{{ route('cart.increase', $id) }}" class="btn btn-sm btn-success">+</a>
                        </td>
                        <td>{{ number_format($item['price'] * $item['quantity']) }} تومان</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-danger">حذف</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="mt-4">مبلغ نهایی: {{ number_format($total) }} تومان</h4>
    @else
        <p>سبد خرید شما خالی است.</p>
    @endif
</div>
@endsection
