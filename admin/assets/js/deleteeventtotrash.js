$(document).ready(function () {
    $('.deleteeventtotrash').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('value');
        swal({
            title: "confirm event delete",
            text: "Once deleted,you can undo or restore",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                type: "POST",
                url: "../Admindeleteevent",
                data: {
                    deleteeventtotrashid: id,
                    deleteeventtotrash: true
                },
                success: function (response) {
                    // Handle success response here
                    response = JSON.parse(response);
                    if (response === 200){
                        swal("Success!", "event deleted successfully!", "success")
                        .then(() => {
                            window.location.href = "../Admineventlist"; // Adjust URL as necessary
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
              swal("Your event data is safe!");
            }
          });
    });
});
