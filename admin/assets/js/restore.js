$(document).ready(function () {
    $('.restorecategory').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('value');
        // alert(id);
        swal({
            title: "confirm restore",
            text: "Once restore, it will add to category",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                type: "POST",
                url: "../admin/Admindeletecategory",
                data: {
                    restorecategoryid: id,
                    restorecategory: true
                },
                success: function (response) {
                    // Handle success response here
                    response = JSON.parse(response);
                    if (response === 200){
                        swal("Success!", "category restored successfully!", "success")
                        .then(() => {
                            window.location.href = "../admin/Adminpostcategories"; // Adjust URL as necessary
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
              swal("Failed to restore category!");
            }
          });
    });
});
