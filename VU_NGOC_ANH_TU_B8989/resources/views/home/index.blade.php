@extends('home.layouts.master')

@section('title','home')
@section('content')
<div class="content-header">
    <h1>TOP SẢN PHẨM</h1>
</div>
<div class="container product-display">

        @foreach ($products as $item)
        <div class="col border">
            <div>
                <img src="images/products/{{$item['image']}}" alt="" style="width: 250px;height:170px">
            </div>
           <div class="product-details">
            <span>{{$item['name']}}</span><br>
            <span>{{$item['price']}}</span>
           </div>
        </div>
        @endforeach

</div>

@endsection