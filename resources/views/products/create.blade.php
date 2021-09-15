
@extends('layouts.dashboard')

@section('title')

    {{__('site.products')}}


@endsection

@section('content')
  
  <div class="box">
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="{{__('products.en_name')}}" name="en_name" required value="{{ old('en_name') }}">
          @error('en_name') {{ $message }} @enderror
        </div>
        <div class="col-md-6">
        <input type="text" class="form-control" placeholder="{{__('products.ar_name')}}" name="ar_name" required value="{{ old('ar_name') }}">
        @error('ar_name') {{ $message }} @enderror
        </div>
      </div>
      </div>
      <!-- //Description -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <textarea type="text" class="form-control" placeholder="{{__('products.en_description')}}" name="en_description" required value="{{ old('en_description') }}"></textarea>
        @error('en_description') {{ $message }} @enderror
        </div>
        <div class="col-md-6">
        <textarea type="text" class="form-control" placeholder="{{__('products.ar_description')}}" name="ar_description" required value="{{ old('ar_description') }}"></textarea>
        @error('ar_description') {{ $message }} @enderror
        </div>
      </div>
      </div>
      <!-- //Price -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          <input type="number" class="form-control" placeholder="{{__('products.price')}}" name="price" required value="{{ old('price') }}">
          @error('price') {{ $message }} @enderror
        </div>
      </div>
      </div>
      <!-- //Attachments -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          <input type="file" multiple="multiple" class="form-control"  name="attachments[]" required >
          @error('attachments') {{ $message }} @enderror
        </div>
      </div>
      </div>
      <!-- //Button -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-2">
            <button class="btn btn-primary btn-block " style="margin-left:20px;">{{__('products.create_product')}}</button>
        </div>
      </div>
      </div>
    </form>
  </div>


@endsection