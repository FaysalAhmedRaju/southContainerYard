
<div class="content-wrapper">
    <div class="col-md-12" id="head" style="background-color:inherit ">
        <div class="col-md-12" style="background-color: /*#f8f9f9 */ paleturquoise ; border-radius: 20px;">
            <div class="row">
                <span>&nbsp;</span>
            </div>
            <div  class="row">
                <div class="col-sm-4">
                    <a href="<?php echo base_url('admin_controller/dataListView'); ?>" class="btn btn-success" >See List</a>
                </div>
            </div>
            <h4 class="text-center ok"><b>Income/Expenditure Entry Form</b></h4><br>
            <div  class="col-md-4 col-md-offset-5">
                <?php if ($this->session->flashdata('success')){ ?>
                    <div id="mydivs" class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>

                <?php    } ?>
                <script>
                    setTimeout(function() {
                        $('#mydivs').hide('fast');
                    }, 3000);
                </script>
                <?php if ($this->session->flashdata('error')){ ?>
                    <div id="errorDiv" class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>

                <?php    } ?>
                <script>
                    setTimeout(function() {
                        $('#errorDiv').hide('fast');
                    }, 3000);
                </script>

                <form name="income_expense_form" id="income_expense_form" onsubmit="return(validate());"
                      action="<?php echo base_url('admin_controller/update_income_expenditure');?>"
                      method="POST">
                    <?php //print_r($dropData); ?>
                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo $result_edit_row->id?>">
                        <div class="form-group">
                            <label for="exampleSelect1">Head</label>
                            <select class="form-control" id="head_id" name="head_id" onchange="changehead_id(this.value);">
                                <option value="">Select Head</option>
                                <?php
                                foreach ($dropData as $d_data)
                                { ?>

                                    <option value="<?=$d_data->id;?>" <?php if($d_data->id == $result_edit_row->h_id) echo 'selected="selected"'; ?> > <?php echo $d_data->head_name; ?></option>

                                <?php  }
                                ?>
<!--                                --><?php
//                                foreach ($dropData as $d_data)
//                                {
//                                    echo '<option value="'.$d_data->id.'">'.$d_data->head_name.'</option>';
//                                }
//                                ?>
                            </select>
                        </div>
                        <?php //echo form_error('head_id');?>
                        <div class="form-group">
                            <label for="sub_head">Sub Head</label>
                            <select class="form-control" id="sub_head_id" name="sub_head_id" disabled>
                                <option value=" <?php echo $result_edit_row->sub_head_id?>"> <?php echo $result_edit_row->sub_head?></option>

                            </select>
                        </div>
                        <?php //echo form_error('head_id');?>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type_name" name="type_name">
                                <option value="" >Select Type</option>
                                <option value="Income" <?php if($result_edit_row->t_type == 'Income') echo 'selected="selected"'; ?>>Income</option>
                                <option value="Expenditure" <?php if($result_edit_row->t_type == 'Expenditure') echo 'selected="selected"'; ?>>Expenditure</option>
                            </select>
                        </div>
                        <?php //echo form_error('head_id');?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="<?php if($this->encrypt->decode($result_edit_row->debit) == ''){echo $this->encrypt->decode($result_edit_row->credit);}else{echo $this->encrypt->decode($result_edit_row->debit); }  ?>"
                                   aria-describedby="emailHelp"  placeholder="Type Amount" >
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="i_e_date" name="i_e_date" value="<?php echo $result_edit_row->created_at; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Comment</label>
                            <input type="text" class="form-control" id="comment" name="comment"
                                   aria-describedby="emailHelp"  placeholder="Type Comment"  value="<?php echo $result_edit_row->comment; ?>">
                        </div>
                        <?php //echo form_error('head_id');?>
                        <input type="submit" value="Update" class="btn btn-primary" id="" />
                        <!--                        <button  type="submit" class="btn btn-primary" id="btn-save">Save</button>-->
                    </fieldset>
                </form>
                <br>
            </div>
        </div>
        <div>
            <span>  &nbsp;</span>
        </div>
<!--        <div class="col-md-12"  style="background-color: #bee5eb; /*whitesmoke*/">-->
<!--            --><?php ////print_r($data); exit();  ?>
<!--            <table class="table table-bordered" >-->
<!--                <caption><h4 class="text-center ok">Income/Expenditure List</h4></caption>-->
<!--                <thead>-->
<!--                <tr>-->
<!--                    <th style="text-align: center">S/L</th>-->
<!--                    <th style="text-align: center">Head Name</th>-->
<!--                    <th style="text-align: center">Sub Head Name</th>-->
<!--                    <th style="text-align: center">Transaction Type </th>-->
<!--                    <th style="text-align: center">Debit</th>-->
<!--                    <th style="text-align: center">Credit</th>-->
<!--                    <th style="text-align: center">Date</th>-->
<!--                    <th style="text-align: center">Action</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                --><?php //  $i = 1;
//                foreach ($data as $d) {
//                    ?>
<!--                    <tr>-->
<!--                        <td style="text-align: center">--><?php //echo $i++ ?><!--</td>-->
<!--                        <td style="text-align: center">--><?php // echo $d['head_name'] ?><!--</td>-->
<!--                        <td style="text-align: center">--><?php //echo $d['sub_head'] ?><!--</td>-->
<!--                        <td style="text-align: center">--><?php //echo $d['t_type'] ?><!--</td>-->
<!--                        <td style="text-align: center">--><?php //echo $this->encrypt->decode($d['debit']) ?><!--</td>-->
<!--                        <td style="text-align: center">--><?php //echo $this->encrypt->decode($d['credit']) ?><!--</td>-->
<!--                        <td style="text-align: center">--><?php //echo $d['created_at'] ?><!--</td>-->
<!--                        <td style="text-align: center">-->
<!---->
<!--                            <a href="--><?php //echo base_url('admin_controller/income_expenditure_edit/'.$d['id']); ?><!--" class="btn btn-success btn-sm" >-->
<!--                                Edit-->
<!--                            </a>-->
<!--                            -->
<!--                            <a href="--><?php //echo base_url('admin_controller/delete_Income_expense/'.$d['id']); ?><!--"-->
<!--                               class="btn btn-danger btn-sm" onclick="return confirm('Do You Want To Delete?');">-->
<!--                                Delete-->
<!--                            </a>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    --><?php
//                }
//                ?>
<!--                </tbody>-->
<!--                <tfoot>-->
<!--                <tr>-->
<!--                    <td colspan="8" class="text-center">-->
<!---->
<!--                    </td>-->
<!--                </tr>-->
<!--                </tfoot>-->
<!--            </table>-->
<!--            --><?php
//            echo  $this->pagination->create_links();
//            ?>
<!--        </div>-->
    </div>

</div>

<script>
    //    $(document).ready(function () {
    //        $('#hheeee').on('click',function () {
    //            alert('working');
    //        });
    //
    //    });
    function changehead_id(head_id)
    {
        // alert(head_id);

        if(head_id=="")
        {
            sub_head_id.disabled=true;
        }
        else{

            sub_head_id.disabled=false;
            getSubHeadData();
        }


    }

    function validate()
    {
        if(document.income_expense_form.head_id.value == "")
        {
            alert( "Please Select Head!" );
            document.income_expense_form.head_id.focus() ;
            return false;
        }else if(document.income_expense_form.sub_head_id.value == ""){
            alert( "Please Select Sub Head!" );
            document.income_expense_form.sub_head_id.focus() ;
            return false;
        }else if(document.income_expense_form.type_name.value == ""){
            alert( "Please Select Type!" );
            document.income_expense_form.type_name.focus() ;
            return false;
        }else if(document.income_expense_form.amount.value == ""){
            alert( "Please Give Amount!" );
            document.income_expense_form.amount.focus() ;
            return false;
        }
    }

    function getSubHeadData()
    {
        //	alert(head_id);
        if (window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        var head_id =document.getElementById("head_id").value;
        // alert(head_id);
        var url = "<?php echo site_url('admin_controller/getSubHeadName')?>?head_id="+head_id;
        // xmlhttp.open("GET","<?php echo site_url('ajaxController/getBlock')?>?yard="+yard,false);
        // alert(url);
        xmlhttp.onreadystatechange=stateChangeAssignment;
        xmlhttp.open("GET",url,false);

        xmlhttp.send();
    }

    function stateChangeAssignment()
    {
        // alert(xmlhttp.status);
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var val = xmlhttp.responseText;
            // alert(val);
            var selectList=document.getElementById("sub_head_id");
           // removeOptions(selectList);

            var val = xmlhttp.responseText;
            //alert('hi faysal');
            var jsonData = JSON.parse(val);
            //	alert(jsonData);
            for (var i = 0; i < jsonData.length; i++)
            {
                var option = document.createElement('option');
                option.value = jsonData[i].id;  //value of option in backend
                option.text = jsonData[i].sub_head;	  //text of option in frontend
                selectList.appendChild(option);
            }
        }
    }

    function removeOptions(selectbox)
    {
        var i;
        for(i=selectbox.options.length-1;i>=1;i--)
        {
            selectbox.remove(i);
        }
    }




</script>


