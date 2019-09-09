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
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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

            </div>
        </div>
    @endif
@endsection
