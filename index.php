<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Boostrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome CDN LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <h1 class="bg-dark text-light text-center py-2">PHP Advance CRUD</h1>
    <div class="container">

        <!-- form modal -->
        <?php include 'form.php' ?>
        <?php include 'profile.php' ?>

        <!-- Input search and button Sections -->
        <div class="row mb-3">
            <div class="col-10">
                <div class="input-group">
                    <div class="input-group-text ">
                        <span class="input-group-text bg-dark"><i class="fas fa-search text-light"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="search user...">
                </div>
            </div>
            <div class="col-2">
                <button type="button" class="btn  btn-dark btn-primary" data-bs-toggle="modal"
                    data-bs-target="#userModal">
                    Add New User
                </button>

            </div>
        </div>

        <!-- table -->
        <?php include 'tableView.php' ?>

        <!-- Pagination -->

        <nav aria-label="Page navigation example" id="pagination">
            <ul class="pagination justify-content-center">
                <!-- <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
            </ul>
        </nav>
        <input type="hidden" value="1" name="currentpage" id="currentpage">
    </div>



    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Boostrap popper and js LINK -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK"
        crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
</body>

</html>