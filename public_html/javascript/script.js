// function teste() {
//     let user;
//     let senha;
//     let btnLogin = document.getElementById('login');

//     function setUser() {
//         user = document.getElementById('user').value = 'usuario';
//         senha = document.getElementById('senha').value = '123';
//     }

//     this.loginSucess = loginSucess;
//     function loginSucess() {
//         window.open('sucess_page.html',"_self");

//         //btnLogin.click('sucess_page.html');
//         //document.open('sucess_page.html');

//     }

// }

// <!-- inicio script para o popup -->
$ = function (id) {
  return document.getElementById(id);
};

var show = function (id) {
  $(id).style.display = "block";
};
var hide = function (id) {
  $(id).style.display = "none";
};
// <!-- fim script para o popup -->
