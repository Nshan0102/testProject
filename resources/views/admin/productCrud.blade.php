@extends('layouts.appLogged')

@section('content')
    @if (Auth::user()->id == 1)
        <style>
            td{
                text-align: center!important;
                padding: 2px!important;
                vertical-align: middle!important;
            }
            select{
                margin: 0!important;
            }
            input{
                margin: 0!important;
                max-width: fit-content!important;
            }
            tr:hover {
                background: #9cd292!important;
            }
        </style>
        <div id="sidebar">
            <a href="#" class="visible-phone">
                <i class="fa fa-list-alt"></i>
                Menu
            </a>
            <ul>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="active">
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
            <div class="container-fluid" style="padding: 20px;">
                <div class="crudControls">

                </div>
                <div style="display: flex; flex-direction: column; max-width: 98%; justify-content: center;align-items: center">
                    <table id="products" class="table table-bordered">
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
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($products as $product)
                                <tr style="@if($product->id > 100) display: none; @endif ">
                                    <td>{{ $product->id }}</td>

                                    <td>
                                        <input style="width: 55px;" type="text" class="sku" value="{{ $product->sku }}">
                                    </td>

                                    <td>
                                        <input style="width: 55px;" type="text" class="name" value="{{ $product->name }}">
                                    </td>

                                    <td>
                                        <input style="width: 150px;" type="text" class="description" value="{{ $product->description }}">
                                    </td>

                                    <td>
                                        <input style="width: 55px;" type="text" class="color" value="{{ $product->color }}">
                                    </td>

                                    <td>
                                        <select name="" class="category">
                                            <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <select name="" class="manufacturer">
                                            <option value="{{ $product->manufacturer->id }}">{{ $product->manufacturer->name }}</option>
                                            @foreach($manufacturers as $manufacturer)
                                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td style="word-break: break-word;">
                                        <select name="" class="country">
                                            <option value="{{ $product->country->id }}">{{ $product->country->name }}</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td style="display: table-cell; align-items: center; vertical-align: middle!important;" >
                                        <div style="display: flex; flex-direction: row">
                                            <form action="">
                                                <button class="btn btn-primary" onclick="updateProduct(event,{{ $product->id }});">Save</button>
                                            </form>
                                            <form action="">
                                                <button class="btn btn-danger" onclick="deleteProduct(event,{{ $product->id }});">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="display: flex; flex-direction: row">
                        <input type="hidden" id="countStart" value="50">
                        <button id="load" onclick="productLoadMore(event)">Load more</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function updateProduct(e,id) {
                e.preventDefault();
                let prod_row = e.target.parentElement.parentElement.parentElement.parentElement;
                let prod_sku = prod_row.getElementsByClassName('sku')[0];
                let prod_name = prod_row.getElementsByClassName('name')[0];
                let prod_description = prod_row.getElementsByClassName('description')[0];
                let prod_color = prod_row.getElementsByClassName('color')[0];
                let prod_category = prod_row.getElementsByClassName('category')[0];
                let prod_country = prod_row.getElementsByClassName('country')[0];
                let prod_manufacturer = prod_row.getElementsByClassName('manufacturer')[0];
                $.ajax({
                    url: "{{ route('productUpdate') }}",
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        "id" : id,
                        "sku" : prod_sku.value,
                        "name" : prod_name.value,
                        "description" : prod_description.value,
                        "color" : prod_color.value,
                        "category_id" : prod_category.value,
                        "country_id" : prod_country.value,
                        "manufacturer_id" : prod_manufacturer.value,
                    } ,
                    success: function (response) {
                        if (response === "success"){
                            alert('Data was updated');
                        }else{
                            alert('Something went wrong! Be careful!');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        alert('Something went wrong! Be careful!');
                    }
                });
            }
            function deleteProduct(e,id) {
                e.preventDefault();
                let prod_row = e.target.parentElement.parentElement.parentElement.parentElement;
                $.ajax({
                    url: "{{ route('productDelete') }}",
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        "id" : id,
                    } ,
                    success: function (response) {
                        if (response === "success"){
                            prod_row.parentElement.removeChild(prod_row);
                            alert('Product was deleted');
                        }else{
                            alert('Something went wrong! Be careful!');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        alert('Something went wrong! Be careful!');
                    }
                });
            }
            function productLoadMore(e) {
                e.preventDefault();
                document.getElementById('load').disabled = true;
                let countStart = document.getElementById('countStart');
                $.ajax({
                    url: "{{ route('productLoadMore') }}",
                    type: "post",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        "countStart" : parseInt(countStart.value),
                    } ,
                    success: function (response) {
                        if (response){
                            let tableBody = document.getElementById('tableBody');
                            for (let i = 0; i < response.length; i++){
                                tableBody.innerHTML += '<tr><td>'+response[i]["id"]+'</td><td><input style="width: 55px;" type="text" class="sku" value="'+response[i]["sku"]+'"></td><td> <input style="width: 55px;" type="text" class="name" value="'+response[i]["name"]+'"></td><td> <input style="width: 150px;" type="text" class="description" value="'+response[i]["description"]+'"></td><td> <input style="width: 55px;" type="text" class="color" value="'+response[i]["color"]+'"></td><td> <select name="" class="category"> <option value="'+response[i]["category"]["id"]+'">'+response[i]["category"]["name"]+'</option> @foreach($categories as $category) <option value="{{$category->id}}">{{$category->name}}</option> @endforeach </select> </td> <td> <select name="" class="manufacturer"> <option value="'+response[i]["manufacturer"]["id"]+'">'+response[i]["manufacturer"]["name"]+'</option> @foreach($manufacturers as $manufacturer) <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option> @endforeach </select> </td> <td style="word-break: break-word;"> <select name="" class="country"> <option value="'+response[i]["country"]["id"]+'">'+response[i]["country"]["name"]+'</option> @foreach($countries as $country) <option value="{{$country->id}}">{{$country->name}}</option> @endforeach </select> </td> <td style="display: table-cell; align-items: center; vertical-align: middle!important;" > <div style="display: flex; flex-direction: row"> <form action=""> <button class="btn btn-primary" onclick="updateProduct(event,'+response[i]["id"]+');">Save</button> </form> <form action=""> <button class="btn btn-danger" onclick="deleteProduct(event,'+response[i]["id"]+');">Delete</button> </form> </div> </td> </tr>';
                            }
                            countStart.value = parseInt(countStart.value)+10;
                            document.getElementById('load').removeAttribute('disabled');
                        }else{
                            alert('Something went wrong! Be careful!');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        alert('Something went wrong! Be careful!');
                    }
                });
            }
        </script>
    @endif
@endsection
