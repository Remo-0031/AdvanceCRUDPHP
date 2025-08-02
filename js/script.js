$(document).ready(function() {
// Adding users

$(document).on('submit','#addform',function(e) {
    e.preventDefault();
    // AJAX
    $.ajax({
        url: "/AdvanceCRUDPHP/ajax.php",
        type: "POST",
        dataType: "json",
        data: new FormData(this),
        processData: false,
        contentType:false,
        beforeSend:function(){
            console.log("Wait...Data is loading");
        },
        success:function(response){
            $("#userModal").modal("hide");
            $("#addform")[0].reset();
        },
        error:function(request,error){
            console.log(arguments);
            console.log("Error"+error);
        }
    })
})

function getUsers() {
    const pageno = $('#currentpage').val();
    $.ajax({
        url: "/AdvanceCRUDPHP/ajax.php",
        type: "GET",
        dataType: "json",
        data: {page:pageno,action:'getallusers'},
        beforeSend: function() {
            console.log("Wait data is loading...");
        },
        success: function(row) {
            console.log(row);

        },
        error: function(request,error){
            console.log(arguments);
            console.log("Error: " + error);
        }
    })
}

getUsers();
})
