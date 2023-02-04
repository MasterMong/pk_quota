<?php include('template_top.php'); ?>
    <div class="container">
        <!-- Start: Title -->
        <div style="padding-top: 10px;">
            <h4>ข้อมูลผู้สมัคร</h4>
            <div><span>ชื่อ - สกุล :&nbsp;</span><span>...</span></div>
            <div><span>ชั้น :&nbsp;</span><span>...</span></div>
            <div><span>รหัสนักเรียน :&nbsp;</span><span>...</span></div>
            <div><span>เกรดเฉลี่ย 5 เทอม :&nbsp;</span><span>3.00</span></div>
            <div><span>ติด&nbsp;0 ร มส มผ :&nbsp;</span><span class="badge bg-success">ไม่มี</span><span class="badge bg-danger">มี</span></div>
            <hr>
        </div><!-- End: Title -->
        <!-- Start: Intro -->
        <div>
            <h4>แนวปฏิบัติและข้อควรทราบ</h4>
            <p>.ในการสมัครเรียน (รอบโควตา) สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 3 โรงเรียนภูเขียว มีแนวปฏิบัติและข้อควรทราบ ดังนี้</p>
            <ul>
                <li>มีแผนการเรียนให้สมัครทั้งสิ้น 3 แผนการเรียน ดังนี้<ol>
                        <li>แผนการเรียนวิทยาศาสตร์ – คณิตศาสตร์</li>
                        <li>แผนการเรียนภาษาอังกฤษ – คณิตศาสตร์</li>
                        <li>แผนการเรียนการจัดการธุรกิจการค้าสมัยใหม่ : MOU CP ALL</li>
                    </ol>
                </li>
                <li>นักเรียน<strong><span style="color: rgb(255, 0, 0);">สามารถสมัครได้เพียง 1 แผนการเรียน</span></strong></li>
                <li>หากต้องการเปลี่ยนแปลงแผนการเรียนที่สมัครนักเรียนจะต้องส่งแบบฟอร์ม <a href="https://drive.google.com/file/d/17p5Unp99m6RwB53ny6BSSKGPxJb9n6fU/view?usp=sharing" target="_blank">นร.01.1</a>&nbsp;ที่ห้องวิชาการ โรงเรียนภูเขียว</li>
            </ul>
            <form method="get" action="pick.html">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1" name="agree" required=""><label class="form-check-label" for="formCheck-1">ข้าพเจ้ารับทราบข้อกำหนดและเงื่อนไขการสมัครเรียนรอบโควตาโรงเรียนภูเขียวดังที่ปรากฏด้านบนเรียนร้อยแล้ว</label></div>
                <div class="text-center" style="margin: 10px;"><button class="btn btn-primary" type="submit"><i class="far fa-edit"></i>&nbsp;สมัครเลย</button></div>
            </form>
        </div><!-- End: Intro -->
        <!-- Start: Enroll -->
        <div>
            <h4>แผนการเรียนที่สมัคร</h4>
            <p style="margin: 0;">ชื่อแผนการเรียนที่สมัคร</p>
            <p>หากต้องการเปลี่ยนแปลงแผนการเรียนให้นักเรียนส่งแบบฟอร์ม&nbsp;<a href="https://drive.google.com/file/d/17p5Unp99m6RwB53ny6BSSKGPxJb9n6fU/view?usp=sharing" target="_blank">นร.01.1</a>&nbsp;ที่ห้องวิชาการ โรงเรียนภูเขียว</p>
        </div><!-- End: Enroll -->
    </div>
<?php include('template_bottom.php'); ?>