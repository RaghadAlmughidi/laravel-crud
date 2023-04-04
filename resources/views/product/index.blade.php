@extends('product.layout')
@section('content')
<div class="container"> 
<div class="jumbotron">
  
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
   
    <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button">create</a>
    <a class="btn btn-primary btn-lg" href="{{route('product.trash')}}" role="button">trash</a>
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
        <td class="d-flex ">
            <a class="btn btn-primary mr-1" href="{{route('products.edit',$item->id)}}">edit</a>
            <a class="btn btn-info mr-1" href="{{route('products.show',$item->id)}}">show</a>
            <br>
            <br>
           
            <a class="btn btn-warning" href="{{route('soft.delete',$item->id)}}">soft delete</a>
        </td>
      </tr>    
        @endforeach
       
   
    
     
    </tbody>
  </table>
  
  {{ $products->links('pagination::bootstrap-4')}}

    
    
     

</div> 
@endsection