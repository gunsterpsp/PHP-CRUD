<script>

    $(document).on("click", "#submit", function(e){
        

        const name = $("#name").val();
        const email = $("#email").val();
        const mobile = $("#mobile").val();
        const submit = $("#submit").val();

        $.ajax({
            url: "insert.php",
            type: "post",
            data: {
                name: name,
                email: email,
                mobile: mobile,
                submit: submit

            },
            success: function(data){
                fetch();
                $("#results").html(data);
            }
        });

        

    });

    $(document).on("click", "#delete", function(e){
       e.preventDefault();

        const delete_id = $(this).attr("value");


        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Success! Record has been deleted!", {
                icon: "success",
                });
                $.ajax({
                    url: "delete.php",
                    type: "post",
                    data: {
                        delete_id: delete_id
                    },
                    success: function(data){
                        fetch();
                        $("#show").html(data);
                    }
        });
            } else {
                swal("This record is safe!");
            }
            });


    });


    $(document).on("click", "#edit", function(e){
        e.preventDefault();

        const edit_id = $(this).attr("value");

        $.ajax({
            url: "edit.php",
            type: "post",
            data: {
                edit_id: edit_id
            },
            success: function(data){
                $("#edit_data").html(data);
            }
        });

    });

    $(document).on("click", "#update", function(e){
        e.preventDefault();

        var edit_id = $("#edit_id").val();
        var edit_name = $("#edit_name").val();
        var edit_email = $("#edit_email").val();
        var edit_mobile = $("#edit_mobile").val();
        var update = $("#update").val();
        
        $.ajax({
            url: "update.php",
            type: "post",
            data: {
                edit_id: edit_id,
                edit_name: edit_name,
                edit_email: edit_email,
                edit_mobile: edit_mobile,
                update: update
            },
            success: function(data){
                fetch();
                $("#show").html(data);
            }

        });
        

    });






</script>
