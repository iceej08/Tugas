

<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card form-container">
        <div class="card-header">
            <h3 class="card-title text-center"> Edit Data </h3>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('mahasiswa.update', $mhs->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label for="nama" class="form-label"> Nama </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e($mhs->nama); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label"> NIM </label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo e($mhs->nim); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label"> Alamat </label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo e($mhs->alamat); ?></textarea>
                </div>
                <button type="submit" class="btn btn-success"> Update </button>
                <a href="<?php echo e(route('mahasiswa.index', $mhs->id)); ?>" class="btn btn-secondary"> Kembali </a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\PHP\htdocs\website\laravel\crud-mahasiswa\resources\views/mahasiswa/edit.blade.php ENDPATH**/ ?>