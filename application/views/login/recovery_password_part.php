<!--=============================================
                  Recovery part start
    ==============================================-->
    <section id="recovery_part" class="client_bg client_bg2 sign_form_part login_form_part" style="padding-top: 0px; padding-left: 30px; padding-right:30px;">
            <div class="row signup_form_pad log_form_pad" style="margin-top: 0px; padding-top: 0px; padding-left: 30px; padding-right:30px;">
                <div class="col-lg-7 offset-lg-5" style="margin-top: 0px;padding-top: 0px;">
                    <div class="main_signup login_main">
                        <h4>กำหนดรหัสผ่านใหม่</h4>
                        <form id="form_recovery" method="POST" action="<?php echo base_url(); ?>Login/recovery_password_do">
                            <div class="signup_inner log_inner">
                            <div class="sign_input_inner">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <input type="password" id="txt_password" name="password" id="txt_password" placeholder="โปรดระบุรหัสผ่าน" required>
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="sign_input_inner">
                                    <input type="password" id="txt_repassword" placeholder="โปรดกรอกรหัสผ่านอีกครั้ง" required>
                                    <i class="fas fa-lock"></i>
                                </div>
                                <button type="button" onclick="valid_data()">แก้รหัสผ่าน</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=============================================
                    Recovery part end
    ===========================================   -->


    