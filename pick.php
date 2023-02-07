<?php include('template_top.php'); ?>
<?php
// กันคนเข้าหน้าเลือกรายการโดยตรง
if (empty($_POST) or $_POST['agree'] != 'on') {
    echo '<script type="text/javascript"> window.location = "account.php" </script>';
    die();
} else {
    if (is_enable()) {
        // เปิดรับสมัคครไหม
        echo '<div class="container"><h4 class="mt-5 mb-5 text-center">อยู่ระหว่างปิดรับสมัคร</h4></div>';
        include('template_bottom.php');
        die();
    }

    $sql_student = "SELECT * FROM students WHERE sid = " . $_SESSION['sid'];;
    $query_student = mysqli_query($mysql, $sql_student);
    $student = mysqli_fetch_object($query_student);

    $sql_types = "SELECT * FROM `types` ORDER BY name DESC";
    $qurey_types = mysqli_query($mysql, $sql_types);
    // var_dump($student);
}
?>
<div class="container">
    <!-- Start: Title -->
    <div style="padding-top: 10px;">
        <h4>สมัครเรียนรอบโควตา</h4>
        <div><span><?php echo $student->prefix . $student->f_name . " " . $student->l_name; ?></span> <span>เกรดเฉลี่ย : </span class="text-danger">5 เทอม <span class="text-danger"><?php echo $student->GPAX; ?></span>, คณิต <span class="text-danger"><?php echo $student->GPA_MAT; ?></span>, วิทย์ <span class="text-danger"><?php echo $student->GPA_SCI; ?></span> <span>ติด 0 ร มส มผ : </span> <?php echo ($student->ungrade == 0) ? '<span class="badge bg-success">ไม่มี</span>' : '<span class="badge bg-danger">มี</span>'; ?></div>

        <div><span>กรุณา<strong>เลือกแผนการเรียน</strong>ที่ต้องการสมัคร</span></div>
        <hr>
    </div><!-- End: Title -->
    <!-- Start: Row -->
    <div class="row">
        <?php
        $count = 0;
        while ($row = mysqli_fetch_object($qurey_types)) {
            // ถ้าต้องตรวจคุณสมบัติผู้สมัคร
            if ($row->allow_not_meet_req == 0) {
                // เช็กว่าเกรด 3 ตัวผ่านเงื่อนไขไหม
                if ($student->GPAX < $row->min_GPAX or $student->GPA_SCI < $row->min_GPA_SCI or $student->GPA_MAT < $row->min_GPA_MAT) {
                    continue; // ข้ามลูปนี้
                }

                // ถ้าไม่ให้นักเรียนที่ติด 0 ร มผ สมัคร และ นักเรียนคนนี้ติด
                if ($row->allow_ungrade == 0 and $student->ungrade == 1) {
                    continue; // ข้ามลูปนี้
                }
            }
            $count++;
        ?>
            <!-- Start: col -->
            <div data-aos="fade-up" class="col-md-6 col-lg-4 mt-1 mb-3">
                <div class="card" style="box-shadow: 5px 5px #ffbddb;min-height: 300px;border-radius: 0px;border: 2px solid rgb(0,0,0);"><img class="card-img-top w-100 d-block" src="assets/img/default%20image.jpg">
                    <div class="card-body d-xl-flex align-items-xl-end">
                        <div style="width: 100%;">
                            <h5><?php echo $row->name ?></h5>
                            <hr style="margin: 5px 0px;"><!-- Start: Req -->
                            <div>
                                <p class="fw-semibold" style="margin: 0;">คุณสมบัติ</p>
                                <ul style="margin-bottom: 10px;">
                                    <?php echo ($row->min_GPAX > 0 ? "<li>GPAX ตั้งแต่ " . $row->min_GPAX . "</li>" : ""); ?>
                                    <?php echo ($row->min_GPA_SCI > 0 ? "<li>GPA วิชาคณิตศาสตร์ ตั้งแต่ " . $row->min_GPA_SCI . "</li>" : "")  ?>
                                    <?php echo ($row->min_GPA_MAT > 0 ? "<li>GPA วิชาคณิตศาสตร์ ตั้งแต่ " . $row->min_GPA_MAT . "</li>" : "") ?>
                                    <?php echo ($row->allow_ungrade == 0 ? "<li>ต้องไม่มีผลการเรียน ติด 0 ร มส มผ</li>" : ""); ?>
                                </ul>
                            </div><!-- End: Req -->
                            <!-- Start: Bottom -->


                            <div class="text-end">
                                <form action="submit.php" method="post" enctype="multipart/form-data"><input class="form-control" type="hidden" name="type" value="<?php echo $row->code; ?>"><button class="btn btn-primary" type="submit" onclick="if (prompt('พิมพ์ <?php echo $row->code; ?> เพื่อสมัครแผนการเรียน <?php echo $row->name; ?>') == '<?php echo $row->code; ?>') return true; else return false;"><i class="far fa-edit"></i>&nbsp;สมัคร</button></form>
                            </div><!-- End: Bottom -->
                        </div>
                    </div>
                </div>
            </div><!-- End: col -->
        <?php } ?>
    </div><!-- End: Row -->
    <?php
    if ($count == 0) {
    ?>
        <!-- Start: Flex -->
        <div class="d-flex d-xl-flex flex-row justify-content-around flex-wrap pt-2 pb-4" style="padding-bottom: 10px;">
            <div class="text-center" data-aos="zoom-in">
                <p>ไม่พบแผนการเรียนที่สามารถสมัครได้</p><i class="far fa-sad-tear" style="font-size: 102px;"></i>
            </div>
        </div><!-- End: Flex -->
    <?php
    }
    ?>
</div>
<?php include('template_bottom.php'); ?>