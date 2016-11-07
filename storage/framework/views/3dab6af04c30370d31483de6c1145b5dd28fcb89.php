<div class="col-md-8">

    <?php if(isset($products) ): ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($products as $productId => $product): ?>
                <tr>
                    <td><?php echo e($productId + 1); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e(number_format($product->quantity)); ?></td>
                    <td> $ <?php echo e($product->price); ?></td>
                    <td><a class="btn btn-primary" href='<?php echo e(url("/products/$productId/edit")); ?>'><i class="glyphicon glyphicon-pencil"></i> <small>Edit</small></a>
                    <a class="btn btn-danger" href='<?php echo e(url("/products/$productId/delete")); ?>'><i class="glyphicon glyphicon-trash"></i> <small>Delete</small> </a></td>
                </tr>
            <?php endforeach; ?>
            <tr class="table-success">
                <td colspan="3">Total Value:</tdc>
                <td id="total"> $ <?php echo e($total); ?></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php echo $__env->make('flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
