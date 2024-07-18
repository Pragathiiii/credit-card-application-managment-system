<html>

<head>
    <title>form sample</title>

    <script>
        function validate() {
            var textphonepattern = /^[0-9]{10}$/;
            var tphone = document.forms["regform"]["phone"].value;
            if (tphone.search(textphonepattern) == -1) {
                document.getElementById("phoneresult").innerHTML = "Phone number should contain only digits and minimum10";
                return false;
            }

            // var regEmail=/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
        }
    </script>

</head>

<body>


    <form action="" method="POST" name="regform" onsubmit=" return validate()">

        <table border=1 align="center">


            <tr>

                <td><input type="text" name="uname" id="uname" placeholder="Enter your Fullname" required autofocus> </td>

                <td> <input type="text" name="phone" id="phone" placeholder="Phone No" maxlength="10" required size="10"> </td>
                <p id="phoneresult" style="color:tomato;"></p>
            </tr>
            <tr>
                <td><input type="password" name="password" id="password" placeholder="Enter your Password" required></td>

                <td><input type="password" name="cpassword" id="cpassword" placeholder="Confirm your Password" required></td>
                <p id="result" style="color: tomato;">

                </p>
            </tr>

            <tr>
                <td><button name="submit" id="submit" onsubmit="check('submitted!')">Submit</button>
                </td>
            </tr>
        </table>
        <div id="result">

        </div>
    </form>
    <script>
        document.getElementById("cpassword").addEventListener("blur", function() {

            var npassword = document.getElementById("password").value;
            var ccpassword = document.getElementById("cpassword").value;
            if (npassword != ccpassword) {
                var msg = "New password and confirm password do not match";
                document.getElementById("result").innerHTML = msg;
                document.getElementById("submit").disabled = true;
            } else {

                document.getElementById("submit").disabled = false;
                document.getElementById("result").innerHTML = "";

            }

            // alert("ok");
        });
    </script>
</body>

</html>