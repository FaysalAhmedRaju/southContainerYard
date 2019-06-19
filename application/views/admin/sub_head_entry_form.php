
<div class="content-wrapper">
    <div class="col-md-12" id="head" style="background-color:inherit ">
        <div class="col-md-12" style="background-color: /*#f8f9f9 */ paleturquoise ; border-radius: 20px;">
            <h4 class="text-center ok"><b>Sub Head Entry Form</b></h4><br>
            <!--         <div class="alert alert-success" id="savingSuccessHead" ></div>-->
            <!--          <div class="alert alert-danger" id="savingErrorHead"></div>-->
            <!--            class="col-md-12 col-md-offset-4"-->
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
                <!--name="Account_Form" id="Account_Form" novalidate-->
                <form  name="sub_head_form" id="sub_head_form" action="<?php echo base_url('admin_controller/Save_sub_head');?>" onsubmit="return(validate());"
                      method="POST">
                    <?php //print_r($dropData); ?>
                    <fieldset>
                        <input type="hidden" name="id" value="<?php //echo $res->id?>">
                        <div class="form-group">
                            <label for="exampleSelect1">Select Head</label>
                            <select class="form-control" id="head_id" name="head_id">
                                <option value="">Select Head</option>
                                <?php
                                    foreach ($dropData as $d_data)
                                    {
                                        echo '<option value="'.$d_data->id.'">'.$d_data->head_name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <?php //echo form_error('head_id');?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Head</label>
                            <input type="text" class="form-control" id="sub_head_name" name="sub_head_name"
                                   aria-describedby="emailHelp"  placeholder="Type Sub Head Name" >

                        </div>
                        <?php //echo form_error('sub_head_name');?>
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="exampleInputPassword1">Password</label>-->
                        <!--                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
                        <!--                        </div>-->

                        <button  type="submit" class="btn btn-primary" id="btn-save">Save</button>
                    </fieldset>
                </form>
                <br>
            </div>
        </div>
        <div>
            <span>  &nbsp;</span>
        </div>
        <div class="col-md-12"  style="background-color: #bee5eb; /*whitesmoke*/">
            <?php //print_r($data); exit();  ?>
            <table class="table table-bordered" >
                <caption><h4 class="text-center ok">Sub Head List</h4></caption>
                <thead>
                <tr>
                    <th style="text-align: center">S/L</th>
                    <th style="text-align: center">Sub Head ID</th>
                    <th style="text-align: center">Head Name</th>
                    <th style="text-align: center">Sub Head Name</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php   $i = 1;
                foreach ($data as $d) {
                    ?>
                    <tr>
                        <td style="text-align: center"><?php echo $i++ ?></td>
                        <td style="text-align: center"><?php  echo $d['id'] ?></td>
                        <td style="text-align: center"><?php echo $d['head_name'] ?></td>
                        <td style="text-align: center"><?php echo $d['sub_head'] ?></td>
                        <td style="text-align: center">
<!--                                                        <button type="button" class="btn btn-success btn-sm">-->
<!--                                                            Edit-->
<!--                                                        </button>-->
                            <a href="<?php echo base_url('admin_controller/edit_sub_head/'.$d['id']); ?>" class="btn btn-success btn-sm" >
                                Edit
                            </a>

<!--                            --><?php //echo anchor('admin_controller/edit/'.$d['id'],
//                               'Edit',['class' => 'btn btn-success btn-sm']);?>

<!--                                                        <button type="button" class="btn btn-danger btn-sm">-->
<!--                                                            Delete-->
<!--                                                        </button>-->
<!--                            --><?php //echo anchor('admin_controller/delete/'.$d['id'],
//                                'Delete',['class' => 'btn btn-danger btn-sm']);?>

                            <a href="<?php echo base_url('admin_controller/delete_sub_head/'.$d['id']); ?>"
                               class="btn btn-danger btn-sm" onclick="return confirm('Do You Want To Delete?');">
                                Delete
                            </a>
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

</div>

<script>
    function validate()
    {
        if(document.sub_head_form.head_id.value == "")
        {
            alert( "Please Select Head!" );
            document.sub_head_form.head_id.focus() ;
            return false;
        }else if(document.sub_head_form.sub_head_name.value == ""){
            alert( "Please Select Sub Head!" );
            document.sub_head_form.sub_head_name.focus() ;
            return false;
        }
    }
//    $(document).ready(function () {
//        $('#btn-save').on('click',function () {
//            alert('working');
//        });
//
//    });
</script>


