@extends('front.layout.app')

@section('main_content')

    <!--Home-->
    <section id="home">
    <div class="container">
        <h5>NEW ARRIVALS</h5>
        <h1><span>Best Prices</span> This Season</h1>
        <p>Eshop offers the best products for the most affordable prices</p>
        <button>Shop Now</button>
    </div>
    </section>


    <!--Clothes-->
    @foreach($all_categories as $item)

        <section id="watches" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>{{ $item->category_name }}</a></h3>
                <hr class="mx-auto">
                <p>Here you can check out our amazing {{ $item->category_name }}</p>
            </div>

            
                <div class="row mx-auto container-fluid">
                    @foreach($item->rProducts as $single)
                    @if($loop->iteration == 5)
                        @break;
                    @endif
                    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="{{ asset('uploads/'.$single->product_image)}}" style="width:200px; height:200px;"/>
                    <h4 >{{$single->product_name}}</h4>
                    <h5 class="p-name">{{ \Illuminate\Support\Str::limit($single->product_description, 100)}}</h5>
                    <a href="{{route('single_product',$single->id)}}"><button class="buy-btn">View Product</button></a> 
                    </div>
                    @endforeach     
                </div>
                <a href="{{route('all_products_categorywise',$item->id)}}"><button style="margin-left:43%"class="text-center">View All Products</button></a>
        </section>

    @endforeach


@endsection