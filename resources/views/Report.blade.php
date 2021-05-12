@include('header.menu')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mitr&display=swap');

    /* adjust font this page */
    .newFont {
        font-family: 'Mitr', sans-serif;
    }

    /* adjust btn position */
    .button-position {
        float: right;
        margin: -8px;
    }

    /* adjust btn size */
    .btns {
        padding: 1rem 3.3rem;
        font-size: 0.875rem;
        margin-right:-5px 
    }

    .btns2 {
        padding: 1rem 2.7rem;
        font-size: 0.875rem;
        margin-left:-5px 
    }

    .btn {
        font-size: 0.875rem;
        line-height: 1;
        font-family: 'Mitr', sans-serif;

    }

    .letter {
        text-indent: 7px;

    }
    .Pbtn {
        margin-left: 0px;
        padding: 1rem;
        align-items: end;
        justify-content: end;
    }

    .btn-lg {
        padding: 1rem 8rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.1875rem;
    }

    /* adjust text position */
    td {
        text-align: center;
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
<?php

use Illuminate\Support\Facades\Session;
?>

<body>
    <!-- ------------------------------------------  include  --------------------------------------------->

    @include('partials.navbar')
    @include('partials.sidebar')

    <!-- ------------------------------------------  include  --------------------------------------------->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="newFont"> แผนสถิติ</h3>
            </div>

            <!-- ------------------------------------------  การสืบค้นและะออกรายงาน  --------------------------------------------->

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="newFont" for=""> ค้นหาแผนสถิติ ประจำปีงบประมาณ </h3>
                            <h3 class="letter newFont" id="showyear"></h3>
                            <h3 class="newFont letter"> เดือน</h3>
                            <h3 class="newFont letter" id="aa"> </h3>
                        </div>
                        <hr><br>
                        <form class="forms-sample" action="/sea" method="post">
                            @csrf
                            <!-- @method('POST') -->
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <select id="yearSelect" class="form-control" name="year" onchange="getSelectValue()">
                                        <optgroup class="newFont">
                                        <?php 
                                        for ($i=0; $i < count($year); $i++) { 
                                            $selected = ($year[$i]->year_id  === $currentYear ? 'selected' : ''); 
                                        echo '<option  value="'.$year[$i]->year_id .'"'.$selected.'>'.$year[$i]->year.'</option>';
                                        }
                                        ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <select id="mountSelect" class="form-control" name="month"  onchange="getSelectValue2()">
                                        <optgroup class="newFont">
                                            <option hidden value="0">เดือน</option>
                                            <option value="10">ตุลาคม</option>
                                            <option value="11">พฤศจิกายน</option>
                                            <option value="12">ธันวาคม</option>
                                            <option value="1">มกราคม</option>
                                            <option value="2">กุมภาพันธ์</option>
                                            <option value="3">มีนาคม</option>
                                            <option value="4">เมษายน</option>
                                            <option value="5">พฤษภาคม</option>
                                            <option value="6">มิถุนายน</option>
                                            <option value="7">กรกฎาคม</option>
                                            <option value="8">สิงหาคม</option>
                                            <option value="9">กันยายน</option>
                                        </optgroup>
                                    </select>
                                </div>
                           
                                <div class="form-group col-md-2">
                                    <button type="submit" name="btn_search" id="btn_search" value="1" class="btn btn-inverse-primary btns ">ค้นหา</button>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" name="btn_download" id="btn_download" value="1" class="btn btn-inverse-danger btns2 ">ดาวน์โหลด</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-10">
                                <!-- <button type="button" class="btn btn-primary btns ">กราฟ</button> -->
                            </div>
                            <div class="form-group col-md-2">
                            </div>


                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <table class="table table-bordered newFont">
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col-sm-1" scope="col">
                                                <h7 class="newFont">ลำดับ</h7>
                                            </th>
                                            <th class="col-sm-3" scope="col">
                                                <h7 class="newFont">รายการ</h7>
                                            </th>
                                            <th class="col-sm-1" scope="col">
                                                <h7 class="newFont">จำนวน</h7>
                                            </th>
                                            <th class="col-sm-1" scope="col">
                                                <h7 class="newFont">หน่วย</h7>
                                            </th>
                                            <th class="col-sm-3" scope="col">
                                                <h7 class="newFont">หมายเหตุ</h7>
                                            </th>
                                            <th class="col-sm-2" scope="col">
                                                <h7 class="newFont">ผู้รับผิดชอบ</h7>
                                            </th>
                                            <th class="col-sm-1" scope="col">
                                                <h7 class="newFont">กราฟ</h7>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        function spliteName($name)
                                        {
                                            $text = '';
                                            $texts = explode(",", $name);
                                            for ($i = 0; $i < count($texts); $i++) {
                                                $text .= '<p class="text-t">' . $texts[$i] . '</p>';
                                            }
                                            return $text;
                                        }
                                        ?>
                                        @foreach ($search as $i => $value)
                                        <tr class="d-flex">
                                            <td class="col-sm-1"> {{ $i + 1 }} </td>
                                            <td class="col-sm-3 break"> {{ $value->name_item }}</td>
                                            <td class="col-sm-1"> {{ $value->count }}</td>
                                            <td class="col-sm-1"> {{ $value->unit_name }} </td>
                                            <td class="col-sm-3 break"> {{ $value->description }}</td>
                                            <td class="col-sm-2 break"><?= spliteName($value->name_employee) ?></td>
                                            <td class="col-sm-1"><a target='_blank' href="graph?id={{$value->id_item}}&year={{$years}}"><button type="button" class="Pbtn btn btn-inverse-success"><i class="mdi mdi-chart-bar"></i></button></a></td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- <div class="col-md-1"></div> -->
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('partials.footer')
    </div>
    <!-- Div nav & side -->
    </div>
    </div>
    </div>

</body>


<script type="text/javascript">
    const mount = "<?php echo $months; ?>";
    $('#mountSelect').find('option').each((i, e) => {
        if ($(e).val() == mount) {
            $('#mountSelect').prop('selectedIndex', i);
        }
    });

    const yearsOfSearch = "<?php echo $years; ?>";
    $('#yearSelect').find('option').each((i, e) => {
        if ($(e).val() == yearsOfSearch) {
            $('#yearSelect').prop('selectedIndex', i);
        }
    });


    function getSelectValue() {
        var getText = $("#yearSelect option:selected").text();
        $("#showyear").text(getText);
        console.log(getText);
    };
    getSelectValue();

    function getSelectValue2() {
        var getText2 = $("#mountSelect option:selected").text();
        $("#aa").text(getText2);
    };
    getSelectValue2();


</script>
<script>
    function search() {
        document.getElementById("btn_search").value = 1;
    }

    function download() {
        document.getElementById("btn_download").value = 1;
    }

    var msg = '<?= Session::get('alert') ?>';
    var exist = '<?= Session::has('alert') ?>';
    if (exist) {
        alert(msg);
    }
</script>