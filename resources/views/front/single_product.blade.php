@extends('front.layout.app')

@section('main_content')


    <!--Single product-->
      <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
          
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="{{ asset('uploads/'.$product_single->product_image)}}" id="mainImg"/>
            </div>

           


            <div class="col-lg-6 col-md-12 col-12">
                <h3 class="py-4">{{ $product_single->product_name }}</h3>

                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php# echo $row['product_id']; ?>" />
                  <input type="hidden" name="product_image" value="<?php #echo $row['product_image']; ?>"/>  
                  <input type="hidden" name="product_name" value="<?php #echo $row['product_name']; ?>"/>
                  <input type="hidden" name="product_price" value="<?php #echo $row['product_price']; ?>"/>
                  
                      <input type="number" name="product_quantity" value="1"/>
                      <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                </form>

               
                <h4 class="mt-5 mb-5">Product details</h4>
                <span>{{ $product_single->product_description }}
                </span>
            </div>


        </div>
      </section>
    
    @endsection