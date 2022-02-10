@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    @if(Session::has('msg'))
    <div class="alert alert-info">{{Session::get('msg')}}</div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="/banners">
        <h2 class="text-center text-primary">Add Images</h2>
        @csrf()
        <div class="form-group m-auto col-5">
            Image <input type="file" class="form-control" name="image">
            @if($errors->has('image'))
            <label class="text-danger">{{$errors->first('image')}}</label>
            @endif
        </div>
        <div class="form-group m-auto col-5">
            Caption
            <textarea class="form-control" name="caption"></textarea>
            @if($errors->has('caption'))
            <label class="text-danger">{{$errors->first('caption')}}</label>
            @endif
        </div>
        <div class="text-center mt-2">
            <input type="submit" class="btn btn-success" value="submit" />
        </div>
    </form>
</div>
@endsection