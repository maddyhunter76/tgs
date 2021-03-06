@extends('backend.master.master')
@section('activeMenu', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Menu</a></li>
                    <li class="breadcrumb-item active">Edit a menu</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.menu.managemenuitems', $data->id) }}" class="btn btn-primary" aria-expanded="false">
                Manage Submenu
            </a>
        </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <div class="edit menu m-t-20">
                <form action="{{route('admin.menu.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Menu title <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $data->name }}" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="location" class="col-lg-2 col-form-label">Position <span class="text-danger">*</span></label>
                        <div class="col-lg-10 {{ $errors->has('position') ? ' is-invalid' : '' }}">
                            @foreach(config('menu_position.position') as $name => $displayName)
                            <label class="radio-inline">
                                <input type="radio" name="location" class="menu-location" value="{{$name}}" @if($data->location == $name ){{"checked"}}@endif required>
                                {{$displayName}}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Link </label>
                        <div class="col-lg-10">
                            <input type="text" name="link" class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{ $data->link}}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="position" class="col-lg-2 col-form-label">Display Order </label>
                        <div class="col-lg-2">
                            <input class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" type="number" min="1" value="{{ $data->position}}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Status </label>
                        <div class="col-lg-10">
                            <label class="radio-inline">
                                <input name="status" class="menu-status" value="published" type="radio" @if($data->status=='published' ){{"checked"}}@endif>
                                Active
                            </label>
                            <label class="radio-inline">
                                <input name="status" class="menu-status" value="draft" type="radio" @if($data->status=='draft' ){{"checked"}}@endif>
                                Inactive
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-md btn-danger">Submit</button>
                            <a class="btn btn-warning" href="" onclick="history.go(-1);">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection