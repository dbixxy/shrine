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
        
        if(document.getElementById("txt_password").value == ""){
            valid = false;
            document.getElementById("txt_password").focus();
        }
        
        if(!valid){
            alert("โปรดกรอกข้อมูลให้ครบถ้วน");
        }

        if(!check_password()){
            valid = false;
            alert("รหัสผ่านไม่ตรงกัน");
        }

        if(valid){
            document.getElementById("form_recovery").submit();
        }
    }


</script>