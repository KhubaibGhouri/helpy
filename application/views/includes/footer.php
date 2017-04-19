

<script
    type="text/javascript"
    src="<?php echo $base_url; ?>/assets/js/backend.js"></script>
<script
    type="text/javascript"
    src="<?php echo $base_url; ?>/assets/js/general_functions.js"></script>
</body>


<script>
    $.ajax({
        type: "POST",
        url: "http://localhost/helpy/api/v1/appointments/64",
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function(html){
           console.log(html);
        }
    });
</script>
</html>
