<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v4.1.1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>LOGIN | IDE RESTO</title>
  </head>

  <body class="bg-img">
    <form class="form-signin akun" method="POST" action="cek_login.php">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">LOGIN</h1>
      </div>

      <div class="form-label-group baris">
        <div class="row">
          <div class="col-1">
              <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="no" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>            
          </div>
          <div class="col-11">
            <input type="text" class="form-control trans" name="username" placeholder="Username" required autofocus>
          </div>
        </div>
      </div>
      
      <div class="form-label-group baris">
        <div class="row">
          <div class="col-1">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
              <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
            </svg>        
          </div>
          <div class="col-11">
          <input type="password" class="form-control trans" name="password" placeholder="Password" required>
          </div>
        </div>  
      </div>
      
      <div class="form-label-group baris">
        <div class="row">
          <div class="col-1">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>        
          </div>
          <div class="col-11">
            <select class="form-control trans" name="level">
              <option value="Kasir">Kasir</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
        </div>  

      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; IDE RESTO |<?= date('d-m-Y')?></p>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>