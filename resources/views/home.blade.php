@extends('layouts.appLogged')

@section('content')
    @if (Auth::user()->id == 1)
        <div id="sidebar">
            <a href="#" class="visible-phone">
                <i class="fa fa-list-alt"></i>
                Menu
            </a>
            <ul>
                <li class="active">
                    <a href="#">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product') }}">
                        <i class="fas fa-cubes"></i>
                        <span>Create / Update / Delete</span>
                    </a>
                </li>
            </ul>
        </div>
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb">
                    <a href="{{ route('home') }}" title="Go to home" class="tip-bottom">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home
                    </a>
                </div>
            </div>
            <div class="container-fluid" style="padding-top: 20px;">

            </div>
        </div>
    @else
        <style>
            th{
                text-align: center!important;
            }
            td{
                text-align: center!important;
            }
        </style>
        <div id="sidebar">
            <a href="#" class="visible-phone">
                <i class="fa fa-list-alt"></i>
                Menu
            </a>
            <ul>
                <li class="active">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span>
                    </a>
                </li>
            </ul>
        </div>
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb">
                    <a href="{{ route('home') }}" title="Home" class="tip-bottom">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home
                    </a>
                </div>
            </div>
            <div class="container-fluid">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>SKU</th>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>COLOR</th>
                        <th>CATEGORY</th>
                        <th>MANUFACTURER</th>
                        <th>COUNTRY</th>
                        <th>CREATED</th>
                        <th>UPDATED</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->color }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->manufacturer->name }}</td>
                                <td>{{ $product->country->name }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
