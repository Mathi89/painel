
const x = document.querySelector('#entrar'),
y = document.querySelector('#redefinir-email'),
yy = document.querySelector('#redefinir-senha'),
z = document.querySelector("#btn"),
entrarBtn = document.querySelector("#entrar-btn"),
redefinirEmailBtn = document.querySelector("#redefinir-email-btn"),
redefinirSenhaBtn = document.querySelector("#redefinir-senha-btn")

entrarBtn.addEventListener("click", async () => {
    entrar()
})

redefinirEmailBtn.addEventListener("click", async () => {
    redefinirEmail()
})

redefinirSenhaBtn.addEventListener("click", async () => {
    redefinirSenha()
})

function redefinirSenha() {
    x.style.left = "400px"
    y.style.left = "400px"
    yy.style.left = "50px"
    z.style.left = "35px"
    z.style.width = "125px"
}

function redefinirEmail() {
    x.style.left = "-400px"
    y.style.left = "50px"
    yy.style.left = "-400px"
    z.style.left = "214px"
    z.style.width = "125px"
}

function entrar() {
    x.style.left = "50px"
    y.style.left = "400px"
    yy.style.left = "-400px"
    z.style.left = "160px"
    z.style.width = "55px"
}

var url = window.location.href.split("=").pop();


    if(url == '0' ) {
        // Entrar
        entrarBtn.click()
    } else
    if(url == '1') {
        // Abrir Redefinir Email
        redefinirEmailBtn.click()
    } else 
    if(url == '2') {
        // Abrir Redefinir Senha
        redefinirSenhaBtn.click()
    } else{
        entrarBtn.click()
    }