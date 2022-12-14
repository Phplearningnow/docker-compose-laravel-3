<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Yaraku Assignment || <?php echo $__env->yieldContent('title'); ?>
    </title>
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo e(route('assignment_dashboard')); ?>" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>
    <div class="content-wrapper">
        <?php if(session('success')): ?>
        <div class="alert alert-success" style="background-color: mediumseagreen;margin-right: 12px;">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Success!</strong> <?php echo e(session('success')); ?>.
        </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy;  <?php echo date("Y"); ?>  <a href="">Purna Pachhai</a>.</strong> All rights reserved.
    </footer>
</div>
<script src="<?php echo e(asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/js/adminlte.min.js')); ?>"></script>
</body>
<script>
    $(document).ready(function () {
        $('body').on('click', '[data-action=delete]',
            function (e) {
                e.preventDefault();
                var source = $(e.target);
                source = source.closest('a');
                var asset = source.attr('href');
                console.log(asset)
                $('#delete').find('#confirmDelete').attr('href', asset);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "GET",
                                url: asset,
                                success: function (data) {
                                    swal("Success! Your data has been deleted!", {
                                        icon: "success",
                                    }).then(function()
                                    {
                                        window.location = "<?php echo e(route('books_list')); ?>"
                                    });
                                }
                            });

                        } else {
                            swal("Your data  is safe!");
                        }
                    });
            });
    });
</script>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/master.blade.php ENDPATH**/ ?>