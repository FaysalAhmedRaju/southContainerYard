
<div class="content-wrapper">
    <div class="col-md-12" id="head" style="background-color:inherit ">
        <div class="col-md-12" style="background-color: /*#f8f9f9 */ paleturquoise ; border-radius: 20px;">
            <h4 class="text-center ok"><b>User Registration Entry Form</b></h4><br>
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
                      action="<?php echo base_url('admin_controller/save_user_registration');?>"
                      method="POST">
                    <?php //print_r($dropData); ?>
                    <fieldset>

                        <?php //echo form_error('head_id');?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   aria-describedby="emailHelp"  placeholder="Enter Name" >
                            <?php echo form_error('name');?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email">
                            <?php echo form_error('email');?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="username" name="username"  aria-describedby="emailHelp"  placeholder="Enter Username"  />
                            <?php echo form_error('username');?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" /> <!--required=""-->
                            <?php echo form_error('password');?>
                        </div>
                        <?php //echo form_error('head_id');?>
                        <input type="submit" value="Save" class="btn btn-primary" id="hheeee" />
                        <!--                        <button  type="submit" class="btn btn-primary" id="btn-save">Save</button>-->
                    </fieldset>
                </form>
                <br>
            </div>
        </div>
        <div>
            <span>  &nbsp;</span>
        </div>
    </div>

    <div class="col-md-12"  style="background-color: #bee5eb; /*whitesmoke*/">
        <?php// print_r($data); ?>
        <table class="table table-bordered" >
            <caption><h4 class="text-center ok">User List</h4></caption>
            <thead>
            <tr>
                <th style="text-align: center">S/L</th>
                <th style="text-align: center">Name</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Username</th>
                <th style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php   $i = 1;
            foreach ($data as $d) {
                ?>
                <tr>
                    <td style="text-align: center"><?php echo $i++ ?></td>
                    <td style="text-align: center"><?php echo $d->name ?></td>
                    <td style="text-align: center"><?php echo $d->email ?></td>
                    <td style="text-align: center"><?php echo $d->username ?></td>
                    <td style="text-align: center">
                        <a href="<?php echo base_url('admin_controller/edit_user/'.$d->id); ?>" class="btn btn-success btn-sm" >
                            Edit
                        </a>
                        <!--                            --><?php // echo anchor('admin_controller/edit/'.$d->id,
                        //                                'Edit',['class' => 'btn btn-success btn-sm']);?>

                        <a href="<?php echo base_url('admin_controller/delete_user/'.$d->id); ?>"
                           class="btn btn-danger btn-sm" onclick="return confirm('Do You Want To Delete?');">
                            Delete
                        </a>
                        <!--                            --><?php //echo anchor('admin_controller/delete/'.$d->id,
                        //                                'Delete',['class' => 'btn btn-danger btn-sm']);?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-center">

                </td>
            </tr>
            </tfoot>
        </table>
        <?php
        echo  $this->pagination->create_links();
        ?>
    </div>


</div>

<script>
    //    $(document).ready(function () {
    //        $('#hheeee').on('click',function () {
    //            alert('working');
    //        });
    //
    //    });
//    function changehead_id(head_id)
//    {
//        // alert(head_id);
//
//        if(head_id=="")
//        {
//            sub_head_id.disabled=true;
//        }
//        else{
//
//            sub_head_id.disabled=false;
//            getSubHeadData();
//        }
//
//
//    }

    function validate()
    {
        if(document.income_expense_form.name.value == "")
        {
            alert( "Name Required!" );
            document.income_expense_form.name.focus() ;
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

//    function getSubHeadData()
//    {
//        //	alert(head_id);
//        if (window.XMLHttpRequest)
//        {
//            xmlhttp=new XMLHttpRequest();
//        }
//        else
//        {
//            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//        }
//
//        var head_id =document.getElementById("head_id").value;
//        // alert(head_id);
//        var url = "<?php //echo site_url('admin_controller/getSubHeadName')?>//?head_id="+head_id;
//        // xmlhttp.open("GET","<?php //echo site_url('ajaxController/getBlock')?>//?yard="+yard,false);
//        // alert(url);
//        xmlhttp.onreadystatechange=stateChangeAssignment;
//        xmlhttp.open("GET",url,false);
//
//        xmlhttp.send();
//    }
//
//    function stateChangeAssignment()
//    {
//        // alert(xmlhttp.status);
//        if (xmlhttp.readyState==4 && xmlhttp.status==200)
//        {
//            var val = xmlhttp.responseText;
//            // alert(val);
//            var selectList=document.getElementById("sub_head_id");
//            removeOptions(selectList);
//
//            var val = xmlhttp.responseText;
//            //alert('hi faysal');
//            var jsonData = JSON.parse(val);
//            //	alert(jsonData);
//            for (var i = 0; i < jsonData.length; i++)
//            {
//                var option = document.createElement('option');
//                option.value = jsonData[i].id;  //value of option in backend
//                option.text = jsonData[i].sub_head;	  //text of option in frontend
//                selectList.appendChild(option);
//            }
//        }
//    }
//
//    function removeOptions(selectbox)
//    {
//        var i;
//        for(i=selectbox.options.length-1;i>=1;i--)
//        {
//            selectbox.remove(i);
//        }
//    }




</script>


