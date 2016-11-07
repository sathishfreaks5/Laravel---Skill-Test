<div class="row">

    <hr>

    <div class="col-md-4">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($product->name); ?>" required <?php echo e($readonly); ?>>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity in stock:</label>
            <input type="text" name="quantity" id="quantity" class="form-control" value="<?php echo e($product->quantity); ?>"
                   required <?php echo e($readonly); ?>>
        </div>

        <div class="form-group">
            <label for="price">Price per item:</label>
            <input type="text" name="price" id="price" class="form-control" value="<?php echo e($product->price); ?>" required <?php echo e($readonly); ?>>
        </div>


    </div>


    <div id="products-list">
        <?php echo $__env->make('products.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="col-md-12">
        <hr>

        <div class="form-group">
            <?php if( $method !== 'DELETE' ): ?>
            <button type="submit" id="save-action" class="btn btn-success">Save</button>
            <?php else: ?>
            <button type="button" id="delete-action" class="btn btn-warning">Delete</button>
            <?php endif; ?>
            <a href="<?php echo e(url('/')); ?>" type="button" id="clear-action" class="btn btn-danger">Cancel</a>
        </div>

    </div>

</div>



