@extends('product.layout')
@section('content')

 <div class="container">


   
            <div class="form-group">
              <label for="exampleFormControlInput1">  Name :{{ $product->name  }}</label>
             
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">  Price :{{ $product->price  }}</label>
              
              </div>
    
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Details :    {!! $product->detail  !!}  </label>

        
            </div>
    
            <div class="form-group">
                <a href="{{route('products.index')}}">back</a>
    
            </div>
    
    
    
    
</div> 


@endsection