@extends('admin.layout.master')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="col-md-6"> 
             @foreach($res as $res)
             {{$res->month}}
             @endforeach
        </div>
    </div>
</div>
         
          

@endsection