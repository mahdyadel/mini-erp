
@extends('layouts.dashboard')

@section('title')

    {{__('site.products')}}


@endsection

@section('content')
  
  <div class="box">
    <form action="{{ route('products.update' , $product->id) }}" method="post"  enctype="multipart/form-data">
    @method('PUT')
      @csrf
      <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="{{__('products.en_name')}}" name="en_name" required value="{{ $product->getByLocale('en' , 'name')}}">
          @error('en_name') {{ $message }} @enderror
        </div>
        <div class="col-md-6">
        <input type="text" class="form-control" placeholder="{{__('products.ar_name')}}" name="ar_name" required value="{{ $product->getByLocale('ar' , 'name') }}">
        @error('ar_name') {{ $message }} @enderror
        </div>
      </div>
      </div>
      <!-- //Description -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <textarea type="text" class="form-control" placeholder="{{__('products.en_description')}}" name="en_description" required >{{ $product->getByLocale('en' , 'description') }}</textarea>
        @error('en_description') {{ $message }} @enderror
        </div>
        <div class="col-md-6">
        <textarea type="text" class="form-control" placeholder="{{__('products.ar_description')}}" name="ar_description" required >{{ $product->getByLocale('ar' , 'description') }}</textarea>
        @error('ar_description') {{ $message }} @enderror
        </div>
      </div>
      </div>
      <!-- //Price -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          <input type="number" class="form-control" placeholder="{{__('products.price')}}" name="price" required value="{{ $product->getRawOriginal('price') }}">
          @error('price') {{ $message }} @enderror
        </div>
      </div>
      </div>

      <!-- //image -->
      <div class="">
        <div class="row">
            @foreach($product->attachments as $file)
            <div class="col-md-3">
              <div class="img-cover">
                <div class="buttons">
                <!-- @if(!$file->is_master)
                  <form class="display-inline" action=" {{ route('attachments.destroy' , $file->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-xs confirm">{{__('attachments.remove')}}</button>
                      </form>
                  <form class="display-inline" action=" {{ route('attachments.update' , $file->id) }}" method="post">
                  @csrf
                  @method('PUT')
                      <button type="submit" class="btn btn-success btn-xs confirm">{{__('attachments.set_as_master')}}</button>
                      </form>
                    @endif -->
                </div>
                    <img src="{{ $file->url}}" class="img-thumbnail" alt="">
              </div>
            </div>
            @endforeach
        </div>
      </div>
      <hr>
      <!-- //Attachments -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          <input type="file" multiple="multiple" class="form-control"  name="attachments[]"  >
          @error('attachments') {{ $message }} @enderror
        </div>
      </div>
      </div>
      <!-- //Button -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-2">
            <button class="btn btn-primary btn-block " style="margin-left:20px;">{{__('products.update_product')}}</button>
        </div>
      </div>
      </div>
    </form>
  </div>


@endsection