@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

        <div class="col-md-12">
            <hr>
            <h3 style="text-align: center; margin-top: 50px">Edit / Delete categories</h3>

            
                @if(session('message'))
                <div class="alert alert-success">
                {{ session('message') }}
                </div>
                @endif

                @if(session('warnings'))
                {{session('warnings')}}
                @endif
        
        </div>
    @foreach($categories as $category)
            <div class="col-md-2">
                <div class="card mb-2 shadow">
                    <a href="/item/{{$category->slug}}">
                        <div class="card-header">
                            <h5 style="text-align: center"> <a href="/category/edit/{{$category->id}}">{{$category->name}}</a></h5>
                            <h5 style="text-align: center"> <a href="/category/edit/{{$category->id}}"><smalL> code: </smalL>{{$category->code}}</a></h5>
                            <a href="/category/edit/{{$category->id}}">Edit</a>
                            <a href="/category/delete/{{$category->id}}">Delete</a>
                        </div>
                    </a>
                </div>

            </div>
    @endforeach
    </div>
    </div>
@endsection