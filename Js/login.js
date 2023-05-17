// validtion code for input 

var uname = document.forms['lform']['uname'];
var pass = document.forms['lform']['pass'];


var user_error = document.getElementById('user_error');
var pass_error = document.getElementById('pass_error');

 uname.addEventListener('textInput',user_verify);
 pass.addEventListener('textInput',pass_verify);

function validtion(){

    if(uname.value.length <8 ){

        uname.style.border ="1px solid red ";
        user_error.style.display ="block" ;
        uname.focus();
        return false ;
    }

    if(pass.value.length <8 ){

        pass.style.border ="1px solid red ";
        pass_error.style.display ="block" ;
        pass.focus();
        return false ;
    }
}

function user_verify() {

    if(uname.value.length >= 8){
        uname.style.border ="1px solid silver ";
        user_error.style.display ="none" ;
        return true ;

    }
}


function pass_verify() {

    if(pass.value.length >= 8){
        pass.style.border ="1px solid silver ";
        pass_error.style.display ="none" ;
        return true ;

    }
}

var m_error = document.getElementById('errors');

