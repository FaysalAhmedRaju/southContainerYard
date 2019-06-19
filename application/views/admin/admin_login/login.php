<?php include_once 'header.php'?>

<div class = "container">

    <div class="wrapper">

<?php //echo form_open('admin_controller/login_form_action',['method'=>'post',
//'name'=>'Login_Form','class'=>'form-signin']); ?>
        <form action="<?php echo base_url('login_controller/login_form_action');?>" method="post" name="Login_Form" class="form-signin">
            <?php if ($login_error = $this->session->flashdata('login_error')){ ?>
    <div class="alert alert-danger">
            <?php echo $login_error; ?>
    </div>

        <?php    } ?>

            <h3 class="form-signin-heading">Login to Your Account</h3>
            <hr class="colorgraph"><br>
<!--            --><?php //echo form_input(['type' => 'text',
//             'class' => 'form-control',
//            'name' => 'Username',
//            'placeholder' => 'Username',
//            'required' => '',
//            'autofocus' => '']); ?>
            <input type="text" class="form-control" name="Username" placeholder="Username"  /> <!--required="" autofocus=""-->
                <?php echo form_error('Username');?>

<!--            --><?php //echo form_error('Username', '<div class="error">', '</div>'); ?>
<!--            --><?php //echo validation_errors('<div class="error">', '</div>'); ?>

<!--            --><?php //echo form_input(['type' => 'password',
//            'class' => 'form-control',
//            'name' => 'Password',
//            'placeholder' => 'Password',
//             'required' => '',
//            'autofocus' => '']); ?>
            <input type="password" class="form-control" name="Password" placeholder="Password" /> <!--required=""-->
            <?php echo form_error('Password');?>
<!--            --><?php //echo form_error('Password', '<div class="error">', '</div>'); ?>
<!--            --><?php //echo validation_errors('<div class="error">', '</div>'); ?>

            <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
        </form>


    </div>


</div>
<?php // echo validation_errors('<span class="error">', '</span>'); ?>

<?php include_once 'footer.php'?>