
@extends('layouts.dashboard')

@section('title')

    {{__('site.products')}}


@endsection

@section('content')
    
    <div class="" style="margin-right:20px">
        <p>{{__('products.description')}} : {{ $product->description }}</p>
        <p>{{__('products.price')}} : {{ $product->price }}</p>
        <p>{{__('products.created_at')}} : {{ $product->created_at->diffForHumans() }}</p>
     
     
    </div>

@endsection