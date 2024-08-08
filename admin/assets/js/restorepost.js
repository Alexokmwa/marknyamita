$(document).ready(function () {
    $('.restorepost').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('value');
        swal({
            title: "confirm delete",
            text: "Once deleted,you can not undo",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                type: "POST",
                url: "../admin/Admindeletepost",
                data: {
                    restorepostid: id,
                    restorepost: true
                },
                success: function (response) {
                    // Handle success response here
                    response = JSON.parse(response);
                    if (response === 200){
                        swal("Success!", "Product deleted successfully!", "success")
                        .then(() => {
                            window.location.href = "../admin/Adminpostlist"; // Adjust URL as necessary
                        });
                    }
                    else if (response === 500){
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
              swal("Your restore failed!");
            }
          });
    });
});
