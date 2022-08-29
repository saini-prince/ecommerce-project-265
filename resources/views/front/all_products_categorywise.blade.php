@extends('front.layout.app')

@section('main_content')


        <section id="watches" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>{{ $all_categories->category_name }}</a></h3>
                <hr class="mx-auto">
                <p>Here you can check out our amazing products</p>
            </div>

            
                <div class="row mx-auto container-fluid">
                    @foreach($all_categories->rProducts as $item)
                    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="{{ asset('uploads/'.$item->product_image)}}" style="width:200px; height:200px;"/>
                    <h4 >{{ $item->product_name }}</h4>
                    <h5 class="p-name">{{ $item->product_description }}</h5>
                    <a href="route('single_product',$item->id)"><button class="buy-btn">View Product</button></a> 
                    </div>
                    @endforeach     
                </div>
        </section>


    </div>
  </section>

  @endsection