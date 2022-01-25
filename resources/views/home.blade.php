@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                
            </div>
        </div>
    </div>
</div> -->
<div class="mt-10"></div>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product</div>

                <div class="card-body">
                <div class="album py-5 bg-light">
            <div class="container">
                @if ($products)
                <div class="row">

                    @if (count($products) === 0)
                    <div class="col-lg-4">
                        <h3>Belum ada produk</h3>
                    </div>
                    @endif

                    @foreach ($products as $product)
                    @php
                    $product = $product->parent ?: $product;
                    @endphp
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12 border">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    @if ($product->productImages->first())
                                    <img src="{{ asset('storage/'.$product->productImages->first()->medium) }}" alt="{{ $product->name }}" class="img-fluid">
                                    @else
                                    <img src="{{ asset('themes/ezone/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}" class="img-fluid">
                                    @endif
                                </a>

                            </div>
                            <div class="product-content ">
                                <h3><a href="product-details.html">{{ $product->name }}</a></h3>
                                <div class="product-price">
                                    <span>{{ number_format($product->priceLabel()) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>


                @endif
            </div>
        </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
