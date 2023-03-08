<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="card">
            <?php if(session()->getFlashdata('status')) { ?>
                <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                    <strong><?= session()->getFlashdata('status'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <div class="card-header">
                <h3 class="text-primary">Update Form Data</h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url(); ?>update" method="POST">
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?= $users['fname']; ?>">
                                
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $users['id']; ?>">
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?= $users['lname']; ?>">
                                
                            </div>    
                        </div>
    
                        <div class="col-lg-6 col-md-12">  
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $users['email']; ?>">
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">                        
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $users['password']; ?>">
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" value="<?= md5($users['password']); ?>">
                               
                            </div>                       
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary px-4" value="Submit">
                    </div>
                </form>
              
            </div>
        </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>