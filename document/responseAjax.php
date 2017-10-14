<?php

?>
<script>

</script>

/*
|-----------------------------------------------------------------------------------------------------------
| Kiểu thông thường hay dùng
|-----------------------------------------------------------------------------------------------------------
*/
<?php
    return response("hihi",200)->header('Content-Type', 'text/plain');
?>
<script>
    dataType: 'json',
    success: function (response){
        console.log(response); // hihi
    }
    // Hoặc
    success: function (data, status){
        console.log(data + " " + status); // hihi success
    }
</script>

/*
|-----------------------------------------------------------------------------------------------------------
| Khi trả về một mảng Json
|-----------------------------------------------------------------------------------------------------------
*/
<?php
return response()->json([
    'name' => 'Abigail',
    'state'=> 'CA'
]);
?>
<script>
$.ajax({
    dataType: json, // kiểu dữ liệu trả về, có thể là json, xml, script hoặc text
    success: function(res){
        console.log(res.name); // Abigail
    }
});
</script>