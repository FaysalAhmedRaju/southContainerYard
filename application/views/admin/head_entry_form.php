<script type="text/javascript" src="<?php //echo base_url().''?>"></script>
<script type="text/javascript">
//    $(document).ready(function () {
//
//        $('#hellobtn').click(function () {
//           alert('testing');
//        });
//
//    });
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


<!--    <div class="row">-->
<!---->
<!--        <div class="col-md-4 col-md-offset-2">-->
<!--            --><?php //if ($this->session->flashdata('success')){ ?>
<!--                <div id="mydivs" class="alert alert-success">-->
<!--                    --><?php //echo $this->session->flashdata('success'); ?>
<!--                </div>-->
<!---->
<!--            --><?php //   } ?>
<!--            <script>-->
<!--                setTimeout(function() {-->
<!--                    $('#mydivs').hide('fast');-->
<!--                }, 1500);-->
<!--            </script>-->
<!--            <form action="--><?php //echo base_url('admin_controller/insert_head');?><!--"-->
<!--            method="POST">-->
<!--                <h3>Head Entry Form</h3>-->
<!--                <hr>-->
<!--                <label>Head</label>-->
<!--                <input type="text" name="head_name" class="form-control">-->
<!--                <button class="btn btn-primary">Add Head</button>-->
<!---->
<!--            </form>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->

    <div class="col-md-12" id="head" style="background-color:inherit ">
        <div class="col-md-12" style="background-color: /*#f8f9f9 */ paleturquoise ; border-radius: 20px;">
            <h4 class="text-center ok"><b>Head Entry Form</b></h4><br>
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
                <form action="<?php echo base_url('admin_controller/insert_head');?>"
                      method="POST">
                    <fieldset>
                        <input type="hidden" name="id" value="<?php //echo $res->id?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Head</label>
                            <input type="text" class="form-control" id="head_name" name="head_name"
                                   aria-describedby="emailHelp"  placeholder="Type Head Name" >

                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="exampleInputPassword1">Password</label>-->
<!--                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
<!--                        </div>-->

                        <button type="submit" class="btn btn-primary">Save</button>
                    </fieldset>
                </form>
<!--                <form action="--><?php //echo base_url('admin_controller/insert_head');?><!--"-->
<!--                      method="POST" >-->
<!--                                <input type="hidden" name="id" >-->
<!--                                    <label>Head</label>-->
<!--                                    <input style="width: 200px" type="text" name="head_name" class="form-control"-->
<!--                                      placeholder="Type Head Name">-->
<!---->
<!---->
<!--                                --><?php //$abc = 1;
//                                if($abc){ ?>
<!--                                    <button class="btn btn-primary">Save</button>-->
<!--                              --><?php //}else { ?><!--   <button class="btn btn-primary">Update</button>-->
<!--                           --><?php // } ?>
<!--                    -->
<!--                    </form>-->
                <br>
            </div>
        </div>
        <div>
            <span>  &nbsp;</span>
        </div>
        <div class="col-md-12"  style="background-color: #bee5eb; /*whitesmoke*/">
        <?php// print_r($data); ?>
            <table class="table table-bordered" >
                <caption><h4 class="text-center ok">Head List</h4></caption>
                <thead>
                <tr>
                    <th style="text-align: center">S/L</th>
                    <th style="text-align: center">Head ID</th>
                    <th style="text-align: center">Head Name</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php   $i = 1;
                foreach ($data as $d) {
                    ?>
                    <tr>
                        <td style="text-align: center"><?php echo $i++ ?></td>
                        <td style="text-align: center"><?php echo $d->id ?></td>
                        <td style="text-align: center"><?php echo $d->head_name ?></td>
                        <td style="text-align: center">
                            <a href="<?php echo base_url('admin_controller/edit/'.$d->id); ?>" class="btn btn-success btn-sm" >
                                Edit
                            </a>
<!--                            --><?php // echo anchor('admin_controller/edit/'.$d->id,
//                                'Edit',['class' => 'btn btn-success btn-sm']);?>

                            <a href="<?php echo base_url('admin_controller/delete/'.$d->id); ?>"
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
                    <td colspan="4" class="text-center">

                    </td>
                </tr>
                </tfoot>
            </table>
            <?php
            echo  $this->pagination->create_links();
            ?>
        </div>
    </div>

<?php

//function binaryToDecimal($n)
//{
//    $num = $n; //1010
//    $dec_value = 0;
//
//    // Initializing base value
//    // to 1, i.e 2^0
//    $base = 1;
//
//    $temp = $num;
//    //echo  $temp % 10; exit();// 0 or 1 all time
//   // $temp =  1 / 10;
//   //echo $temp =  1 / 10; exit();//11.1
//    while ($temp)//1010//101
//    {
//        $last_digit = $temp % 10; //1//0--1--0--1
//       // echo $last_digit,"\n"; // 1 0 1
//
//       // echo $temp.'--',"\n"; //10.1--1.01--0.101
//        $dec_value += $last_digit * $base;//1*1+1*2+1*4=7// 1*1+0*2+1*4=5//0+1*2+0*4+1*8
//        $temp = $temp / 10;  //101--10--1--0.1
//        $base = $base*2;//2--4--8
//        //echo $base,"\n";
//    }
//    return $dec_value;
//}

// Driver Code
//$num = 10101001;
//echo binaryToDecimal($num), "\n";



//function decToBinary($n)
//{
//
//    $i = 0;
//    while ($n > 0)
//    {
//        $binaryNum[$i] = $n % 2;
//        $n = (int)($n / 2);
//        $i++;
//    }
//
//
//    for ($j = $i - 1; $j >= 0; $j--)
//        echo $binaryNum[$j];
//}
//
//
//$n = 17;
//decToBinary($n);
?>
</div>


