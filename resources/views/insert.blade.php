@include('header.menu')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mitr&display=swap');
    /* adjust font this page  */

    .newFont {
        font-family: 'Mitr', sans-serif;
        text-align: center;
    }

    .newFonts {
        font-family: 'Mitr', sans-serif;
        /* text-align: center; */
    }

    .button-position {
        float: right;
        margin: -8px;
    }

    /* adjust btn size */
    .btns {
        padding: 0.9rem 2em;
        font-size: 0.875rem;
    }

    /* adjust text position */
    td {
        text-align: center;
        /* font-size: 9px !important; */
    }

    th {
        text-align: center;
    }

    td.break {
        word-wrap: break-word;
        /* word-break: break-all; */
        white-space: normal;

    }
</style>

<body>
    <!-- ------------------------------------------  include  --------------------------------------------->

    @include('partials.navbar')
    @include('partials.sidebar')

    <!-- ------------------------------------------  include  --------------------------------------------->

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="newFont"> สถิติ ฝ่ายส่งเสริมการเรียนรู้และให้บริการการศึกษา ศูนย์บรรณสารและสื่อการศึกษา </h3>
            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="newFonts">บันทึกผลตามตัวชี้วัด</h3>
                            </div>
                            <div class="form-group col-md-2">
                                <form action="/submit" method="post">
                                    @csrf
                                    <select id="mountSelect" name="mountSelect" class="form-control" onchange="this.form.submit()">
                                        <optgroup class="newFont">
                                            <option hidden>เดือน</option>
                                            <option id="op1" value="1">มกราคม</option>
                                            <option id="op2" value="2">กุมภาพันธ์</option>
                                            <option id="op3" value="3">มีนาคม</option>
                                            <option id="op4" value="4">เมษายน</option>
                                            <option id="op5" value="5">พฤษภาคม</option>
                                            <option id="op6" value="6">มิถุนายน</option>
                                            <option id="op7" value="7">กรกฎาคม</option>
                                            <option id="op8" value="8">สิงหาคม</option>
                                            <option id="op9" value="9">กันยายน</option>
                                            <option id="op10" value="10">ตุลาคม</option>
                                            <option id="op11" value="11">พฤศจิกายน</option>
                                            <option id="op12" value="12">ธันวาคม</option>
                                        </optgroup>
                                    </select>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <h3 class="newFonts"> ประจำปี พ.ศ. <?php echo date("Y") + 543; ?></h3>

                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-12">
                                <table class="table table-bordered newFont">
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col-sm-1" scope="col">
                                                <h7 class="newFont">ลำดับ</h7>
                                            </th>
                                            <th class="col-sm-3" scope="col">
                                                <h7 class="newFont">ตัวชี้วัด</h7>
                                            </th>
                                            <th class="col-sm-2" scope="col">
                                                <h7 class="newFont">จำนวน</h7>
                                            </th>
                                            <th class="col-sm-1" scope="col">
                                                <h7 class="newFont">หน่วยนับ</h7>
                                            </th>
                                            <th class="col-sm-3" scope="col">
                                                <h7 class="newFont">หมายเหตุ</h7>
                                            </th>
                                            <!-- <th class="col-sm-2" scope="col">
                                                <h7 class="newFont">สถานะ</h7>
                                            </th> -->
                                            <th class="col-sm-2" scope="col">
                                                <h7 class="newFont">แก้ไข</h7>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="test">
                                        @foreach ($priority as $i => $value)
                                        <tr class="d-flex newFont">
                                            <th class="col-sm-1"> {{ $i + 1 }} </th>
                                            <td class="col-sm-3 break"> {{ $value->name_item }} </td>
                                            <td class="col-sm-2">
                                                {{ $value->count }}
                                            </td>
                                            <th class="col-sm-1"> ครั้ง </th>
                                            <td class="col-sm-3">
                                                {{ $value->description }}
                                                <!-- <div><input style="border:none" type="text" class="form-control" placeholder="หมายเหตุ" required></div> -->

                                            </td>
                                            <td class="col-sm-2">
                                                <button class="btn btn-inverse-success btns" data-toggle="modal" data-target="#modalAction{{ $i }}"><i class="mdi mdi-grease-pencil launch-modal"></i></button>


                                                <div class="modal fade" id="modalAction{{ $i }}" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <br>
                                                                <h2 class="modal-title newFont" id="exampleModalLabel">แก้ไข</h2>

                                                                <hr><br>
                                                                <div class="card-body">
                                                                    <div class="col-md-12">
                                                                        <form class="forms-sample" action="/updateCount" method="post">
                                                                            <table class="table table-bordered newFont">
                                                                                <thead>
                                                                                    <tr class="d-flex">
                                                                                        <th class="col-sm-6" scope="col">
                                                                                            <h5 class="newFont">
                                                                                                รายการ</h5>
                                                                                        </th>
                                                                                        <th class="col-sm-2" scope="col">
                                                                                            <h7 class="newFont">
                                                                                                จำนวน</h7>
                                                                                        </th>
                                                                                        <th class="col-sm-4" scope="col">
                                                                                            <h7 class="newFont">
                                                                                                หน่วยนับ</h7>
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>

                                                                                @csrf
                                                                                <tbody>
                                                                                    <tr class="d-flex newFont">
                                                                                        <th class="col-sm-6 break">
                                                                                            {{ $value->name_item }}
                                                                                        </th>
                                                                                        <td class="col-sm-2">
                                                                                            <!-- <input  hidden name="count" id="count"> -->
                                                                                            <div><input type="text" value="{{ $value->count }}" id="count" name="count" class="form-control" placeholder="จำนวน" required></div>
                                                                                        </td>
                                                                                        <th class="col-sm-4"> ครั้ง
                                                                                        </th>
                                                                                    </tr>
                                                                                    <tr class="d-flex newFont">
                                                                                        <th class="col-sm-5 break">
                                                                                            หมายเหตุ
                                                                                        </th>
                                                                                        <td class="col-sm-7">

                                                                                            <textarea type="text" id="description" name="description" style="height: 100px" class="form-control" placeholder="หมายเหตุ" required>{{ $value->description }}</textarea>
                                                                                        </td>

                                                                                    </tr>

                                                                                    <!-- <tr>
                                                                                        <td class="col-sm-3">
                                                                                            <div><input type="text" value="{{ $value->description }}" id="description" name="description" class="form-control" placeholder="หมายเหตุ" required></div>
                                                                                        </td>
                                                                                    </tr> -->
                                                                                </tbody>

                                                                                <input hidden type="text" value="{{$value->month}}" name="month">
                                                                                <input hidden type="text" value="{{$value->year_year_id}}" name="year">
                                                                            </table>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                                    <h7 class="newFont">ยกเลิก</h7>
                                                                                </button>
                                                                                <button name="id_item" value="{{$value->id_item}}" type="submit" class="btn btn-primary">
                                                                                    <h7 class="newFont">บันทึก</h7>
                                                                                </button>
                                                                            </div>
                                                                            <!-- <div class="col-md-1"></div> -->
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 grid-margin stretch-card">
                                                        <div class="card">

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <!-- <div class="col-md-1"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('partials.footer')
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- selected option -->
    <script type="text/javascript">
        $(document).ready(function() {

        });
        // const mount = new Date().getMonth() + 1;
        const mount = "<?php echo $month; ?>";
        $('#mountSelect').find('option').each((i, e) => {
            if ($(e).val() == mount) {
                $('#mountSelect').prop('selectedIndex', i);
            }
        });
    </script>
    <!-- selected option -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>