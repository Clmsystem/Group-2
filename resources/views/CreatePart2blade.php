@include('header.menu')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mitr&display=swap');

    .newFont {
        font-family: 'Mitr', sans-serif;
    }

    .button-position {
        float: right;
        margin: -8px;
    }
</style>




<body>

    @include('partials.navbar')
    @include('partials.sidebar')


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="newFont"> ฝ่ายส่งเสริมการเรียนรู้และให้บริการการศึกษา ศูนย์บรรณสารและสื่อการศึกษา </h3>
            </div>
            <!-- สร้างตัวชี้วัก start -->

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="newFont">สร้างตัวชี้วัด</h3><br>
                        <hr><br>
                        <!-- <p class="card-description"> Basic form elements </p> -->
                        <form class="forms-sample">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="newFont">หัวข้อ</label>
                                    <input type="text" class="form-control" placeholder="หัวข้อตัวขี้วัด" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="newFont">ผู้รับผิดชอบ</label>
                                    <select class="form-control">
                                        <optgroup class="newFont">
                                            <option>เลือกผู้รับผิดชอบ</option>
                                            <option>ทีมดูแลเพจ</option>
                                            <option>พิชัยยุทธ</option>
                                            <option>ชื่นณัสฐา</option>
                                            <option>กิตติพร</option>
                                            <option>สุวัฒน์</option>
                                            <option>สันถัต</option>
                                            <option>ปรีชา</option>
                                            <option>นิตยา</option>
                                            <option>นาวิน</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="newFont">หน่วยนับ</label>
                                    <select class="form-control">
                                        <optgroup class="newFont">
                                            <option>เลือกหน่วยนับ</option>
                                            <option>รายการ</option>
                                            <option>ชั่วโมง</option>
                                            <option>บาท</option>
                                            <option>ครั้ง</option>
                                            <option>ชิ้น</option>
                                            <option>คน</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>
                                </div> -->
                                <div class="form-group col-md-9"></div>
                                <div class="form-group col-md-3">
                                    <div class="button-position">
                                        <button type="submit" class="btn btn-gradient-primary mr-2 newFont">เพิ่มตัวชี้วัด</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- สร้างตัวชี้วัด end -->

            <!-- แสดงตัวชี้วัด start -->

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="newFont">ตัวชี้วัดปัจจุบัน</h3><br>
                        <hr><br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <table class="table table-bordered newFont">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <h7 class="newFont">ลำดับ</h7>
                                            </th>
                                            <th scope="col">
                                                <h7 class="newFont">ตัวชี้วัด</h7>
                                            </th>
                                            <th scope="col">
                                                <h7 class="newFont">ผู้รับผิดชอบ</h7>
                                            </th>
                                            <th scope="col">
                                                <h7 class="newFont">หน่วยนับ</h7>
                                            </th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td> สถิติการยืมต่อทรัพยากรสารสนเทศผ่านระบบ RFID (Self check) </td>
                                            <td> ทีมดูแลเพจ </td>
                                            <td> 8000 ครั้ง </td>
                                            <td><button class="btn btn-success"><i class="mdi mdi-grease-pencil"></i></button>
                                                <button class="btn  btn-danger"><i class="mdi mdi-delete"></i></button>
                                            </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> การเข้าใช้บริการพื้นที่ศูนย์บรรณสารฯ แบบลงชื่อ (บุคคลภายนอก) </td>
                                            <td> ทีมดูแลเพจ</td>
                                            <td> 108 คน</td>
                                            <td>
                                                <button class="btn btn-success"><i class="mdi mdi-grease-pencil"></i></button>
                                                <button class="btn  btn-danger"><i class="mdi mdi-delete"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- แสดงตัวชี้วัด end -->

        </div>
        @include('partials.footer')
    </div>
    <!-- Div nav & side -->
    </div>
    </div>


</body>