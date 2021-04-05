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
    }

    .btns2 {
        padding: 1rem 2.7rem;
        font-size: 0.875rem;
    }

    .btn {
        font-size: 0.875rem;
        line-height: 1;
        font-family: "ubuntu-bold", sans-serif;

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
                            <h3 class="newFont" for=""> ค้นหาแผนสถิติ ประจำปี พ.ศ. </h3>
                            <h3 id="showyear"> </h3>
                        </div>
                        <hr><br>
                        <form class="forms-sample" action="/sea" method="post">
                            @csrf
                            <!-- @method('POST') -->
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="year" id="year" onchange="getSelectValue()">
                                        <optgroup class="newFont">
                                            <option value="0">ปี</option>
                                            @foreach ($year as $i => $value)
                                                <option value="{{ $value->year_id }}">{{ $value->year }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="quater" id="quater">
                                        <optgroup class="newFont">
                                            <option value="0">ไตรมาส</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="month" id="month">
                                        <optgroup class="newFont">
                                            <option value="0">เดือน</option>
                                            <option value="1">มกราคม</option>
                                            <option value="2">กุมภาพันธ์</option>
                                            <option value="3">มีนาคม</option>
                                            <option value="4">เมษายน</option>
                                            <option value="5">พฤษภาคม</option>
                                            <option value="6">มิถุนายน</option>
                                            <option value="7">กรกฎาคม</option>
                                            <option value="8">สิงหาคม</option>
                                            <option value="9">กันยายน</option>
                                            <option value="10">ตุลาคม</option>
                                            <option value="11">พฤศจิกายน</option>
                                            <option value="12">ธันวาคม</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-8">
                                    <!-- <button type="button" class="btn btn-primary btns ">กราฟ</button> -->
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-inverse-primary btns ">ค้นหา</button>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="button" class="btn btn-inverse-primary btns2 ">ดาวน์โหลด</button>
                                </div>
                            </div>
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
                                {{-- <button type="button" class="btn btn-gradient-primary btns2 ">ดาวน์โหลด</button> --}}
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
                                            <th class="col-sm-2" scope="col">
                                                <h7 class="newFont">จำนวน</h7>
                                            </th>
                                            <th class="col-sm-1" scope="col">
                                                <h7 class="newFont">หน่วย</h7>
                                            </th>
                                            <th class="col-sm-2" scope="col">
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
                                        @foreach ($search as $i => $value)
                                            <tr class="d-flex">
                                                <td class="col-sm-1"> {{ $i + 1 }} </td>
                                                <td class="col-sm-3 break"> {{ $value->name_item }}</td>
                                                <td class="col-sm-2"> </td>
                                                <td class="col-sm-1"> {{ $value->unit_name }} </td>
                                                <td class="col-sm-2"> </td>
                                                <td class="col-sm-2"> </td>
                                                <td class="col-sm-1"><a target='_blank' href=graph><button type="button"
                                                            class="Pbtn btn btn-inverse-success"><i
                                                                class="mdi mdi-chart-bar"></i></button></a></td>
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


<script>
    function getSelectValue() {

        var getText = $("#year option:selected").text();
        if (getText == "ปี") {
            getText == null
            $("#showyear").text("");

        } else
            $("#showyear").text(getText);
        // console.log(getText);
    }
    getSelectValue();

</script>
