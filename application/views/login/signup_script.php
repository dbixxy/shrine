<script>

    function check_password(){
        var pass = document.getElementById("txt_password").value;
        var repass = document.getElementById("txt_repassword").value;
        if(pass!=repass){
            return false;
        }else{
            return true;
        }
    }

    function valid_data(){
        var valid = true;
        if(document.getElementById("txt_username").value == ""){
            valid = false;
            document.getElementById("txt_username").focus();
        }
        if(document.getElementById("txt_user_email").value == ""){
            valid = false;
            document.getElementById("txt_user_email").focus();
        }
        if(document.getElementById("txt_password").value == ""){
            valid = false;
            document.getElementById("txt_password").focus();
        }
        
        if(!valid){
            alert("โปรดกรอกข้อมูลให้ครบถ้วน");
        }

        if(!vilidate_email(document.getElementById("txt_user_email").value)){
            valid = false;
            alert("อีเมลไม่ถูกต้อง");
        }
        if(!check_password()){
            valid = false;
            alert("รหัสผ่านไม่ตรงกัน");
        }

        if(valid){
            document.getElementById("form_signup").submit();
        }
    }

    function vilidate_email(inputText)
    {
        //var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+.(?:\.[a-zA-Z0-9-]+)*$/;
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        //if(inputText.value.match(mailformat))
        if(re.test(String(inputText).toLowerCase()))
        {
            // alert("Valid email address!");
            // document.form1.text1.focus();
            return true;
        }
        else
        {
            // alert("You have entered an invalid email address!");
            // document.form1.text1.focus();
            return false;
        }
    }


</script>