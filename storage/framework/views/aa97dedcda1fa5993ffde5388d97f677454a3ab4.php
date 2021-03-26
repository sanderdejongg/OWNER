<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

        <style>
            .alert-success {
                color: green;
            }

        </style>
    </head>
    <body>

        <h1>Current Products</h1>

        <?php if(\App\Product::all()->count()): ?>
        <ul>
            <?php $__currentLoopData = \App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo $product->name; ?>

                <form action="/products/delete" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php (print $product->id); ?>"/>
                    <button type="submit">delete</button>
                </form>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php else: ?>
            <p><em>No products have been created yet.</em></p>
        <?php endif; ?>



        <?php if(session('status')): ?>
        <div class="alert-success">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>


        <h2>New Product</h2>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="/products/new" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <input type="text" name="name" placeholder="name" /><br />
            <textarea name="description" placeholder="description"></textarea><br />
            <input type="text" name="tags" placeholder="tags" /><br />
            <button type="submit">Submit</button>
        </form>

    </body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel8/OWNER/resources/views/products/index.blade.php ENDPATH**/ ?>