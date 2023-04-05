@extends('frontend.layouts.template')

@section('maincontent')

<div class="container">
<div class="row">

    <div class="col-lg-5">
        <div class="box_main">
            <div class="tshirt_img"><img src="{{asset($product->product_img)}}"></div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="box_main">
            <div class="product-info">
                <h4 class="shirt_text">{{$product->product_name}}</h4>
           <p class="price_text">Price :  <span style="color: #262626;">${{$product->product_price}}</span></p>
            </div>
            <div class="my-3 product-details">
                <p class="lead">{{$product->product_long_des}}</p>
                <ul class="py-2 bg-light my-2" >
                <li>Category-{{$product->product_category_name}}</li>
                <li>Subcategory-{{$product->product_subcategory_name}}</li>
                <li>Available Qty-{{$product->product_quantity}}</li>
                </ul>
            </div>
            <div class="btn_main">
                <form action="{{route('productAddTocart')}}" method="post">
                    @csrf
                   
                    <input type="hidden" value="{{$product->id}}" name="product_id" />
                    <input type="hidden" value="{{$product->product_price}}" name="price" />
                    <input type="hidden" value="{{$product->product_quantity}}" name="quantity" />

                                 <div class="form-group">

                                    <label>How many Pics?</label>
                 
                   
                                    <input type="number"  min="1" placeholder="1" name="product_quantity" />

                               </div>

                   
                    <br/> <br/>
                    <input class="btn btn-warning" type="submit" value="Add To Cart" />
                   
                </form>
           
                
                
             </div>
        </div>
    </div>
</div>

<div class="fashion_section">
    <div id="main_slider">
      
          
             <div class="container">
                <h1 class="fashion_taital">Related Products</h1>
                <div class="fashion_section_2">
                   <div class="row">
                   @foreach($reletedproducts as $reletedproduct)
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">{{$reletedproduct->product_name}}</h4>
                            <p class="price_text">Price :  <span style="color: #262626;">${{$reletedproduct->product_price}}</span></p>
                            <div class="tshirt_img"><img src="{{asset($reletedproduct->product_img)}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt">
                                <form action="{{route('productAddTocart')}}" method="post">
                                @csrf
                                
                                
                                <input type="hidden" value="{{$product->id}}" name="product_id" />
                                <input type="hidden" value="{{$product->product_price}}" name="price" />
                                <input type="hidden" value="{{$product->product_quantity}}" name="quantity" />
                                             {{-- <div class="form-group">
            
                                                <label>How many Pics?</label>
                             
                               
                                                <input type="number"  min="1" placeholder="1" name="product_quantity" />
            
                                           </div>
            
                               
                                <br/> <br/> --}}
                                <input class="btn btn-warning" type="submit" value="Buy Now" />
                               
                            </form></div>
                               <div class="seemore_bt"><a href="{{route('singleproduct',[$reletedproduct->id,$reletedproduct->slug])}}">See More</a></div>
                            </div>
                         </div>
                      </div>
                    @endforeach
                      
                   </div>
                </div>
             </div>
         
          
      
       
    </div>
 </div>

</div>






@endsection