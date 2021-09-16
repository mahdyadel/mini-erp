
@extends('layouts.dashboard')

@section('title')

    {{__('site.tags')}}


@endsection

@section('content')
  
  <div class="box">
    <form action="{{ route('tags.store') }}" method="post">
      @csrf
      <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="{{__('tags.en_name')}}" name="en_name" required value="{{ old('en_name') }}">
          @error('en_name') {{ $message }} @enderror
        </div>
        <div class="col-md-6">
        <input type="text" class="form-control" placeholder="{{__('tags.ar_name')}}" name="ar_name" required value="{{ old('ar_name') }}">
        @error('ar_name') {{ $message }} @enderror
        </div>
      </div>
      </div>
      
      <!-- //Button -->
      <div class="form-group">
      <div class="row">
        <div class="col-md-2">
            <button class="btn btn-primary btn-block " style="margin-left:20px;">{{__('tags.create_tag')}}</button>
        </div>
      </div>
      </div>
    </form>
  </div>


@endsection