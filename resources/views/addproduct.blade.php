@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <form method="POST" action="/products" class=" form-group m-auto col-5" enctype="multipart/form-data">
        <h2 class="text-center text-primary">Products</h2>
        @csrf()
        Category
        <select name="category" class="form-control">
            <option value="">select category</option>
            @foreach($data as $i)
            <option value={{$i->id}}>{{$i->name}}</option>
            @endforeach
        </select>
        product<input type="text" class="form-control" name="name" />
        @if($errors->has('name'))
        <label class="text-danger">{{$errors->first('name')}}</label>
        @endif<br />
        <div>
            @php
            function unique_code($limit)
            {
            return substr(base_convert(sha1(uniqid(mt_rand())), 8, 36), 0, $limit);
            }
            @endphp
            Product Code
            <input id="code" type="text" class="form-control " name="product_id" value="@php echo unique_code(16); @endphp" readonly>
        </div>
        quantity <input type="number" class="form-control" name="quantity" />
        @if($errors->has('quantity'))
        <label class="text-danger">{{$errors->first('quantity')}}</label>
        @endif<br />
        Price <input type="number" class="form-control" name="price" />
        @if($errors->has('price'))
        <label class="text-danger">{{$errors->first('price')}}</label>
        @endif<br />
        sale price <input type="number" class="form-control" name="sale" />
        @if($errors->has('sale'))
        <label class="text-danger">{{$errors->first('sale')}}</label>
        @endif<br />
        Features<textarea class="form-control" name="features"></textarea>
        @if($errors->has('features'))
        <label class="text-danger">{{$errors->first('features')}}</label>
        @endif<br />
        status
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" value="1">Active
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="status" value="0">Inactive
            </label>
        </div>
        @if($errors->has('status'))
        <label class="text-danger">{{$errors->first('status')}}</label>
        @endif<br />
        Image
        <input type="file" class="form-control" name="image[]" multiple>
        @if($errors->has('image'))
        <label class="text-danger">{{$errors->first('image')}}</label>
        @endif <br />
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>

</div>
@endsection