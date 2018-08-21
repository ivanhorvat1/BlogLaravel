@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card alert-info">
            <div class="card-body">
                <h5 class="card-title">POSTED</h5>
                <h2 class="text-center">{{ $posts_count }}</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card alert-danger">
            <div class="card-body">
                <h5 class="card-title">TRASHED POSTS</h5>
                <h2 class="text-center">{{ $trashed_count }}</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card alert-success">
            <div class="card-body">
                <h5 class="card-title">USERS</h5>
                <h2 class="text-center">{{ $users_count }}</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card alert-info">
            <div class="card-body">
                <h5 class="card-title">CATEGORIES</h5>
                <h2 class="text-center">{{ $categories_count }}</h2>
            </div>
        </div>
    </div>
</div>

@endsection
