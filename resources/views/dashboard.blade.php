@extends('layout.master')

@section('content')
<div class="row mb-4">
    <!-- کارت درآمد -->
    <div class="col-md-3">
        <div class="card border-primary">
            <div class="card-body">
                <h5 class="card-title">درآمد امروز</h5>
                <p class="h2 text-primary">4,250,000 تومان</p>
                <p class="text-success"><i class="bi bi-arrow-up"></i> 12% نسبت به دیروز</p>
            </div>
        </div>
    </div>
    
    <!-- کارت سفارشات -->
    <div class="col-md-3">
        <div class="card border-success">
            <div class="card-body">
                <h5 class="card-title">سفارشات جدید</h5>
                <p class="h2 text-success">18</p>
                <p class="text-muted">5 مورد نیاز به پیگیری</p>
            </div>
        </div>
    </div>
    
    <!-- کارت محصولات -->
    <div class="col-md-3">
        <div class="card border-warning">
            <div class="card-body">
                <h5 class="card-title">موجودی کم</h5>
                <p class="h2 text-warning">7 محصول</p>
                <a href="#" class="btn btn-sm btn-warning">مشاهده لیست</a>
            </div>
        </div>
    </div>
    
    <!-- کارت مشتریان -->
    <div class="col-md-3">
        <div class="card border-info">
            <div class="card-body">
                <h5 class="card-title">مشتریان جدید</h5>
                <p class="h2 text-info">9</p>
                <p class="text-muted">این ماه: 64 مشتری</p>
            </div>
        </div>
    </div>
</div>
@endsection