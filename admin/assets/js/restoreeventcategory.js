$(document).ready(function () {
    $('.restoreeventcategory').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('value');
        // alert(id);
        swal({
            title: "confirm restore event category",
            text: "Once restore, it will add to category",
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
                    restoreeventcategoryid: id,
                    restoreeventcategory: true
                },
                success: function (response) {
                    // Handle success response here
                    response = JSON.parse(response);
                    if (response === 200){
                        swal("Success!", "category restored successfully!", "success")
                        .then(() => {
                            window.location.href = "../admin/Admineventcategory"; // Adjust URL as necessary
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
