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
                <a class="nav-link" href="/html/Prueba" aria-current="page">
                  Sign In
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link active">
                  Register 
                </a>
              </li>
            </ul>
        </div>
      </nav>
    <div class="mt-5" align="center">
      <div class="col-5" >
        <h4>Register</h4>
        <div id="alert" role="alert"> </div>
        <input name="name" required class="mt-2 mb-2 form form-control" id="name" placeholder="Name"/>
        <input type="number" name-"age" required class="mb-2 form-control" id="age" placeholder="Age"/>
        <input type="email" name="email" required class="mb-2 form-control" id="email" placeholder="Email"/>
        <input type="password" name="pass" required class="mb-2 form-control" id="pass" placeholder="Password"/>
        <input type="password" name="ver-pass" required class="mb-2 form-control" id="ver-pass" placeholder="Verify password">
        <button id="register" class="btn btn-primary" type="submit">Register</button>
      </div>
    </div>
  </div>

  <script>
    const checkData = (e) => {
      const verPass = document.querySelector('#ver-pass');

      if (document.querySelector('#pass').value!==verPass.value){
        const alert = document.querySelector('#alert');
        alert.classList.add('alert alert-primary');
        alert.innerHTML = 'Password is not the same';
        verPass.focus();
      }

      const body = {
        name: document.querySelector('#name').value,
        email: document.querySelector('#age').value,
        pass: document.querySelector('#pass').value,
        action: 'register'
      }
      
      fetch('Control.php', { 
        method: 'post',
        body: JSON.stringify(body)
      }).then((data)=> {
          data.json()})
        .then((data)=> {
          const alert = document.querySelector('#alert');
          alert.classList.add('alert alert-primary');
          alert.innerHTML = data.msg;
          setTimeout(()=> {
            window.location.href = "/Prueba";
          }, 2000)
        }).catch( error => console.log(error));
    }

    window.onload = () => {
      const form = document.querySelector('#register');
      form.addEventListener('click', checkData);
  }
    
  </script>

</body>
</html>
