@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
    @if(Session::has("msg"))
    <div class="alert alert-success">{{Session::get("msg")}}</div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Images</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                @foreach ($product as $image)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img class="card-img-top" style="height: 330px; width: 100%; display: block; object-position: center; object-fit: cover" src="{{ asset('/uploads/' . $image->image_path) }}" data-holder-rendered="true">
                                        <div class="card-body p-2 text-right">
                                            <a href="/productImages/{{$image->id}}" class="btn btn-info">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
    <!-- Delete model -->

    @endsection
</div>