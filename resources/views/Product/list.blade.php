<!-- resources/views/products/index.blade.php -->

@extends('layout.master') <!-- یا هر لایوت دیگه‌ای که استفاده می‌کنی -->

@section('content')
<div class="container py-4">
    <h4 class="mb-4">لیست محصولات</h4>

    @if ($products->isEmpty())
        <div class="alert alert-info">هنوز هیچ محصولی ثبت نشده است.</div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>

                            <p class="card-text mb-1">
                                <strong>نوع:</strong> {{ $product->type }}
                            </p>
                            <p class="card-text mb-1">
                                <strong>سایز:</strong> {{ $product->size }}
                            </p>
                            <p class="card-text mb-1">
                                <strong>قیمت:</strong> {{ number_format($product->price) }} تومان
                            </p>
                            <p class="card-text">
                                <strong>موجودی:</strong> {{ $product->number }} عدد
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-primary">مشاهده</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">ویرایش</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
