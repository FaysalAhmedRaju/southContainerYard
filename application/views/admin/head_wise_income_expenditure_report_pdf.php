<html>
<head>
    <table align="center" width="95%">
        <tr>

            <td  align="center"><img  src="<?php echo base_url('resources/images/datasoft_logo.gif') ?>" align="middle"  width="200px" height="70px" > </td>
        </tr>
        <tr>
            <td align="center"><font size="4"><h2><b>DataSoft System Bangladesh Ltd.</b></h2></font></td>
        </tr>
        <tr>
            <td align="center"><font size="4"><h3><b>Head Wise Income/Expenditure REPORT</b></h3></font></td>
        </tr>
        <tr>
            <td align="center"><font size="4"><b>Head Name : <?php echo $rslt_icd_report_datewise[0]['head_name']?></b></font></td>
        </tr>

        <tr>

            <td align="center"><font size="4"><b>Time : <?php echo $icd_entry_date; ?></b></font></td>
        </tr>
    </table>
</head>
<body>
<table border="1" align="center" width="70%" style="border-collapse:collapse">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Sub Head Name</th>
        <th>Type</th>
        <th>Entry Date</th>
        <th>User</th>
        <th>Income</th>
        <th>Expenditure</th>
        <th>Comment</th>

    </tr>
    </thead>
    <?php
    $tot_entry=0; $totalIncome = 0; $totalExpanse = 0; $total_revenue = 0;
    for($i=0;$i<count($rslt_icd_report_datewise);$i++)
    {
        ?>
        <tr>
            <td align="center"><?php echo $i+1;?></td>

            <td align="center"><?php echo $rslt_icd_report_datewise[$i]['sub_head']?></td>
            <td align="center"><?php echo $rslt_icd_report_datewise[$i]['t_type']?></td>
            <td align="center"><?php echo $rslt_icd_report_datewise[$i]['created_at']?></td>
            <td align="center"><?php echo $rslt_icd_report_datewise[$i]['username']?></td>
            <td align="center"><?php echo $this->encrypt->decode($rslt_icd_report_datewise[$i]['credit'])?></td>
            <td align="center"><?php echo $this->encrypt->decode($rslt_icd_report_datewise[$i]['debit'])?></td>
            <td align="center"><?php echo $rslt_icd_report_datewise[$i]['comment']?></td>
        </tr>
        <?php
        $totalIncome = $totalIncome + $this->encrypt->decode($rslt_icd_report_datewise[$i]['credit']);
        $totalExpanse = $totalExpanse + $this->encrypt->decode($rslt_icd_report_datewise[$i]['debit']);
        $total_revenue = $totalIncome - $totalExpanse;

    }
    ?>
    <tr>

        <td align="center" colspan="5"><b>Total Income/Expenditure</b></td>
        <td align="center"><b><?php echo $totalIncome; ?></b></td>
        <td align="center"><b><?php echo $totalExpanse; ?></b></td>
        <td align="center" ><b></b></td>
    </tr>
    <tr>

        <td align="center" colspan="5"><b>Total Balance</b></td>
        <td align="center" colspan="2"><b><?php echo $total_revenue; ?></b></td>
        <td align="center" ><b></b></td>

    </tr>
</table>
</body>
</html>
