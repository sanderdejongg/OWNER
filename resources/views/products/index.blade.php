@extends('layouts.app')
@section('content')
    <div class="container" id="app">
    @guest
        <h1>Please sign in to view projects</h1>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        @forelse( $notifications as $notification )
            <div class="alert alert-primary" role="alert">
                {{$notification->data['body']}} {{$notification->created_at->diffForHumans()}} by {{ $notification->data['by']  }}
            </div>
        @empty
            <h1>No notifications</h1>
        @endforelse
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <h1>Current Products</h1>
        <div class="row row-cols-3">
            @forelse( $products as $product )
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{!! $product->name !!}</h5>
                        <p class="card-text"> {!! $product->description !!}</p>
                        @foreach ($product->tag as $tag)
                            <span class="badge rounded-pill bg-success">{{ $tag->name }}</span>
                        @endforeach
                        <br/>
                        <br/>
                        <form action="{{ route('delete') }}" method="POST" class="float-end">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
                <p><em>No products have been created yet.</em></p>
            @endforelse
        </div>
    </div>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <br/>
            <h2>New Product</h2>
            <form action="{{ route('new') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="text" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="text" placeholder="name" name="name">
                    <div id="emailHelp" class="form-text">Required | Unique</div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Product Description</label>
                    <textarea class="form-control" id="description" placeholder="description" name="description"></textarea>
                    <div id="emailHelp" class="form-text">Required</div>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Product Tags</label>
                    <input type="text" class="form-control" id="tags" placeholder="tags" name="tags">
                    <div id="emailHelp" class="form-text">Separated by comma (,)</div>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    @endguest
@endsection
