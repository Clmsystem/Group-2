<style>

    /* @import url('https://fonts.googleapis.com/css2?family=Mitr&display=swap');
    adjust font this page */
    .newFont {
        font-family: 'Mitr', sans-serif;
        text-align:center;
    }
    .page-header {
        font-family: 'Mitr', sans-serif;
        text-align:center;
    }
    .newFontmont{
        font-family: 'Mitr', sans-serif;
        text-align:center;
    }
    /* adjust btn position */
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
        font-size: 9px !important;
    }
    th {
        text-align: center;
    }
    
    
</style>
<div >
        <div class="content-wrapper">
            <div class="page-header" >
                <h3 class="newFont"> สถิติ ฝ่ายส่งเสริมการเรียนรู้และให้บริการการศึกษา ศูนย์บรรณสารและสื่อการศึกษา </h3>
            </div>
            <div ><h5 class="newFontmont"> เดือน มกราคม 2564 </h5></div>


            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       
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
                                        <tr class="d-flex">
                                            <th class="col-sm-1"> 1 </th>
                                            <td class="col-sm-3"> สถิติการยืมต่อทรัพยากรสารสนเทศผ่านระบบ RFID (Self check) </td>
                                            <td class="col-sm-2">
                                                <div><input type="text" class="form-control" placeholder="จำนวน" required></div>
                                            </td>
                                            <th class="col-sm-1"> ครั้ง </th>
                                            <td class="col-sm-3"> <div><input type="text" class="form-control" placeholder="หมายเหตุ" required></div> </td>
                                            <td class="col-sm-2"><button class="btn btn-gradient-success btns" data-toggle="modal" data-target="#modalAction"><i class="mdi mdi-grease-pencil launch-modal"></i></button>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="d-flex">
                                            <th class="col-sm-1"> 2 </th>
                                            <td class="col-sm-3"> การเข้าใช้บริการพื้นที่ศูนย์บรรณสารฯ แบบลงชื่อ (บุคคลภายนอก) </td>
                                            <td class="col-sm-2">
                                                <div><input type="text" class="form-control" placeholder="จำนวน" required></div>
                                            </td>
                                            <th class="col-sm-1"> คน </th>
                                            <td class="col-sm-3"> <div><input type="text" class="form-control" placeholder="หมายเหตุ" required></div> </td>
                                            <td class="col-sm-2"><button class="btn btn-gradient-success btns" data-toggle="modal" data-target="#modalAction"><i class="mdi mdi-grease-pencil launch-modal"></i></button>
                                               </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- <div class="col-md-1"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalAction" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <br>
                            <h2 class="modal-title newFont" id="exampleModalLabel">แก้ไข</h2>
                            <form class="forms-sample">
                                <hr><br>
                                <tbody class="test">
                                        <tr class="d-flex">
                                            <th class="col-sm-1"> 1 </th>
                                            <td class="col-sm-3"> สถิติการยืมต่อทรัพยากรสารสนเทศผ่านระบบ RFID (Self check) </td>
                                            <td class="col-sm-2">
                                                <div><input type="text" class="form-control" placeholder="จำนวน" required></div>
                                            </td>
                                            <th class="col-sm-1"> ครั้ง </th>
                                            <td class="col-sm-3"> <div><input type="text" class="form-control" placeholder="หมายเหตุ" required></div> </td>
                                            <td class="col-sm-2"><button class="btn btn-gradient-success btns" data-toggle="modal" data-target="#modalAction"><i class="mdi mdi-grease-pencil launch-modal"></i></button>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="d-flex">
                                            <th class="col-sm-1"> 2 </th>
                                            <td class="col-sm-3"> การเข้าใช้บริการพื้นที่ศูนย์บรรณสารฯ แบบลงชื่อ (บุคคลภายนอก) </td>
                                            <td class="col-sm-2">
                                                <div><input type="text" class="form-control" placeholder="จำนวน" required></div>
                                            </td>
                                            <th class="col-sm-1"> คน </th>
                                            <td class="col-sm-3"> <div><input type="text" class="form-control" placeholder="หมายเหตุ" required></div> </td>
                                            <td class="col-sm-2"><button class="btn btn-gradient-success btns" data-toggle="modal" data-target="#modalAction"><i class="mdi mdi-grease-pencil launch-modal"></i></button>
                                               </button>
                                            </td>
                                        </tr>
                                    </tbody>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                   
                </div>
            </div>
</div>
           
</body>