
@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="row">
            @foreach($modules as $module)
                <div class="col-md-6">
                <div class="card" style="margin-bottom:10px;">
                    <div class="card-body  text-center "> 
                   
                    <a href="{{ route($module->getLowerName().'.index') }}" > {{__('modules.'. $module->getLowerName())}}</a>
                    </div>
                </div>
               

                </div>

                @endforeach
            </div>
        </div>

@endsection

