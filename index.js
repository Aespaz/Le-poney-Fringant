let app = new vue({
    el:'#app',
        data:{
            pseudo:NULL,
            email: NULL,
            password:NULL

        },
        mounted: function () {
            fetch('http://localhost:8080/backend/connected.php')
                .then(response => response.json())
                .then((data) => {this.connected = data.connected; this.pseudo = data.pseudo});
          },
          methode:{
              submit(ev) {
                  ev.preventDefault();

                  let formParams = new URLSearchParams();
                  formParams.append("pseudo", this.pseudo);
                  formParams.append("email", this.email);
                  formParams.append("password", this.password);

                  const requestOptions = {
                      method: "POST",
                      headers: {
                          'Content-Type': 'application/x-www-form-urlencoded'
                      },
                      body: formParams
                  };

                  fetch('http://localhost:7000/Backend/Auth.php', requestOptions)
                    .then(response => response.json())
                    .then(data => (this.connecter = data.connected));
              }
          }
})
    
