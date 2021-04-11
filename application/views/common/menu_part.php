
    <!--=============================================
                    Menu part start
    ===========================================   -->
    <nav class="navbar navbar-expand-md menu_head">
        <div class="container p-md-0">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo_bigbonus_2.png" alt="menu_logo" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse main_menu" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>Home">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>Home/about">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>Home/promotion">โปรโมชัน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>Home/game">เกมส์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>Home/membership">จัดการสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>Home/contact">ติดต่อเรา</a>
                    </li>
                </ul>
                <?php   
                    if((!isset($session_validated)) || (empty($session_validated)) || (!$session_validated)){
                ?>

                        <a href="<?php echo base_url(); ?>Login/signup">สมัครสมาชิก</a>
                        <a href="<?php echo base_url(); ?>Login">เข้าสู่ระบบ</a>
                <?php
                    }
                    else{
                ?>
                        <a href="<?php echo base_url(); ?>Login/logout">ออกจากระบบ</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>
    <!--=============================================
                    Menu part end
    ==============================================-->