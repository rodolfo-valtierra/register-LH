<html>
  <header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  </header>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page">
                  Sign In
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="register.php">
                  Register 
                </a>
              </li>
            </ul>
        </div>
      </nav>
    <div class="mt-5" align="center" >
      <div class="col-5">
      <div id="alert" role="alert" ></div>
      <input id="email" type="email" required class="form-control" placeholder="email" >
      <input id="pass" type="password" required class="form-control" placeholder="password" >
      <button id="signin" class="btn btn-primary" >Sign in</button>
      </div>
    </div>
  </div>

  <script>
    const checkSingin = (e) => {
      const select = document.querySelector;
      const alert = select('#alert'); 

      const body = {
        email: select('#email'),
        pass: select('#pass')
        action: 'signin'
      }
      
      fetch('Control.php', {
        method: 'post',
        body
      }).then((data) => data.json())
        .then((data)=> {
          if (data.status=='ok'){
            window.sessionStorage.name = data.name;
            window.sessionStorage.email = data.email;
          } else {
            alert.classList.add('alert alert-danger');
            alert.innerHTML = data.msg;
            select('#email').focus();
          }
        })
  }

    window.onLoad = () => {

      const submit = document.querySelector('#signin');
      submit.addEventListener('onclick', checkSingin);
    } 
  </script>

</body>
</html>
