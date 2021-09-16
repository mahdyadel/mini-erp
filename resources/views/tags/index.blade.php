
@extends('layouts.dashboard')

@section('title')

    {{__('site.tags')}}


@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{__('site.tags')}}</h1>
<a href="{{ route('tags.create') }}" class="btn btn-primary pull-right">{{__('tags.crate_tag')}}</a>


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
            <th>{{__('products.created_at')}}</th>
            <th>{{__('mange.mange')}}</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>{{__('mange.id')}}</th>
          <th>{{__('products.name')}}</th>
            <th>{{__('products.created_at')}}</th>
            <th>{{__('mange.mange')}}</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($tags as $tag)
          <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('tags.edit' , $tag->id) }}" class="btn btn-xs btn-success">{{__('mange.edit')}}</a>
                <a href="{{ route('tags.show' , $tag->id) }}" class="btn btn-xs btn-primary">{{__('mange.view')}}</a>
             </td>
          </tr>
         @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $tags->links() }}</div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->


@endsection