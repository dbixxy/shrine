<!--=============================================
                  Login part start
    ==============================================-->
    <section id="claim_part" class="client_bg client_bg2 sign_form_part login_form_part" style="padding-top: 0px; padding-left: 30px; padding-right:30px;">
        <!--
        <div class="container">
            <div class="row flow_sha text-center d-none d-md-block">
                <div class="col-lg-12">
                    <div class="game_flow about_game game_page about_flow2">
                        <div class="row m-0">
                            <div class="col-md-4 border_shadow">
                                <div class="game_text">
                                    <h2><span>0</span><span>1</span></h2>
                                    <h3>Register</h3>
                                    <p>Download the app and signup for account</p>
                                </div>
                            </div>
                            <div class="col-md-4 border_shadow">
                                <div class="game_text">
                                    <h2>02</h2>
                                    <h3>Get Ready</h3>
                                    <p>Deposit &amp; get ready for play betting</p>
                                </div>
                            </div>
                            <div class="col-md-4 border_shadow">
                                <div class="game_text">
                                    <h2>03</h2>
                                    <h3>Enjoy</h3>
                                    <p>Betting more and more &amp; enjoy game</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flow_sha text-center d-md-none">
                <div class="col-lg-12">
                    <div class="game_flow about_flow game_page_flow">
                        <div class="row flow_slider">
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2><span>0</span><span>1</span></h2>
                                    <h3>Register</h3>
                                    <p>Download the app and signup for account</p>
                                </div>
                            </div>
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2>02</h2>
                                    <h3>Get Ready</h3>
                                    <p>Deposit &amp; get ready for play betting</p>
                                </div>
                            </div>
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2>03</h2>
                                    <h3>Enjoy</h3>
                                    <p>Betting more and more &amp; enjoy game</p>
                                </div>
                            </div>
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2><span>0</span><span>1</span></h2>
                                    <h3>Register</h3>
                                    <p>Download the app and signup for account</p>
                                </div>
                            </div>
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2>02</h2>
                                    <h3>Get Ready</h3>
                                    <p>Deposit &amp; get ready for play betting</p>
                                </div>
                            </div>
                            <div class="col-lg-12 border_shadow">
                                <div class="game_text">
                                    <h2>03</h2>
                                    <h3>Enjoy</h3>
                                    <p>Betting more and more &amp; enjoy game</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->
            <div class="row signup_form_pad log_form_pad" style="margin-top: 0px; padding-top: 0px; padding-left: 30px; padding-right:30px;">
                <div class="col-lg-7 offset-lg-5" style="margin-top: 0px;padding-top: 0px;">
                    <div class="main_signup login_main">
                        <h2 style="color: red;"><?php echo $msg; ?></h2>
                        <!-- <h4>เข้าสู่ระบบ</h4> -->
                        <form method="POST" action="<?php echo base_url(); ?>Login/process">
                            <div class="signup_inner log_inner">
                                <div class="sign_input_inner">
                                    <input type="text" name="username" placeholder="โปรดระบุชื่อผู้ใช้งาน">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="sign_input_inner">
                                    <input type="password" name="password" placeholder="โปรดระบุรหัสผ่าน">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <button type="submit">เข้าสู่ระบบ</button>
                                <a href="<?php echo base_url(); ?>Login/forget_password">ลืมรหัสผ่าน</a>
                                <p class="log_acc_yet">ยังไม่ได้เป็นสมาชิก? <a href="<?php echo base_url(); ?>Login/signup">สมัครสมาชิก</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=============================================
                    Login part end
    ===========================================   -->