function validacionForm() {
    // alert('hello world');
    var email_name=document.getElementsByTagName('label')[0];
    var psw_name=document.getElementsByTagName('label')[1];
    var email=document.getElementById('email').value;
    var password=document.getElementById('psswd').value;   
    var submit=document.getElementById('submit');
    var msg=document.getElementById('message');
    if (email=='' && password=='') {
        document.getElementById('psswd').style.borderColor= "red";
        document.getElementById('email').style.borderColor= "red";
        submit.style.border="blue solid 2px";
        email_name.style.color="red";
        psw_name.style.color="red";
        return false;
    }else if (email=='' && password != '') {
        document.getElementById('psswd').style.borderColor= "black";
        document.getElementById('email').style.borderColor= "red";
        submit.style.border="blue solid 2px";
        email_name.style.color="red";
        psw_name.style.color="black";
        return false;
    }else if (password=='' && email != ''){
        document.getElementById('email').style.borderColor= "black";
        document.getElementById('psswd').style.borderColor= "red";
        submit.style.border="blue solid 2px";
        email_name.style.color="black";
        psw_name.style.color="red";
        return false;
    }else {
        return true;
    }
}