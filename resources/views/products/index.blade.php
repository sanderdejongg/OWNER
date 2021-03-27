<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products</title>
        <link href="dist/app.css" rel="stylesheet">
    </head>
    <body>
    <h1>Current Products</h1>

    @forelse( $products as $product )

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{!! $product->name !!}</h5>
                <p class="card-text"> {!! $product->description !!}</p>
                @foreach ($product->tag as $tag)
                    <span class="badge rounded-pill bg-success">{{ $tag->name }}</span>
                @endforeach
                <br/>
                <br/>
                <form action="/products/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </div>
        </div>
    @empty
        <p><em>No products have been created yet.</em></p>
    @endforelse

        @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
        @endif

        <h2>New Product</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/products/new" method="POST">
            @method('PUT')
            @csrf
            <input type="text" name="name" placeholder="name" /><br />
            <textarea name="description" placeholder="description"></textarea><br />
            <input type="text" name="tags" placeholder="tags" /><br />
            <button type="submit">Submit</button>
        </form>
    <script src="dist/app.js" type="text/javascript"></script>
    </body>
</html>
