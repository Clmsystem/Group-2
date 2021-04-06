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
                <h3 class="newFont">อนุมัติ ตัวชี้วัด</h3>
            </div>

            <!-- ------------------------------------------  การสืบค้นและะออกรายงาน  --------------------------------------------->
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
