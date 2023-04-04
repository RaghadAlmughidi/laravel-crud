@extends('product.layout')
@section('content')
<div class="container"> 
<div class="jumbotron">
  
    <p class="lead">trashed products</p>
   
    <a class="btn btn-primary btn-lg" href="{{route('products.index')}}" role="button">Home</a>
  </div>
  @if ($message= Session::get('success'))
     <div class="alert alert-success" role="alert">
 {{$message}}
  </div> 
  @endif
  
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @php
            $i = 0
        @endphp
        @foreach ($products as $item)
           <tr>
        <th scope="row">{{++ $i}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
        <td>
         
            <a href="{{route('product.back.from.trash',$item->id)}}">Back</a>
            <br>
            <br>
            <form action="{{route('product.delete.from.database',$item->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class=" btn btn-danger"type="submit">delete</button>

            </form>
           
        </td>
      </tr>    
        @endforeach
       
   
    
     
    </tbody>
  </table>
  
  {{ $products->links('pagination::bootstrap-4')}}

    
    
     

</div> 
@endsection