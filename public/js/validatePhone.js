function validatePhoneNumber(str) {
    var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    let value = re.test(str);
    if (!value) {
        document.getElementById('phone_error').classList.remove('hidden');
    } else {
        document.getElementById('phone_error').classList.add('hidden');
    }
}

function checkPassword(str) {
    // console.log(str);
    let pwd = document.getElementById('pwd').value;
    let pwdCheck = str;

    if (!(pwd === pwdCheck)) {
        document.getElementById('password_error').classList.remove('hidden');
    } else {
        document.getElementById('password_error').classList.add('hidden');
    }
}