<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <title>Authors</title>
    <body>
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <a href="/create-authors"><button>Create Authors</button></a>
                <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <div class="card card-custom">
                    <div class="card-body">
                    <table class="datatable datatable-bordered datatable-head-custom" id="user_table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Total_books</th>
                                    <th title="Action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php
                               $books_data = App\Models\books::where('author_id',$item['id'])->get();
                               $books_count = $books_data->count();
                               ?>
                                    <tr>
                                        <td><?php echo e($item['first_name']); ?><?php echo e($item['last_name']); ?></td>
                                        <td><?php echo e($item['email']); ?></td>
                                        <td> <?php echo e($books_count); ?> </td>
                                        <td><a class="btn btn-sm btn-clean btn-icon mr-2"
                                                    href="/authors/<?php echo e($item['id']); ?>/edit">
                                                    <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                                <rect fill="#000000" opacity="0.3" x="5"
                                                                    y="20" width="15" height="2"
                                                                    rx="1" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
<form action="<?php echo e(route('authors.delete',$item['id'])); ?>" method="POST" id="edit_form">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="submit" class="btn btn-danger" onclick="clicked(event)" value="Delete" />
       </form>
                                            </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <script>
        function clicked(e)
        {
            if(!confirm('Are you sure?')) {
                e.preventDefault();
            }
        }
       </script>
</body>
</html><?php /**PATH E:\xampp\htdocs\books_management\resources\views/authors/index.blade.php ENDPATH**/ ?>