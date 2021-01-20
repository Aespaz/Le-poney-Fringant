let app = new Vue ({
    el: '#app',
        data: {
            connected:false, // ont définit nos attribut ici
            pseudo:null,
            prenom:null,
            email:null,
            mail:null,
            password:null,
            passeword:null,
            nom:null,  
            numero:null,
            adresse:null,
            cp:null,
            ville:null,
        },
        mounted: function () {
            fetch('http://localhost:7000/Backend/connected.php')
                .then(response => response.json())
                .then((data) => {this.connected = data.connected; this.email = data.email});
          },
          methods: {
              submitForm(ev) {
                  ev.preventDefault();
                console.log("test");
                  let formParams = new URLSearchParams();
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
                    .then(data => {
                        this.connected = data.connected;
                        window.location = './membres.html';
                        console.log('succes !');
                    })
                    .catch(error => {
                        console.log('chat a pas marché :( cheh XD')
                        console.error(error)
                    });
                    //.then(response => window.location=response.url)
                   
                    
              },
                submitRegister(ev) {
                    ev.preventDefault();
                  console.log("ça marche?");
                    let formParams = new URLSearchParams();
                    formParams.append("pseudo", this.pseudo);
                    formParams.append("prenom", this.prenom);
                    formParams.append("mail", this.mail);
                    formParams.append("passeword", this.passeword);
                    formParams.append("nom", this.nom);
                    formParams.append("adresse", this.adresse);
                    formParams.append("numero", this.numero);
                    formParams.append("cp", this.cp);
                    formParams.append("ville", this.ville);
  
                    const requestOptions = {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: formParams
                    };
               
                    fetch('http://localhost:7000/Backend/register.php', requestOptions)
                      .then(response => response.json())
                      .then(data => (this.connected = data.connected));
                },
                
              disconnect(ev) {
                ev.preventDefault(); 
                fetch('http://localhost:7000/Backend/disconnect.php')
                this.login = null; 
                this.password = null; 
                this.connected = false; 
            }
          
        },
        
})
    
