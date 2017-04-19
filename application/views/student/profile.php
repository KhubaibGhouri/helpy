
<h2 class="text-center"><?php echo $this->session->flashdata('user_loggedin') . $this->session->flashdata('login_failed') . $this->session->flashdata('user_loggedout'); ?></h2>

<style>
    table>thead>tr>th, .table>thead>tr>th, table>tbody>tr>th, .table>tbody>tr>th, table>tfoot>tr>th, .table>tfoot>tr>th, table>thead>tr>td, .table>thead>tr>td, table>tbody>tr>td, .table>tbody>tr>td, table>tfoot>tr>td, .table>tfoot>tr>td {
        border: 2px solid #ecf0f1 !important;
    }
</style>

<div class="container">

    <h2 class="text-center">Profile</h2>
<table class="table table-borderd table-hover" >
    <thead>
        <th>id</th>
        <th>name</th>
        <th>Email</th>
        <th>user_zipcode</th>
        <th>Address</th>
    </thead>
    <tbody>
        <td><?= $profile->id ?></td>
        <td><?= $profile->first_name . $profile->last_name ?></td>
        <td><?= $profile->email ?></td>
        <td><?= $profile->zip_code ?></td>
        <td><?= $profile->address?></td>
    </tbody>
</table>


    <?php

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    exit;


    ?>


    <br><br>
    <h2 class="text-center">Appointments</h2>
    <table class="table table-borderd table-hover" >
        <thead>
        <th>id</th>
        <th>Book DateTime</th>
        <th>Start DateTime</th>
        <th>End DateTime</th>
        <th>Notes</th>
        <th>Provider ID</th>
        <th>Provider Name</th>
        </thead>
        <tbody>
    <?php

//    echo '<pre>';
//    print_r($appointments);
//    echo '<pre>';

foreach($appointments as $appointment) {
?>


            <tr>
            <td><?= $appointment->id ?></td>
            <td> <?= date( 'd-M-Y h:i:s:a', strtotime($appointment->book_datetime) )  ?></td>
            <td><?= date( 'd-M-Y h:i:s:a', strtotime($appointment->start_datetime) )  ?></td>
            <td><?= date( 'd-M-Y h:i:s:a', strtotime($appointment->end_datetime) ) ?></td>
            <td><?= $appointment->notes?></td>
            <td><?= $appointment->id?></td>
            <td><?= $appointment->first_name . $appointment->last_name ?></td>
            </tr>


    <?php
    }


    ?>
        </tbody>
    </table>
</div>

