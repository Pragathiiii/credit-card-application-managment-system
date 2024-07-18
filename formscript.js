

function validate()
            {
                var textphonepattern=/^[0-9]{10}$/;
                var tphone=document.forms["regform"]["phone"].value;
                if(tphone.search(textphonepattern)==-1)
                {
                    document.getElementById("phoneresult").innerHTML="Phone number should contain only digits and minimum10";
                    return false;
                }

                var regEmail=/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
                        }
        
    
   
    
            document.getElementById("cpassword").addEventListener("blur",function(){

                var npassword=document.getElementById("password").value;
                var cpassword=document.getElementById("cpassword").value;
                if(npassword!=cpassword)
                {
                    var msg="New password and confirm password do not match";
                    document.getElementById("result").innerHTML=msg;
                    document.getElementById("btn").disabled=true;
                }
                else
                {

                document.getElementById("btn").disabled=false;
                document.getElementById("result").innerHTML="";
                    
                }
            });
            
   
        