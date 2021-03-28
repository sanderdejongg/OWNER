<?php $__env->startSection('content'); ?>
    <div class="container" id="app">
    <?php if(auth()->guard()->guest()): ?>
        <h1>Please sign in to view projects</h1>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
        </li>
        <?php if(Route::has('register')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
            </li>
        <?php endif; ?>
    <?php else: ?>
        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="alert alert-primary" role="alert">
                <?php echo e($notification->data['body']); ?> <?php echo e($notification->created_at->diffForHumans()); ?> by <?php echo e($notification->data['by']); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h1>No notifications</h1>
        <?php endif; ?>
            <?php if(session('status')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
        <h1>Current Products</h1>
        <div class="row row-cols-3">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product->name; ?></h5>
                        <p class="card-text"> <?php echo $product->description; ?></p>
                        <?php $__currentLoopData = $product->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge rounded-pill bg-success"><?php echo e($tag->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br/>
                        <br/>
                        <form action="<?php echo e(route('delete')); ?>" method="POST" class="float-end">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p><em>No products have been created yet.</em></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
            <br/>
            <h2>New Product</h2>
            <form action="<?php echo e(route('new')); ?>" method="POST">
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
                    <div id="emailHelp" class="form-text">Separated by comma (,)</div>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/laravel8/OWNER/resources/views/products/index.blade.php ENDPATH**/ ?>