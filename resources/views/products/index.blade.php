
@extends('layouts.dashboard')

@section('title')

    {{__('site.products')}}


@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{__('site.products')}}</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary pull-right">{{__('products.crate_product')}}</a>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>{{__('mange.id')}}</th>
            <th>{{__('products.name')}}</th>
            <th>{{__('products.description')}}</th>
            <th>{{__('products.price')}}</th>
            <th>{{__('products.created_at')}}</th>
            <th>{{__('mange.mange')}}</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>{{__('mange.id')}}</th>
          <th>{{__('products.name')}}</th>
            <th>{{__('products.description')}}</th>
            <th>{{__('products.price')}}</th>
            <th>{{__('products.created_at')}}</th>
            <th>{{__('mange.mange')}}</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>$ {{ $product->price }} </td>
            <td>{{ $product->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('products.edit' , $product->id) }}" class="btn btn-xs btn-success">{{__('mange.edit')}}</a>
                <a href="{{ route('products.show' , $product->id) }}" class="btn btn-xs btn-primary">{{__('mange.view')}}</a>
             </td>
          </tr>
         @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $products->links() }}</div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->


@endsection