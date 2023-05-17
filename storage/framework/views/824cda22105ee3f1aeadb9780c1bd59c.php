<?php $__env->startSection('content'); ?>
    <div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/freeCodeCampLogo.svg" alt="" class="rounded-circle">
        </div>
        <div class="col-9">
            <div class="col-9 pt-5 justify-content-between align-items-baseline">
                <div class="h4"><?php echo e($user->username); ?></div>
                <a href="/p/create">Add new posr</a>
            </div>
            <a href="/profile/<?php echo e($user->id); ?>/edit">Edit profile</a>
            <div class="d-flex">
                <div><strong class="pr-5"><?php echo e($user->posts->count()); ?></strong> posts</div>
                <div><strong class="pr-5">23k</strong> followers</div>
                <div><strong class="pr-5">212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold"><?php echo e($user->profile->title); ?></div>
            <div><?php echo e($user->profile->description); ?></div>
            <div><a href="#"><?php echo e($user->profile->url); ?></a> </div>
        </div>
        <div class="row pt-5">
            <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-4 pb-4">
                    <a href="/p/<?php echo e($post->id); ?>">
                        <img src="/storage/<?php echo e($post->image); ?>" alt="" class="w-100"></a>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/example-app/resources/views/profiles/home.blade.php ENDPATH**/ ?>