
<h2 class="text-center"><?php echo $this->session->flashdata('user_loggedin') . $this->session->flashdata('login_failed') . $this->session->flashdata('user_loggedout'); ?></h2>


<?php

//    echo '<pre>';
//    print_r($profile);

?>
<div class="container">
<table class="table table-borderd table-hover" >
    <thead>
        <th>id</th>
        <th>name</th>
        <th>user_full_name</th>
        <th>Email</th>
        <th>user_zipcode</th>
        <th>user_created</th>
    </thead>
    <tbody>
        <td><?= $profile->user_id ?></td>
        <td><?= $profile->user_name ?></td>
        <td><?= $profile->user_full_name ?></td>
        <td><?= $profile->user_email ?></td>
        <td><?= $profile->user_zipcode ?></td>
        <td><?= $profile->user_created ?></td>
    </tbody>
</table>

</div>

