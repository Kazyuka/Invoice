
@extends('layout')

@section('header')
    <head>
        <title>Laravel - Dynamically Add or Remove input fields using JQuery</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <script type="text/javascript">

        $(document).ready(function(){
            var postURL = "<?php echo url('/invoice'); ?>";
            var i=1;

            $('#add').click(function(){

                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /> <input type="text" name="price[]" placeholder="Enter Price" class="form-control price_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            $('#submit').click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url:postURL,
                    dataType:'json',
                    method:"POST",
                    data:$('#add_name').serialize(),
                    type:'json',

                    success: function (data) {
                        if(data.error){
                            alert(data.error);
                        }else{
                            i=1;
                            $('.dynamic-added').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display','block');
                            $(".print-error-msg").css('display','none');
                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                        }
                    }
                });

            });
        });

    </script>

@endsection


@section('content')
    <body>

    <div class="container">
        <h2 align="center">Create Invoice</h2>
        <div class="form-group">
            <form name="add_name" id="add_name">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>


                <div class="alert alert-success print-success-msg" style="display:none">
                    <ul></ul>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>

                            <td> <input id ="name" type="text" name="name[]" placeholder="Enter Description" class="form-control name_list" />  <input id ="price" type="number"  name="price[]" placeholder="Enter Price" class="form-control price_list" /> </td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>
                    <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </form>
        </div>
    </div>

@endsection









