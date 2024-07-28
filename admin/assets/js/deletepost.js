$(document).ready(function () {
    $('.deletepost').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('value');
        alert(id);
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
                url: "",
                data: {
                    postdeleteid: id,
                    deletepost: true
                },
                success: function (response) {
                    // Handle success response here
                    response = JSON.parse(response);
console.log(response);
                    if (response === 200){
                        swal("Success!", "Product deleted successfully!", "success")
                        .then(() => {
                            window.location.href = "../Adminpostlist"; // Adjust URL as necessary
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
