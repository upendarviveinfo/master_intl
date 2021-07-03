<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <script src="<?= base_url()?>assets/dist/js/plugins/jquery/jquery.validate.js"></script> 
  <link href="<?php echo base_url('assets/dist/select2/select2.min.css'); ?>" rel="stylesheet" type="text/css">
  <script type="text/javascript"  src="<?= base_url()?>assets/dist/select2/select2.min.js"></script> 


  <style>
   .error{ color:red; }

	.sleeper,.seater_sleeper{
	width: 30px;
	height: 50px;
	background-color: #E4E4E4; 
	font-size:16px; 
	border: 1px solid #999999;
	text-align:center;
	margin: 0 6px 0 0;
	}
	.seaterseats{
	width: 30px;
	height: 30px;
	background-color: #E4E4E4; 
	font-size:16px; 
	border: 1px solid #999999;
	text-align:center;
	margin: 0 6px 5px 0;
	}
	.horizontal_seater_sleeper_seats,.horizontal_sleeper_seats
	{
		width: 50px;
		height: 30px;
		background-color: #E4E4E4; 
		font-size:16px; 
		border: 1px solid #999999;
		text-align:center;
		margin: 0 6px 0 0;
	}
	hr.new1 {
			border-top: 2px dashed #bce8f1;
		}
	.groove{border-style: groove;} 
	.content-wrapper{
		overflow: auto;
		}
  </style>
</head>
  
<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
	<div class="card card-default">
        <div class="card-header">
            <div class="d-inline-block">
                <h3 class="card-title"> <i class="fa fa-plus"></i>
                <?= trans('bus_creation') ?> </h3>
            </div>
            <div class="d-inline-block float-right">
            <!-- <a href="<?= base_url('admin/operator'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  <?= trans('operators_list') ?></a> -->
            </div>
        </div>
	
        <div class="card-body">
            <div class="container">
                <div class="row">
                
                   <div class="col-sm">
                        <label for="op_title" class="control-label"><?= trans('operator') ?></label>
                        <select  name="operator" id="operator_id" class="form-control" onchange="getBusLayouttype()">
                        <option value="">--Select--</option>
                            <?php
                                    if($operators->num_rows() > 0)
                                    {
                                        foreach($operators->result() as $row)
                                        {
                                        ?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->operator_title;?></option>
                                        <?php
                                        }
                                    }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm">
                        <label for="op_title" class="control-label"><?= trans('service_name') ?></label>
                        <input type="text" name="servicename" value="" class="form-control" id="service_name" placeholder="<?= trans('service_name') ?>">
                    </div>
                    <div class="col-sm">
                      <label for="op_title" class="control-label"><?= trans('title') ?></label>
                       <input type="text" name="" value="" class="form-control" id="title" placeholder="<?= trans('title') ?>">
                    </div>
                    <div class="col-sm">
                        <label for="bus_layout_model" class=" control-label"><?= trans('bus_layout_model') ?></label>
                        <select class="form-control" name="bus_layoutmodel" id="bus_layout_model" onchange="getBusLayouttype()">
                        <option value="">--Select--</option>
                        <?php
                                if($models->num_rows() > 0)
                                {
                                    foreach($models->result() as $row)
                                    {
                                    ?>
                                    <option value="<?php echo $row->bus_type_id;?>"><?php echo $row->model;?></option>
                                    <?php
                                    }
                                }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="op_username" class=" control-label"><?= trans('service_type') ?></label>
                        <select class="form-control" name="servicetype" id="service_type" onchange="getWeekDays()" >
                        <?php
                            if($service_types->num_rows() > 0)
                            {
                                foreach($service_types->result() as $row)
                                {
                                ?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="op_title" class="control-label"><?= trans('layout_type') ?></label>
                        <select class="form-control" name="layouttype" id="layout_type" onchange="GetLayout()">
                          <option value="Proprietor" selected="selected">--select--</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="op_username" class=" control-label"><?= trans('selecct_cities') ?></label>
                        <select class="form-control" name="halts" id="halts" >
                        <option value=""> - - Select - - </option>
                                <?php
                                for($i=1; $i<=60; $i++)
                                {
                                    echo'<option value="'.$i.'"> '.$i.' </option>';
                                }

                                ?>
                        </select>
                       
                    </div>
                    <div  class="col-sm" style="padding-top:30px">
                     <button type="button" class="btn btn-primary"  onclick="getHalts()">Get Cities</button>
                    </div>
            </div>
            <div id="chkWeek" style="display:none">
                <div class="row">
                    <div class="col-sm text-primary">
                        <input type="checkbox" name="chk1" id="chk1" value="Monday" />&nbsp;Mon &nbsp;
                        <input type="checkbox" name="chk2" id="chk2" value="Tuesday"/>&nbsp;Tue &nbsp;
                        <input type="checkbox" name="chk3" id="chk3" value="Wednesday" />&nbsp;Wed &nbsp;
                        <input type="checkbox" name="chk4" id="chk4" value="Thursday" />&nbsp;Thu &nbsp;
                        <input type="checkbox" name="chk5" id="chk5" value="Friday" />&nbsp;Fri &nbsp;
                        <input type="checkbox" name="chk6" id="chk6" value="Saturday" />&nbsp;Sat&nbsp;
                        <input type="checkbox" name="chk7" id="chk7" value="Sunday" />&nbsp;Sun &nbsp;
                   </div>
                   
                </div>
             </div>
             <div class="row">
                 <div class="col-sm-4">&nbsp;</div>
                 <div class="col-sm" id="layoutshow">
                 </div>
             </div>
             <div id="route_combination_res">

             </div>
             <div id="route_details">
             </div>
             <!------Model to Select Cites--->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header"  class="text-primary">
                        <div><h4 class="modal-title"> Select Cities</h4></div>
                        <div><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                        
                    </div>
                    <div class="modal-body">
                        <input type="checkbox" name="onsesorce_multiple_destination" id="onsesorce_multiple_destination">
                        &nbsp;&nbsp;<span style="color:red">Please Check If One Source And Multiple Destinations</span>
                        <div id="citiesres"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
          
        </div>
     </div>
  </section> 
</div>
<input type="hidden" id="sorder"/>
<input type="hidden" id="stage_orderids"/>
<input type="hidden" id="fromSoucre_id"/>
<input type="hidden" id="toSoucre_id"/>
<input type="hidden" id="servicefrom"/>
<input type="hidden" id="serviceto"/>
<script>
function getBusLayouttype()
{
    var busmodel =$('#bus_layout_model').val();
    var op_id=$('#operator_id').val();
    $.post("<?=base_url("admin/serviceCreation/GetBuslayouttype")?>", 
        {
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
          busmodel:busmodel,
          op_id:op_id
        },function (res)
            {
                console.log(res);
                $('#layout_type').html(res);
                $('#layoutshow').html('');
            });
}
function GetLayout()
{
    var layout_id =$('#layout_type').val();
    if(layout_id=='')
    {
       alert("Please Select Layout Type...!");
       $('#layout_type').focus();
       $('#layoutshow').html('');
       return false;
    }else{
    $.post("<?=base_url("admin/layout/getLayoutDB")?>", 
        {
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
          layout_id:layout_id
        },function (res)
        {
          //  alert(res);
            $('#layoutshow').html(res);
        });
    }
}
    function getWeekDays()
    {
        var stype = $('#service_type').val();
        if (stype == 2)
        {
            $('#chkWeek').show();
        }
        else
        {
            $('#chkWeek').hide();
        }
    }

    function getHalts()
    {
        var halts=$('#halts').val();
        var operator_id=$('#operator_id').val();
        var service_name=$('#service_name').val();
        var bus_layout_model=$('#bus_layout_model').val();
        var layout_type=$('#layout_type').val();
        if(operator_id=="")
        {
           alert("Please Select Operator....!");
           $('#operator_id').focus();
           return false;
        }
        else if(service_name=="")
        {
            alert("Please Enter Service Name....!");
            $('#service_name').focus();
            return false;
        }
        else if(bus_layout_model=="")
        {
            alert("Please Select Bus Layout Model....!");
           $('#bus_layout_model').focus();
           return false;
        }
        else if(layout_type=="")
        {
            alert("Please Select Layout Type....!");
           $('#layout_type').focus();
           return false;
        }
        else if(halts=="")
        {
           alert("Please Select Number Of Cities...!");
           $('#halts').focus();
           return false;
        }else{
        $.post("Getrouteshalts", 
        {
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
           halts:halts
        },function (res)
            {
                $('#citiesres').html(res);
                $('#myModal').modal('show');
                $('#route_combination_res').html('');
                $('#route_details').hide();
            });
      }
    }

    $('#onsesorce_multiple_destination').on('change', function() 
    { 
    var chekboxval = $('#onsesorce_multiple_destination').prop("checked") ? 1 : 0 ;
    var halts =$('#halts').val();
    for(i=1; i<=halts; i++)
    {
        var StageOrder = $('#stage_order' + i).val();
        if(chekboxval==1)
        {
            if(StageOrder==1)
            {
                $('#stageorder' + i).val('1');
               //$('#stage_order' + i).val('1');
            }
            else
            {
                $('#stageorder' + i).val('2');
                //$('#stage_order' + i).val('2');
            }
        }
        else
        {
            $('#stageorder' + i).val(i);
        }
    }
    });
    function getroutecombinations()
    {
        var halts =$('#halts').val();
        var from_ids="";
        var Stage_Order="";
        var arr=[];
        var duplicatecity= false;
        for(i=1; i<=halts; i++)
        {
            var from = $('#city_id' + i).val();
            var city_text= $('#city_id' + i).find(":selected").text();
            var StageOrder = $('#stageorder' + i).val();
            if(from=="0")
            {
                alert("Please Select City");
                $('#city_id' +i).focus();
                return false;
            }
            else
            {
                if (jQuery.inArray(from, arr)!='-1') 
                {
                    alert(city_text + ' city is already selected, please choose another city....!');
                    duplicatecity = true;
                    return false;
                } 
                else 
                {
                  arr.push(from);
                }
                        
                if(i==1)
                {
                    from_ids=from;
                    Stage_Order=StageOrder+"@"+from;
                    $('#fromSoucre_id').val(from_ids);
                    selected_cities=$('#city_id' + i).find(":selected").text().trim();
                    $('#servicefrom').val(selected_cities);//service start city name
                }
                else
                {
                    from_ids = from_ids + "," + from;
                    Stage_Order=Stage_Order+"#"+StageOrder+"@"+from;
                    selected_cities=selected_cities+ "," +$('#city_id' + i).find(":selected").text().trim();
                    if(i==halts)
                    {
                        $('#toSoucre_id').val(from);
                        var serviceto =$('#city_id' + i).find(":selected").text().trim()
                        $('#serviceto').val(serviceto);//service start city name
                    }
                }
            }
        }
        console.log("Stage_Order-"+Stage_Order);
        console.log("from_ids-"+from_ids);
        $('#sorder').val(Stage_Order);
        $('#stage_orderids').val(selected_cities);
        $.post("Getroutescombinations", 
            {
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                 from_ids:from_ids
            },function (res){
              $('#route_combination_res').html(res);
              $('#myModal').modal('hide');
            });
    }
    function selectAll()
    { 
        //for selecting all checkboxes
        if ($('#allroutes').is(":checked")) {
            $('.routes_check').prop('checked',true); //checknig all cheeckboxes   
        }
        else {
            $('.routes_check').prop('checked', false);   //unchecking all select boxes 
        }
    }
function selectedroutedetails()
{
	
	var fids="";
	var toids="";
    var from_cities="";
    var to_cities="";
	var busmodel =$('#bus_layout_model').val();
    var opid = $('#operator').val();
	var chekCount=$('input[type="checkbox"]:checked').length;
    if (chekCount == "0")
    {
        alert('please select atleast one checkbox to get Service Routes and Fares');
        return false;
    }
	$(".routes_check:checkbox").each(function() {
	if (this.checked) 
    {
        chk1 = this.value;
        var j = this.value;
        if (fids == '')
        {
            fids = $('#from_ids' + j).val();
            from_cities = $('#from' + j).val();
        }
        else
        {
            fids = fids + "," + $('#from_ids' + j).val();
            from_cities = from_cities + "," + $('#from' + j).val();
        }
        if (toids == '')
        {
            toids = $('#to_ids' + j).val();
            to_cities = $('#to' + j).val();
        }
        else
        {
            toids = toids + "," + $('#to_ids'+j).val();
            to_cities = to_cities + "," + $('#to'+j).val();
        }
	}
	});
    var fidsnameArr = from_cities.split(',');
    var toidsnameArr = to_cities.split(',');
    var mergearray= $.merge( $.merge( [], fidsnameArr ), toidsnameArr);
    let arrayunique = mergearray.filter((item, i, ar) => ar.indexOf(item) === i);
    var stage_orderids=$('#stage_orderids').val();
    var stage_orderidsss = stage_orderids.split(',');
    missing = stage_orderidsss.filter((i => a => a !== arrayunique[i] || !++i)(0));
    console.log("fids-"+fidsnameArr);
    console.log("toids-"+toidsnameArr);
    console.log("mergearray-"+mergearray);
    console.log("arrayunique-"+arrayunique);
    console.log("stage_orderidsss-"+stage_orderidsss);
    console.log("missingvalues-"+missing);
    if(missing!="")
    {
        alert("Please Select At Least One Route For The Selected City "+missing);
        console.log("missingvalues-"+missing);
    }
    else 
    {
        console.log("fids-"+fids+",toids-"+toids+"busmodel-"+busmodel+"opid-"+opid);
        $.post("Displayroutedetails", 
        {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
             fids:fids,toids:toids,busmodel:busmodel,opid:opid
        },function (res)
        {
           $('#route_details').show();
            $('#route_details').html(res);
        });

    }
}

function validateBus()
{
   var op_id=$('#operator_id').val();
   var service_name=$('#service_name').val();
   var title=$('#title').val();
   var bus_layout_model=$('#bus_layout_model').val();
   var service_type=$('#service_type').val();
   var layout_type=$('#layout_type').val();

   var fhalts=$('#fhalts').val();
   var fromSoucre_id=$('#fromSoucre_id').val();
   var toSoucre_id=$('#toSoucre_id').val();
   var sorder=$('#sorder').val();
   var servicefrom=$('#servicefrom').val();
   var serviceto=$('#serviceto').val();
   var contact = /^[0-9]*\.?[0-9]+$/;
   if(op_id=='')
   {
      alert("Please Select Operator....!");
      $('#operator_id').focus();
      return false;
   }
   else if(service_name=="")
   {
      alert("Please Enter Service Number...!");
      $('#service_name').focus();
      return false;
   }
   else if(title=="")
   {
     alert("Please Enter Titile...!");
      $('#title').focus();
      return false;
   }
   else if(bus_layout_model=="")
   {
      alert("Please Select the Bus Model...!");
      $('#bus_layout_model').focus();
      return false;
   }
   else if(service_type=="")
   {
      alert("Please Select the Service Type...!");
      $('#service_type').focus();
      return false;
   }
   else if(layout_type=="")
   {
      alert("Please Select the layout Type...!");
      $('#layout_type').focus();
      return false;
   }
        var fids = '', tids = '', f, t;
        var froms = '', tos = '', sfares = '', lbfares = '', ubfares = '', ats = '';
        var hhST = '', mmST = '', ampmST = '', hhAT = '', mmAT = '', ampmAT = '';
        var jtimehr='', jtimemn='',currency='';
        
 for (var j = 0; j <= fhalts-1; j++)
        {
            if (fids == '')
            {
                fids = $('#from_city_id' + j).val();
            }
            else
            {
                fids = fids + "," + $('#from_city_id' + j).val();
            }
            if (tids == '')
            {
                tids = $('#to_city_id' + j).val();
            }
            else
            {
                tids = tids + "," + $('#to_city_id' + j).val();
            }
            if (froms == '')
            {
                froms = $('#from_city_name' + j).val();
            }
            else
            {
                froms = froms + "," + $('#from_city_name' + j).val();
            }
            if (tos == '')
            {
                tos = $('#to_city_name' + j).val();
            }
            else
            {
                tos = tos + "," +  $('#to_city_name' + j).val();
            }


            if (jtimehr == '')
            {
                jtimehr = $('#jtimehr' + j).val();
            }
            else
            {
                jtimehr = jtimehr + "," +  $('#jtimehr' + j).val();
            }
            
             if (jtimemn == '')
            {
                jtimemn = $('#jtimemn' + j).val();
            }
            else
            {
                jtimemn = jtimemn + "," + $('#jtimemn' + j).val();
            }
            
            if (bus_layout_model == 2)
            {
                if (sfares == '')
                {
                    sfares = $('#sfare' + j).val();
                }
                else
                {
                    sfares = sfares + "," + $('#sfare' + j).val();
                }
            }
            else if (bus_layout_model == 1)
            {
                if (lbfares == '')
                {
                    lbfares = $('#lbfare' + j).val();
                }
                else
                {
                    lbfares = lbfares + "," + $('#lbfare' + j).val();
                }
                if (ubfares == '')
                {
                    ubfares = $('#ubfare' + j).val();
                }
                else
                {
                    ubfares = ubfares + "," + $('#ubfare' + j).val();
                }
            }
            else
            {
                if (sfares == '')
                {
                    sfares = $('#sfare' + j).val();
                }
                else
                {
                    sfares = sfares + "," + $('#sfare' + j).val();
                }
                if (lbfares == '')
                {
                    lbfares = $('#lbfare' + j).val();
                }
                else
                {
                    lbfares = lbfares + "," + $('#lbfare' + j).val();

                }
                if (ubfares == '')
                {
                    ubfares = $('#ubfare' + j).val();
                }
                else
                {
                    ubfares = ubfares + "," + $('#ubfare' + j).val();
                }

            }
            if (hhST == '')
            {
                hhST = $('#timehrST' + j).val();
            }
            else
            {
                hhST = hhST + "," + $('#timehrST' + j).val();
            }
            if (mmST == '')
            {
                mmST = $('#timemST' + j).val();
            }
            else
            {
                mmST = mmST + "," + $('#timemST' + j).val();
            }
            if (ampmST == '')
            {
                ampmST = $('#tfmST' + j).val();
            }
            else
            {
                ampmST = ampmST + "," + $('#tfmST' + j).val();
            }
            if (hhAT == '')
            {
                hhAT = $('#timehrAT' + j).val();
            }
            else
            {
                hhAT = hhAT + "," + $('#timehrAT' + j).val();
            }
            if (mmAT == '')
            {
                mmAT = $('#timemAT' + j).val();
            }
            else
            {
                mmAT = mmAT + "," + $('#timemAT' + j).val();
            }
            if (ampmAT == '')
            {
                ampmAT = $('#tfmAT' + j).val();
            }
            else
            {
                ampmAT = ampmAT + "," + $('#tfmAT' + j).val();
            }


            if ($('#timehrST' + j).val() == '' || $('#timehrST' + j).val() == 'HH')
            {
                alert("Select Hours in start time");
                $('#timehrST' + j).focus();
                return false;
            }
            if ($('#timemST' + j).val() == '' || $('#timemST' + j).val() == 'MM')
            {
                alert("Select Minutes in start time");
                $('#timemST' + j).focus();
                return false;
            }
            if ($('#tfmST' + j).val() == '' || $('#tfmST' + j).val() == 'AMPM')
            {
                alert("Select Time Format in Start Time");
                $('#tfmST' + j).focus();
                return false;
            }
            if ($('#timehrAT' + j).val() == '' || $('#timehrAT' + j).val() == 'HH')
            {
                alert("Select Hours in Arrival Time");
                $('#timehrAT' + j).focus();
                return false;
            }
            if ($('#timemAT' + j).val() == '' || $('#timemAT' + j).val() == 'MM')
            {
                alert("Select Minutes in Arrival time");
                $('#timemAT' + j).focus();
                return false;
            }
            if ($('#tfmAT' + j).val() == '' || $('#tfmAT' + j).val() == 'AMPM')
            {
                alert("Select Format in Arrival time");
                $('#tfmAT' + j).focus();
                return false;
            }
            if ($('#jtimehr' + j).val() == '' || $('#jtimehr' + j).val() == 'HH')
            {
                alert("Select Hours in Journey time");
                $('#jtimehr' + j).focus();
                return false;
            }
            if ($('#jtimemn' + j).val() == '' || $('#jtimemn' + j).val() == 'MM')
            {
                alert("Select Minutes in Journey time");
                $('#jtimemn' + j).focus();
                return false;
            }
            if (bus_layout_model == 2)
            {
                if ($('#sfare' + j).val() == '' || $('#sfare' + j).val() == '0' || !contact.test($('#sfare' + j).val()))
                {
                    alert("Please Enter Seat Price");
                    $('#sfare' + j).focus();
                    return false;
                }

            }
            else if (bus_layout_model == 1)
            {
                if ($('#lbfare' + j).val() == '' || $('#lbfare' + j).val() == '0' || !contact.test($('#lbfare' + j).val()))
                {
                    alert("Please Enter LowerDeck Berth Price");
                    $('#lbfare' + j).focus();
                    return false;
                }
                if ($('#ubfare' + j).val() == '' || $('#ubfare' + j).val() == '0' || !contact.test($('#ubfare' + j).val()))
                {
                    alert("Please Enter UpperDeck Berth Price");
                    $('#ubfare' + j).focus();
                    return false;
                }
            }
            else
            {
                if ($('#sfare' + j).val() == '' || $('#sfare' + j).val() == '0' || !contact.test($('#sfare' + j).val()))
                {
                    alert("Please Enter Seat Price");
                    $('#sfare' + j).focus();
                    return false;
                }
                if ($('#lbfare' + j).val() == '' || $('#lbfare' + j).val() == '0' || !contact.test($('#lbfare' + j).val()))
                {
                    alert("Please Enter LowerDeck Berth Price");
                    $('#lbfare' + j).focus();
                    return false;
                }
                if ($('#ubfare' + j).val() == '' || $('#ubfare' + j).val() == '0' || !contact.test($('#ubfare' + j).val()))
                {
                    alert("Please Enter UpperDeck Berth Price");
                    $('#ubfare' + j).focus();
                    return false;
                }
            }
        }//for
        console.log("op_id-"+op_id+",service_name-"+service_name+",layout_type-"+layout_type+",service_type-"+service_type+",title-"+title+",halts-"+fhalts+",bus_model-"+bus_layout_model
        +",fids-"+fids+",tids-"+tids+",froms-"+froms+",tos-"+tos+",sfares-"+sfares+",lbfares-"+lbfares+",ubfares-"+ubfares+",hhST-"+hhST+",mmST-"+mmST+",ampmST-"+ampmST+
        ",hhAT-"+hhAT+",mmAT-"+mmAT+",ampmAT-"+ampmAT+",jtimehr-"+jtimehr+",jtimemn-"+jtimemn+",fromSoucre_id-"+fromSoucre_id+",toSoucre_id-"+toSoucre_id+",sorder-"+sorder+
        "servicefrom"+servicefrom+"serviceto"+serviceto);
        $.post("saveBusDetails", 
        {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
            op_id:op_id,
            service_name:service_name,
            title:title,
            bus_layout_model:bus_layout_model,
            service_type:service_type,
            layout_type:layout_type,
            fhalts:fhalts,
            //weeks: weeks,
            fids: fids, 
            tids: tids, 
            froms: froms,
            tos: tos,
            sfares: sfares,
            lbfares: lbfares, ubfares: ubfares, hhST: hhST, mmST: mmST, ampmST: ampmST, hhAT: hhAT, mmAT: mmAT, ampmAT: ampmAT,jtimehr:jtimehr,jtimemn:jtimemn,
            fromSoucre_id:fromSoucre_id,toSoucre_id:toSoucre_id,sorder:sorder,servicefrom:servicefrom,serviceto:serviceto
        }, function (res)
        {
            // alert(res);
            console.log(res);
            $('#create').val("Create Bus");
            $('#create').attr("disabled", false);
            if (res == 1)
            {
                setTimeout(function () {
                          $('#success').show();
                }, 800);
            }
            else
            {
                alert("Problem in Creating");
                // window.location = '<?php echo base_url("createbus_new/createBus") ?>';
            }
        });

}


</script>
</body>
</html>
