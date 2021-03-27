<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products</title>
        <link href="dist/app.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <h1>Current Products</h1>
        <div class="row row-cols-3">
            @forelse( $products as $product )
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <form action="/products/delete" method="POST" class="float-end">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                        <h5 class="card-title">{!! $product->name !!}</h5>
                        <p class="card-text"> {!! $product->description !!}</p>
                        @foreach ($product->tag as $tag)
                            <span class="badge rounded-pill bg-success">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @empty
                <p><em>No products have been created yet.</em></p>
            @endforelse
        </div>
    </div>
    <div class="container">
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>New Product</h2>
        <form action="/products/new" method="POST">
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
                <div id="emailHelp" class="form-text">Seperated by comma (,)</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="dist/app.js" type="text/javascript"></script>
    </body>
</html>
