<!-- <pre>
--- SESSION ----------------
<?php
print_r($_SESSION);
?>
--- POST ----------------
<?php
print_r($_POST);
?>
--- GET ----------------
<?php
print_r($_GET);
?>
</pre> -->
    </main>
    <footer style="border-top: 2px solid var(--bs-pink);background: #fff5f5;">
        <div class="container">
            <!-- Start: row -->
            <div class="row" style="padding: 10px;">
                <!-- Start: col -->
                <div class="d-xl-flex justify-content-xl-start align-items-xl-end col-lg-4" style="padding: -2px;">
                    <div class="d-flex justify-content-center"><img src="assets/img/logo%20square.png" style="width: 100px;height: 100px;"></div>
                    <div>
                        <h5 class="fw-semibold"><strong>โรงเรียนภูเขียว</strong></h5>
                        <p style="margin: 0;">เลขที่ 142 หมู่ที่ 4 ตำบลผักปัง อำเภอภูเขียว จังหวัดชัยภูมิ 36110</p>
                    </div>
                </div><!-- End: col -->
                <!-- Start: col -->
                <div class="col-lg-4" style="padding: -2px;">
                    <h5 class="fw-semibold">ทีมพัฒนา</h5>
                    <ul>
                        <li>นางสาวเพชรรัตน์ แก้วสมบัติ 5/2<br>Backend/Frontend</li>
                        <li>นางสาวดวงกมล กองพันธ์ 5/5<br>Backend/Frontend</li>
                        <li>นายมงคล ชนะดี<br>ที่ปรึกษา, UI/UX</li>
                    </ul>
                </div><!-- End: col -->
                <!-- Start: col -->
                <div class="col-lg-4">
                    <h5 class="fw-semibold">ลิงก์ที่เกี่ยวข้อง</h5>
                    <ul>
                        <li><a href="https://phukhieo.ac.th/">เว็บไซต์โรงเรียนภูเขียว</a></li>
                        <li><a href="https://regis.phukhieo.ac.th/">ระบบรับสมัครนักเรียน โรงเรียนภูเขียว</a></li>
                        <li><a href="https://www.facebook.com/phukhieo.ac.th">เพจโรงเรียนภูเขียว</a></li>
                    </ul>
                </div><!-- End: col -->
            </div><!-- End: row -->
        </div>
        <div style="background: var(--bs-gray-700);padding: 10px;color: var(--bs-white);">
            <!-- Start: Copyright -->
            <p class="text-center" style="margin: 0;padding: 0;">© 2023 PHUKHIEO SCHOOL ALL RIGHT RESERVED</p><!-- End: Copyright -->
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>
<?php
    session_write_close();
?>