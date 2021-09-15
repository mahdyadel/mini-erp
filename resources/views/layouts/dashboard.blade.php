@extends('layouts.master')


@section('body')

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->

    @includeIf('layouts.parts.left_sidebar')
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">



    <!-- Topbar -->
    @includeIf('layouts.parts.navbar')
    <!-- End of Topbar -->

  


         <!-- Main Content -->
      <div id="content">

        @yield('content')
    
       
      </div>
      <!-- End of Main Content -->


        

         <!-- Footer -->
     @includeIf('layouts.parts.footer')


@endsection