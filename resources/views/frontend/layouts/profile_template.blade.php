@extends('frontend.layouts.template')

@section('maincontent')



<div class="container">
    <div class="row">
    
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{route('confirmorder')}}" >Dashboard</a></li>
                        <li><a href="{{route('pendingorders')}}" >Pending Order</a></li>
                        
                        </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                  
                    @yield('profilecontent')
                </div>
            </div>
        </div>
    </div>
    





@endsection