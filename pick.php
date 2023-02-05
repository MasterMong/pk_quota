<?php include('template_top.php'); ?>
<?php
if (empty($_POST) or $_POST['agree'] != 'on') {
    header('Location:account.php');
} else {
    if ($settings['is_enable'] == 0) {
        echo '<div class="container"><h4 class="mt-5 mb-5 text-center">อยู่ระหว่างปิดรับสมัคร</h4></div>';
        include('template_bottom.php');
        die();
    }
    $sid = $_SESSION['sid'];
    $sql = "SELECT * FROM types ORDER BY `name` DESC";
    $types = query($sql);

    $sql = "SELECT `sid`, `room`, `no`, `prefix`, `f_name`, `l_name`, `GPAX`, `GAP_MAT`, `GPA_SCI`, `ungrade`, `type_code`  FROM students
    WHERE `sid` = $sid";
    $student = mysqli_fetch_object(query($sql));
    $count = 0;
}
?>
<div class="container">
    <!-- Start: Title -->
    <div style="padding-top: 10px;">
        <h4>สมัครเรียนรอบโควตา</h4>
        <div><span>กรุณา<strong>เลือกแผนการเรียน</strong>ที่ต้องการสมัคร</span></div>
        <hr>
    </div><!-- End: Title -->
    <!-- Start: Row -->
    <div class="row">
        <?php
        while ($row = mysqli_fetch_object($types)) { ?>
            <?php
            // Check if meet the requirements
            if ($student->GPAX >= $row->min_GPAX and $student->GAP_MAT >= $row->min_GPA_MAT and $student->GPA_SCI >= $row->min_GPA_SCI) {
                // Check if not allow ungraduated students AND students ungraduated
                if ($row->allow_ungrade == 0 and $student->ungrade == 1) {
                    break;
                }
            ?>
                <!-- Start: col -->
                <div data-aos="fade-up" class="col-md-6 col-lg-4 mt-2">
                    <div class="card" style="box-shadow: 5px 5px #ffbddb;min-height: 300px;border-radius: 0px;border: 2px solid rgb(0,0,0);"><img class="card-img-top w-100 d-block" src="assets/img/<?php echo $row->img_cover; ?>">
                        <div class="card-body d-xl-flex align-items-xl-end">
                            <div style="width: 100%;">
                                <h5><?php echo $row->name; ?></h5>
                                <hr style="margin: 5px 0px;"><!-- Start: Req -->
                                <div>
                                    <p class="fw-semibold" style="margin: 0;">คุณสมบัติ</p>
                                    <ul style="margin-bottom: 10px;">
                                        <?php echo ($row->min_GPAX != 0) ? "<li>เกรดรวม อย่างน้อย "  . $row->min_GPAX . " </li>" : ""; ?>
                                        <?php echo ($row->min_GPA_MAT != 0) ? "<li>เกรดคณิต อย่างน้อย "  . $row->min_GPA_MAT . " </li>" : ""; ?>
                                        <?php echo ($row->min_GPA_SCI != 0) ? "<li>เกรดวิทย์ อย่างน้อย "  . $row->min_GPA_SCI . " </li>" : ""; ?>
                                        <?php echo ($row->allow_ungrade != 0) ? "" : "<li>ไม่มี 0 ร มส มผ</li>"; ?>
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
            <?php
                $count++;
            }
            ?>
        <?php } ?>
    </div><!-- End: Row -->
    <?php if ($count == 0) { ?>
        <!-- Start: Flex -->
        <div class="d-flex d-xl-flex flex-row justify-content-around flex-wrap pt-2" style="padding-bottom: 10px;">
            <div class="text-center" data-aos="zoom-in">
                <p>ไม่พบรายการที่สามารถสมัครได้</p><i class="far fa-sad-tear" style="font-size: 102px;"></i>
            </div>
        </div><!-- End: Flex -->
    <?php } ?>
</div>
<?php include('template_bottom.php'); ?>