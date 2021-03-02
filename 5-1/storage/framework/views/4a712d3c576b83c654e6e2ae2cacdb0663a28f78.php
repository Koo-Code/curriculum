<?php $__env->startSection('title','タイムライン'); ?>

<?php $__env->startSection('content'); ?>

<div class="bg-white border w-50" style="margin:0 auto;">
    <div class="p-4 border-bottom">ホーム</div>
    <form action="/timeline" method="post">
    <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <div class="p-4">
                <input class="form-control <?php if(count($errors) > 0): ?> is-invalid <?php endif; ?>" type="text" name="body"  placeholder="いまどうしてる？">
                <div class="text-right">
                    <button type="submit" class="mt-4 btn btn-primary">つぶやく</button>
                </div>
            </div>
            
            <?php if(count($errors) > 0): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center p-1 alert-danger"><strong>エラー！  </strong><?php echo e($e); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </form>
</div>

<div class="bg-white border w-50" style="margin: 25px auto;">

    <div class="tweet-wrapper">
        <?php $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="border-bottom p-4">

            <div class="pb-3">
                <div style="float:right;"><?php echo e($tweet->created_at); ?></div>    
                <div style="font-weight:bold;"><?php echo e($tweet->user->name); ?></div>
            </div>
            <div><?php echo e($tweet->body); ?></div>
            <?php if($name == $tweet->user->name): ?>
            <div style="text-align:right;">
                <a href="/timeline/delete/<?php echo e($tweet->id); ?>">
                    <button type=button class="btn btn-danger">削除</button>
                </a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LetsEngineer\curriculum\5-1\resources\views/admin/timeline.blade.php ENDPATH**/ ?>