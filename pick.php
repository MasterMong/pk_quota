<?php include('template_top.php'); ?>
    <div class="container">
        <!-- Start: Title -->
        <div style="padding-top: 10px;">
            <h4>สมัครเรียนรอบโควตา</h4>
            <div><span>กรุณา<strong>เลือกแผนการเรียน</strong>ที่ต้องการสมัคร</span></div>
            <hr>
        </div><!-- End: Title -->
        <!-- Start: Row -->
        <div class="row">
            <!-- Start: col -->
            <div data-aos="fade-up" class="col-md-6 col-lg-4 mt-2">
                <div class="card" style="box-shadow: 5px 5px #ffbddb;min-height: 300px;border-radius: 0px;border: 2px solid rgb(0,0,0);"><img class="card-img-top w-100 d-block" src="assets/img/default%20image.jpg">
                    <div class="card-body d-xl-flex align-items-xl-end">
                        <div style="width: 100%;">
                            <h5>วิทยาศาสตร์ – คณิตศาสตร์</h5>
                            <hr style="margin: 5px 0px;"><!-- Start: Req -->
                            <div>
                                <p class="fw-semibold" style="margin: 0;">คุณสมบัติ</p>
                                <ul style="margin-bottom: 10px;">
                                    <li>เกรดรวม อย่างน้อย 2.75 </li>
                                    <li>เกรดคณิต อย่างน้อย 2.50 </li>
                                    <li>เกรดวิทย์ อย่างน้อย 2.50 </li>
                                    <li>ไม่มี 0 ร มส มผ</li>
                                </ul>
                            </div><!-- End: Req -->
                            <!-- Start: Bottom -->
                            <div class="text-end">
                                <form action="submit.php" method="post" enctype="multipart/form-data"><input class="form-control" type="hidden" name="type" value="sci"><button class="btn btn-primary" type="submit" onclick="if (prompt(&#39;พิมพ์ sci เพื่อสมัครแผนการเรียน วิทยาศาสตร์ – คณิตศาสตร์&#39;) == &#39;sci&#39;) return true; else return false;"><i class="far fa-edit"></i>&nbsp;สมัคร</button></form>
                            </div><!-- End: Bottom -->
                        </div>
                    </div>
                </div>
            </div><!-- End: col -->
            <!-- Start: col -->
            <div data-aos="fade-up" class="col-md-6 col-lg-4 mt-2">
                <div class="card" style="box-shadow: 5px 5px #ffbddb;min-height: 300px;border-radius: 0px;border: 2px solid rgb(0,0,0);"><img class="card-img-top w-100 d-block" src="assets/img/default%20image.jpg">
                    <div class="card-body d-xl-flex align-items-xl-end">
                        <div style="width: 100%;">
                            <h5>ภาษาอังกฤษ – คณิตศาสตร์</h5>
                            <hr style="margin: 5px 0px;"><!-- Start: Req -->
                            <div>
                                <p class="fw-semibold" style="margin: 0;">คุณสมบัติ</p>
                                <ul style="margin-bottom: 10px;">
                                    <li>ไม่มี 0 ร มส มผ</li>
                                </ul>
                            </div><!-- End: Req -->
                            <!-- Start: Bottom -->
                            <div class="text-end">
                                <form action="submit.php" method="post" enctype="multipart/form-data"><input class="form-control" type="hidden" name="type" value="eng"><button class="btn btn-primary" type="submit" onclick="if (prompt(&#39;พิมพ์ eng เพื่อสมัครแผนการเรียน ภาษาอังกฤษ – คณิตศาสตร์&#39;) == &#39;eng&#39;) return true; else return false;"><i class="far fa-edit"></i>&nbsp;สมัคร</button></form>
                            </div><!-- End: Bottom -->
                        </div>
                    </div>
                </div>
            </div><!-- End: col -->
            <!-- Start: col -->
            <div data-aos="fade-up" class="col-md-6 col-lg-4 mt-2">
                <div class="card" style="box-shadow: 5px 5px #ffbddb;min-height: 300px;border-radius: 0px;border: 2px solid rgb(0,0,0);"><img class="card-img-top w-100 d-block" src="assets/img/default%20image.jpg">
                    <div class="card-body d-xl-flex align-items-xl-end">
                        <div style="width: 100%;">
                            <h5>การจัดการธุรกิจการค้าสมัยใหม่ MOU CP ALL </h5>
                            <hr style="margin: 5px 0px;"><!-- Start: Req -->
                            <div>
                                <p class="fw-semibold" style="margin: 0;">คุณสมบัติ</p>
                                <ul style="margin-bottom: 10px;">
                                    <li>ไม่มี 0 ร มส มผ</li>
                                </ul>
                            </div><!-- End: Req -->
                            <!-- Start: Bottom -->
                            <div class="text-end">
                                <form action="submit.php" method="post" enctype="multipart/form-data"><input class="form-control" type="hidden" name="type" value="cp"><button class="btn btn-primary" type="submit" onclick="if (prompt(&#39;พิมพ์ mou เพื่อสมัครการจัดการธุรกิจการค้าสมัยใหม่ MOU CP ALL&#39;) == &#39;mou&#39;) return true; else return false;"><i class="far fa-edit"></i>&nbsp;สมัคร</button></form>
                            </div><!-- End: Bottom -->
                        </div>
                    </div>
                </div>
            </div><!-- End: col -->
        </div><!-- End: Row -->
        <!-- Start: Flex -->
        <div class="d-flex d-xl-flex flex-row justify-content-around flex-wrap pt-2" style="padding-bottom: 10px;">
            <div class="text-center" data-aos="zoom-in">
                <p>ไม่พบรายการที่สามารถสมัครได้</p><i class="far fa-sad-tear" style="font-size: 102px;"></i>
            </div>
        </div><!-- End: Flex -->
    </div>
<?php include('template_bottom.php'); ?>