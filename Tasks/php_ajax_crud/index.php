<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student details</title>
    <style>
        label{
            display:block
        }
    </style>
</head>
<body>
    <form id="studenform">
        <label>Name :</label>
        <input type="text" name="sname" value="">
        <label>Age :</label>
        <input type="number" name="sage" value="">
        <label>City :</label>
        <input type="text" name="sname" value="">
        <br>
        <input type="submit" name="submit_btn" id="submit_btn">
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){

        function jsonData(targetForm){
            var fd = new FormData();
            var other_data = $(targetForm).serializeArray();

            $.each(other_data,function(key,input){
                fd.append(input.name,input.value);
            });
            console.log('fd');
            console.log(fd)
            return fd;
        }

        $('#submit_btn').click(function(e){
            e.preventDefault();

            var arr = $('#studenform').serializeArray();

          
           var formdata = {};
           for(arr in y){
            obj[arr.name] = arr.value;
           }
           var formsData = JSON.stringify(obj);
            // $(arr).each(function(index, obj){
            //     formdata[obj.name] = obj.value;
            // });
            $.ajax({
                url: "http://localhost/php_ajax_crud/insert.php",
                type:"post",
                data: formsData,
                success: function(r)
                {
                    //$("#div1").html(r);
                }
            });
        });
    });
</script>
</html>