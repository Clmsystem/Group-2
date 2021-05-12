@include('header.menu')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mitr&display=swap');

    /* adjust font this page */
    .newFont {
        font-family: 'Mitr', sans-serif;
    }

    .newFonts {
        font-family: 'Mitr', sans-serif;
        font-size: 50px !important;
    }


    .dropdown .dropdown-menu .dropdown-item {
        font-size: 0.8rem;
        padding: 0;
    }

    /* adjust btn position */
    .button-position {
        float: right;
        margin: -8px;
    }



    td.break {
        word-wrap: break-word;
        /* word-break: break-all; */
        white-space: normal;
    }
    td.break1 {
        word-wrap: break-word;
        /* white-space: inherit;     */
    }

    td.break2 {
        word-wrap: break-word;
        /* word-break: break-all; */
        white-space: pre-line;

        display: block
    }

    /* adjust btn size */
    .btns {
        align-items: center;
        padding: 0.9rem 2em;
        font-size: 0.875rem;
      
    }
    table{

    }
    .text-t {
        margin: 0;
        padding: 0;
    };
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
                <h3 class="newFont">จัดการภาพรวม</h3>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <form class="forms-sample" action="/manageted" method="post">
                            @csrf
                            <!-- @method('POST') -->
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <h4>เพิ่มปีงบประมาณ</h4>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="yearSelect1" class="form-control" name="Addyear" >
                                        <optgroup class="newFont">
                                        <?php 
                                        $currently_selected = date('Y')+543; 
                                        $earliest_year = 2019+543; 
                                        $latest_year = date('Y')+543; 
                                        foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                            // Prints the option with the next year in range.
                                            print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                          }
                                        ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" name="btn_add" id="btn_add" value="1" class="btn btn-inverse-primary btns ">Add</button>
                                </div>
                                <div class="form-group col-md-2">
                                    <h4>เลือกปีงบประมาณ</h4>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="yearSelect2" class="form-control" name="Flagyear" >
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
                                <div class="form-group col-md-2">
                                    <button type="submit" name="btn_flag" id="btn_flag" value="1" class="btn btn-inverse-primary btns ">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const yearsOfSearch = "<?php echo $years; ?>";
        $('#yearSelect1').find('option').each((i, e) => {
            if ($(e).val() == yearsOfSearch) {
                $('#yearSelect').prop('selectedIndex', i);
            }
        }); 
    const yearsOfSearch = "<?php echo $years; ?>";
        $('#yearSelect2').find('option').each((i, e) => {
            if ($(e).val() == yearsOfSearch) {
                $('#yearSelect').prop('selectedIndex', i);
            }
        }); 
</script>

   