
<div class="content-wrapper">

        <div class="col-md-12"  style="background-color: #bee5eb; /*whitesmoke*/">
            <div class="row">
              <span>&nbsp;</span>
            </div>
            <div  class="row">
                <div class="col-sm-4">
                    <a href="<?php echo base_url('admin_controller/income_expenditure_form_view'); ?>" class="btn btn-success" >Add Item</a>
                </div>
                <div class="col-sm-4">
                    <?php echo form_open("admin_controller/searchUser" , ['class' => 'form-inline']); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchuser" name="search" placeholder="Search">
                    </div>
                    <button type="submit" name="searchBtn" class="btn btn-primary submit">Search</button>
                    <button class="btn btn-default more" href="<?php echo site_url('admin_controller/dataListView') ?>">Refresh</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-sm-4">
                </div>
            </div>



            <table class="table table-bordered" >
                <caption><h4 class="text-center ok">Income/Expenditure List</h4></caption>
                
<!--                <form class="form-inline" role="form" action="--><?php //echo site_url().'/search/search_keyword';?><!--" method="post">-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" class="form-control" name="search" placeholder="Search by firstname">-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn btn-info" name="submit" >Search</button>-->
<!--                </form>-->

                <thead>
                <tr>
                    <th style="text-align: center">S/L</th>

                    <th style="text-align: center">Head Name</th>
                    <th style="text-align: center">Sub Head Name</th>
                    <th style="text-align: center">Transaction Type </th>
                    <th style="text-align: center">Debit</th>
                    <th style="text-align: center">Credit</th>
                    <th style="text-align: center">Date</th>

                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php   $i = 1;
                foreach ($data as $d) {
                    ?>
                    <tr>
                        <td style="text-align: center"><?php echo $i++ ?></td>

                        <td style="text-align: center"><?php  echo $d['head_name'] ?></td>
                        <td style="text-align: center"><?php echo $d['sub_head'] ?></td>
                        <td style="text-align: center"><?php echo $d['t_type'] ?></td>
                        <td style="text-align: center"><?php echo $this->encrypt->decode($d['debit']) ?></td>
                        <td style="text-align: center"><?php echo $this->encrypt->decode($d['credit']) ?></td>

                        <td style="text-align: center"><?php echo $d['created_at'] ?></td>
                        <td style="text-align: center">

                            <a href="<?php echo base_url('admin_controller/income_expenditure_edit/'.$d['id']); ?>" class="btn btn-success btn-sm" >
                                Edit
                            </a>
                            <a href="<?php echo base_url('admin_controller/delete_Income_expense/'.$d['id']); ?>"
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
                    <td colspan="8" class="text-center">

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
