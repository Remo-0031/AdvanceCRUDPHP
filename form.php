<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adding or Updating Users</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addform" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Username -->
                    <div class="form-group">
                        <label>Name:</label>
                        <div class="input-group">
                            <div class="input-group-text ">
                                <span class="input-group-text bg-dark"><i class="fas fa-user-alt text-light"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter your username" autocomplete="off"
                                required="required" id="username" name="username">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email:</label>
                        <div class="input-group">
                            <div class="input-group-text ">
                                <span class="input-group-text bg-dark"><i
                                        class="fa-solid fa-envelope text-light"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter your Email" autocomplete="off"
                                required="required" id="email" name="email">
                        </div>
                    </div>

                    <!-- Mobile -->
                    <div class="form-group">
                        <label>Mobile:</label>
                        <div class="input-group">
                            <div class="input-group-text ">
                                <span class="input-group-text bg-dark"><i
                                        class="fa-solid fa-phone text-light"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter your Mobile" autocomplete="off"
                                required="required" id="mobile" name="mobile" maxlength="10" minlength="10">
                        </div>
                    </div>

                    <!-- Photo -->
                    <div class="form-group">
                        <label>Photo:</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="userphoto" name="userphoto">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>