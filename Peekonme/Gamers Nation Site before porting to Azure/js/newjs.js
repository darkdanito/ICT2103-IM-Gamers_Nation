/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.addEventListener('load', init);

function init() {
    var pwd2Box = document.getElementById("pword2");
    pwd2Box.addEventListener("blur", checkpassword);
}

function checkpassword(){
    var pwd1Input = document.getElementById("pword1").value;
    var pwd2Box = document.getElementById("pword2");
    var pwd2Input = pwd2Box.value;
        if(pwd1Input !== pwd2Input){
            pwd2Box.setCustomValidity("Your Password did not match");
        } else {
            pwd2Box.setCustomValidity("");
        }
}