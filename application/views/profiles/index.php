<?php
//
//echo '<pre>';
//print_r($teachers);
//echo '</pre><br>';
//echo '<pre>';
//print_r($students);
//echo '</pre><br>';

?>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<div class="container">



    <h1 class="text-center text-red"><?=  $this->session->flashdata('error')?></h1>

    <h2 class="text-center">Teachers </h2>
    <table class="table dattable table-default table-bordered ">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Full Name</th>
            <th>Phone </th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if(!empty($teachers)){
            foreach ($teachers as $teacher){
                ?>
                <tr>
                    <td><?= $teacher -> id?></td>
                    <td><?= $teacher -> first_name .'  '. $teacher -> last_name ?></td>
                    <td><?= $teacher -> phone_number?></td>
                    <td><?= $teacher -> address .' '. $teacher -> city .' '. $teacher -> state .' '. $teacher -> zip_code?></td>
                    <td><a href="<?= base_url()?>/messages/send/<?= $teacher -> id?>">Send Message</a> or <a
                            href="<?= base_url()?>/wallet/transfer/<?= $teacher -> id?>">Pay</a></td>
                </tr>
                <?php
            }
        }else {

            ?>
            <tr><td colspan="5"><center>Sorry No Teacher Found</center></td></tr>
            <?php
        }
        ?>
        </tbody>
    </table>


    <br><br><br>

    <h2 class="text-center">Students </h2>
    <table class="table dattable table-default table-bordered ">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Full Name</th>
            <th>Phone </th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if(!empty($students)){
            foreach ($students as $teacher){
                ?>
                <tr>
                    <td><?= $teacher -> id?></td>
                    <td><?= $teacher -> first_name .'  '. $teacher -> last_name ?></td>
                    <td><?= $teacher -> phone_number?></td>
                    <td><?= $teacher -> address .' '. $teacher -> city .' '. $teacher -> state .' '. $teacher -> zip_code?></td>
                    <td><a href="<?= base_url()?>/messages/send/<?= $teacher -> id?>">Send Message</a> or <a
                            href="<?= base_url()?>/wallet/transfer/<?= $teacher -> id?>">Pay</a></td>
                </tr>
                <?php
            }
        }else {

            ?>
            <tr><td colspan="5"><center>Sorry No Teacher Found</center></td></tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>




<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        $('.dattable').DataTable();
    } );
</script>