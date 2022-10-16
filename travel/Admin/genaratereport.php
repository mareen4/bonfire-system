<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" />

<link href="../css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
            
            
            <div class="container-fluid">
                <!--  Author Name: MayuriK. 
 for any PHP, Codeignitor or Laravel work visit www.mayurik.com  -->
                
                
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div id="add-brand-messages"></div>
                            <div class="card-body">
                                <div class="input-states">
                                   <form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getOrderReportForm">

                                  

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Start Date</label>
                                                <div class="col-sm-9">
                                                   <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">End Date</label>
                                                <div class="col-sm-9">
                                                   <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit"  id="generateReportBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Generate Report</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
    <script>
        $(document).ready(function() {
    // order date picker
    $("#startDate").date();
    // order date picker
    $("#endDate").date();

    $("#getOrderReportForm").unbind('submit').bind('submit', function() {
        
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();

        if(startDate == "" || endDate == "") {
            if(startDate == "") {
                $("#startDate").closest('.form-group').addClass('has-error');
                $("#startDate").after('<p class="text-danger">The Start Date is required</p>');
            } else {
                $(".form-group").removeClass('has-error');
                $(".text-danger").remove();
            }

            if(endDate == "") {
                $("#endDate").closest('.form-group').addClass('has-error');
                $("#endDate").after('<p class="text-danger">The End Date is required</p>');
            } else {
                $(".form-group").removeClass('has-error');
                $(".text-danger").remove();
            }
        } else {
            $(".form-group").removeClass('has-error');
            $(".text-danger").remove();

            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'date',
                success:function(response) {
                    var mywindow = window.open('', 'Rupee Invoice System', 'height=400,width=600');
            mywindow.document.write('<html><head><title>Order Report Slip</title>');        
            mywindow.document.write('</head><body>');
            mywindow.document.write(response);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10

            mywindow.print();
            mywindow.close();
                } // /success
            }); // /ajax

        } // /else

        return false;
    });

});
    </script>

<!-- <?php include('./constant/layout/footer.php');?> -->
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->

