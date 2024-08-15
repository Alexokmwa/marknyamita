$(document).ready(function () {
    $('.deleteeventcategorytrash').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('value');
        swal({
            title: "confirm event delete",
            text: "Once deleted,you can not undo",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                type: "POST",
                url: "../admin/Admindeleteeventcategory",
                data: {
                    deleteeventcategorytrashid: id,
                    deleteeventcategorytrash: true
                },
                success: function (response) {
                    // Handle success response here
                    response = JSON.parse(response);
                    if (response === 200){
                        swal("Success!", "event deleted successfully!", "success")
                        .then(() => {
                            window.location.href = "../admin/Eventcategorytrash"; // Adjust URL as necessary
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
              swal("Your data is safe!");
            }
          });
    });
});
