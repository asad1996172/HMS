		function checkpeople() {
            var check = document.getElementById('n.o.p').value;
            if (Number(check)>0) {
                document.getElementById("n.o.p").style.borderColor = '#A7FF00';
            }
            else {
                document.getElementById("n.o.p").style.borderColor = '#FF0013';
                document.getElementById("n.o.p").value = null;
            }
        }
        function checkFirstname() {
            var check = document.getElementById('firstname').value.match(/[0-9-!$ %^&*()+|~=`{}\[\]:";'<>?,.\/]/);
            if (check == null) {
                document.getElementById("firstname").style.borderColor = '#A7FF00';
            }
            else {
                document.getElementById("firstname").style.borderColor = '#FF0013';
                document.getElementById("firstname").value = null;
            }
        }

        function checkLastname() {
            var check = document.getElementById('lastname').value.match(/[0-9-!$ %^&*_()+|~=`{}\[\]:";'<>?,.\/]/);
            if (check == null) {
                document.getElementById("lastname").style.borderColor = '#A7FF00';
            }
            else {
                document.getElementById("lastname").style.borderColor = '#FF0013';
                document.getElementById("lastname").value = null;
            }
        }

        function checkPass() {
            var check = document.getElementById('password').value;
            if (check.length >= 6) {
                document.getElementById("password").style.borderColor = '#A7FF00';
            }
            else {
                document.getElementById("password").style.borderColor = '#FF0013';
                document.getElementById("password").value = null;
            }
        }


        function checkEmail() {

            var check = document.getElementById('emailaddress').value.match(/[!$ %^&*()+|~=`{}\[\]:";'<>?\/]/);
            if (check == null) {
                document.getElementById("emailaddress").style.borderColor = '#006314';
            }
            else {
                document.getElementById("emailaddress").style.borderColor = '#FF0013';
                document.getElementById("emailaddress").value = null;
            }
        }

        function confirm() {
            var a = document.getElementById('password').value;
            var b = document.getElementById('confirmpassword').value;
            if (a == b) {
                document.getElementById("password").style.borderColor = '#A7FF00';
                document.getElementById("confirmpassword").style.borderColor = '#A7FF00';
            }
            else {
                document.getElementById("password").style.borderColor = '#FF0013';
                document.getElementById("confirmpassword").value = null;
                document.getElementById("password").style.borderColor = '#FF0013';
                document.getElementById("confirmpassword").value = null;
            }
        }

