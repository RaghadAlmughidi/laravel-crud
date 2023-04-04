@extends('product.layout')
@section('content')

<div class="container">

    <form action="{{route('products.store')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">product name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Banana">
        </div>


        <div class="form-group">
            <label for="text">product Price</label>
            <input type="text" class="form-control" name="price" id="text" placeholder="200$">
          </div>

       
        <div class="form-group">
          <label for="detail">product details</label>
          <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
        </div>
    <div class="form-group">
        <button type="submit"class="btn btn-primary">post</button>
    </div>
      </form>
</div>


@endsection