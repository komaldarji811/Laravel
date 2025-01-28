<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select name="country_dropdown" id="country_dropdown">
        <option>--select country--</option>
        @foreach($country as $c)
        <option value="{{$c->id}}">{{$c->name}} </option>
        @endforeach
    </select>
    <select name="state_dropdown" id="state_dropdown">
        <option>--select state--</option>
    </select>
    <select name="city_dropdown" id="city_dropdown">
        <option>--select city--</option>
    </select>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
            $('#country_dropdown').on("change",function(){
                $('#state_dropdown').html('<option>--select state--</option>');
                var country_id = $(this).val();
                //alert(country_id);
                $.ajax({
                    url:'/get-states',
                    data:{'cid':country_id},
                    type:'get',
                    datatype:'json',
                    success:function(res){
                       res.forEach(function (item) {
                            // Append each option to the dropdown
                            $('#state_dropdown').append(`<option value="${item.id}">${item.name}</option>`);
                        });
                    }
                })
            });

            $('#state_dropdown').on("change",function(){
                $('#city_dropdown').html('<option>--select city--</option>');
                var state_id = $(this).val();
                //alert(country_id);
                $.ajax({
                    url:'/get-cities',
                    data:{'sid':state_id},
                    type:'get',
                    datatype:'json',
                    success:function(res){
                       res.forEach(function (item) {
                            // Append each option to the dropdown
                            $('#city_dropdown').append(`<option value="${item.id}">${item.name}</option>`);
                        });
                    }
                })
            });
    });
</script>
</html>