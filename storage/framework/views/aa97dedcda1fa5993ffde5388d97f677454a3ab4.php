<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
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
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <form action="/products/delete" method="POST" class="float-end">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                        <h5 class="card-title"><?php echo $product->name; ?></h5>
                        <p class="card-text"> <?php echo $product->description; ?></p>
                        <?php $__currentLoopData = $product->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge rounded-pill bg-success"><?php echo e($tag->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p><em>No products have been created yet.</em></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <?php if(session('status')): ?>
            <div class="alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <h2>New Product</h2>
        <form action="/products/new" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
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
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel8/OWNER/resources/views/products/index.blade.php ENDPATH**/ ?>