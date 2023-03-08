<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
    <?php if(session()->getFlashdata('status')) { ?>
                <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                    <strong><?= session()->getFlashdata('status'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
        <div class="card mt-5">

            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <h3 class="text-secondary">Database Values</h3>
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex justify-content-end">
                        <a href="<?= base_url(); ?>reg" class="btn btn-primary" > + Add Users </a>
                    </div>
                </div>
                
            </div>
            
            <div class="card-body">
                <table id="myTable" class="table-primary">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>


                    </thead>
                    <tbody>
                        <?php $sno = 1;  foreach ($users as $val){ ?>
                        <tr>
                            <td>
                                <?= $sno; ?>
                            </td>
                            <td>
                                <?= $val['fname']; ?>
                            </td>
                            <td>
                                <?= $val['lname']; ?>
                            </td>
                            <td>
                                <?= $val['email']; ?>
                            </td>
                            <td>
                                <?= $val['created_at']; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="<?= base_url(); ?>update/<?= $val['id']; ?>" >
                                    Update
                                </a>
                                <a href="<?= base_url(); ?>del/<?= $val['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $sno++; }?> 
                        

                    </tbody>
                </table>
            </div>

        </div>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>