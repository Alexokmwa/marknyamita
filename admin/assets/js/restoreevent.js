$(document).ready(function () {
    $('.restoreevent').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('value');
        swal({
            title: "confirm restore",
            text: "Once restored,you can view at eventlist",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                type: "POST",
                url: "../admin/Admindeleteevent",
                data: {
                    restoreeventid: id,
                    restoreevent: true
                },
                success: function (response) {
                    // Handle success response here
                    response = JSON.parse(response);
                    if (response === 200){
                        swal("Success!", "event restored successfully!", "success")
                        .then(() => {
                            window.location.href = "../admin/Admineventlist"; // Adjust URL as necessary
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
