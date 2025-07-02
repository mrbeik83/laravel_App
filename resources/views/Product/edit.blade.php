@extends('layout.master')

@section('content')

<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
    @csrf

    <!-- نام محصول -->
    <div class="mb-3">
        <label for="name" class="form-label">نام محصول</label>
        <input type="text" class="form-control" id="name" value="{{ $product->name }}" name="name" placeholder="مثلاً: شال ابریشم طرحدار" required>
    </div>

    <!-- نوع محصول -->
    <div class="mb-3">
        <label for="type" class="form-label">نوع محصول</label>
        <select class="form-select" id="type" name="type" required>
            <option value="">انتخاب نوع...</option>
            <option value="روسری">روسری</option>
            <option value="شال">شال</option>
            <option value="مقنعه">مقنعه</option>
            <option value="مینی اسکارف">مینی اسکارف</option>
        </select>
    </div>

    <!-- تعداد -->
    <div class="mb-3">
        <label for="number" class="form-label">تعداد موجودی</label>
        <input type="number" value="{{ $product->number }}" class="form-control" id="number" name="number" min="1" required>
    </div>

    <!-- قیمت -->
    <div class="mb-3">
        <label for="price" class="form-label">قیمت (تومان)</label>
        <input type="number" value="{{ $product->price }}" class="form-control" id="price" name="price" min="0" required>
    </div>

    <!-- سایز -->
    <div class="mb-3">
        <label for="size" class="form-label">سایز</label>
        <input type="text" value="{{ $product->size }}" class="form-control" id="size" name="size" placeholder="مثلاً: 140x140" required>
    </div>

    <div class="mb-3">
        <label for="picture" class="form-label">عکس محصول</label>
            <input type="file" name="picture" accept="image/*">

            @if ($product->picture)
                <img src="{{ asset('storage/' . $product->picture) }}" width="150">
            @endif
    </div>

    <!-- دکمه ارسال -->
    <button type="submit" class="btn btn-success w-100">
        <i class="bi bi-plus-circle"></i> ادیت محصول
    </button>
</form>


@endsection