<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card">
          <div class="card-header text-white bg-dark">
            Admin login
          </div>
          <div class="card-body">
            <form action="{{ url('/admin/login') }}" method="post" >
              @csrf 
              <div class="form-group mb-2">
                <label for="email">Enter Email</label>
                <input type="email" name="email" class="form-group">
              </div>
              <div class="form-group mb-2">
                <label for="password">Enter Password</label>
                <input type="password" name="password" class="form-group">
              </div>
              <input type="submit" class="btn btn-primary" value="Login">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>