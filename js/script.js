//function for pagination
function generatePagination(pageno, count) {
    var generatedPages = "";
    if (count) {
        const pages = Math.ceil(count / 5);
        const prevClass = (pageno==1) ? "disabled" : "";
        const nextClass = (pageno==pages)? "disabled": "";

        generatedPages += `<li class="page-item ${prevClass}"><a class="page-link" href="#">Previous</a></li>`

        for (let x = 1; x < pages + 1; x++) {
            if (x == pageno) {
                generatedPages += `<li class="page-item active"><a class="page-link" href="#">${x}</a></li>`;
            } else {
                generatedPages += `<li class="page-item"><a class="page-link" href="#">${x}</a></li>`;
            }
        }

        generatedPages += `<li class="page-item ${nextClass}"><a class="page-link" href="#">Next</a></li>`

        return generatedPages;
    }
}


function getUserRow(user) {
    var userRow = "";
    if (user) {
        userRow = `<tr>
            <td scope="row"><img style="width: 100px; height: 100px; object-fit: contain;" class="img-fluid" src=uploads/${user.photo}></td>
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.mobile}</td>
            <td>
                <a href="#" class="me-3 profile" data-bs-target="#userViewModal" data-bs-toggle="modal"
                    title="View Profile" data-id="${user.id}"><i class="fas fa-eye text-success"></i></a>
                <a href="#" class="me-3 edituser" title="Edit" data-bs-target="#userModal" data-bs-toggle="modal" data-id="${user.id}"><i
                        class="fas fa-edit text-info"></i></a>
                <a href="#" class="deleteuser" title="Delete" data-id="${user.id}"><i class="fas fa-trash-alt text-danger"></i></a>
            </td>
        </tr>`;
    }
    return userRow;
}

function getUsers() {
    const pageno = $('#currentpage').val();
    $.ajax({
        url: "/AdvanceCRUDPHP/ajax.php",
        type: "GET",
        dataType: "json",
        data: { page: pageno, action: 'getallusers' },
        beforeSend: function () {
            console.log("Wait data is loading...");
        },
        success: function (row) {
            console.log(row);
            if (row.users && row.count) {
                var userList = '';
                $.each(row.users, function (index, user) {
                    userList += getUserRow(user);
                });
                const paginationPageNo = $('#currentpage').val();
                let paginationHtml = generatePagination(paginationPageNo, row.count);
                
                $("#pagination ul").html(paginationHtml);
                $("#usertable tbody").html(userList);
            }
        },
        error: function (request, error) {
            console.log(arguments);
            console.log("Error: " + error);
        }
    })
}

$(document).ready(function () {
    // Adding users

    $(document).on('submit', '#addform', function (e) {
        e.preventDefault();
        // AJAX
        $.ajax({
            url: "/AdvanceCRUDPHP/ajax.php",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function () {
                console.log("Wait...Data is loading");
            },
            success: function (response) {
                $("#userModal").modal("hide");
                $("#addform")[0].reset();
                getUsers();
            },
            error: function (request, error) {
                console.log(arguments);
                console.log("Error" + error);
            }
        })
    })
    getUsers();
})
