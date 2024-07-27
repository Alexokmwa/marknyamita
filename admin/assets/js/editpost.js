$(document).ready(function () {
    $('.editpostbtn').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('value');
        alert(id);
        swal({
            title: "confirm edit",
            text: "Once edited,you can not undo",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                type: "POST",
                url: "<?=ROOTADMIN?>Admineditpost",
                data: {
                    product_id: id,
                    editpostbtn: true
                },
                success: function (response) {
                    // Handle success response here
                    response = JSON.parse(response);
              console.log(response);

                    if (response.message === "Edit successful"){
                        swal("Success!", "Product edited successfully!", "success");
                        $("#activetable").load(location.href + " #activetable");
                    }
                    else if (response.message === "Edit failed"){
                        swal("Oops!", "Something went wrong!", "error");
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    swal("Oops!", "Something went wrong!", "error");
                    console.error(xhr.responseText);
                }
             });
            } else {
              swal("Your data is safe!");
            }
          });
    });
});
