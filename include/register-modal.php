<!-- Register Modal -->
<div id="RegisterModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger font-weight-bold">Member Registration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <img src="assets/img/footer-logo.png" alt="" width="260px" class="mb-4">
                <form action="" method="post" id="registration_form">
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="fname" class="form-control" placeholder="First Name" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile-phone"></i></span>
                            </div>
                            <input type="number" name="phone" class="form-control" placeholder="Phone" aria-label="email" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-heart"></i></span>
                                </div>
                                <select name="blood_group" id="" class="form-control">
                                    <option value="">blood group</option>
                                    <option value="o+">O+</option>
                                    <option value="o-">O-</option>
                                    <option value="a+">A+</option>
                                    <option value="a-">A-</option>
                                    <option value="b+">B+</option>
                                    <option value="b-">B-</option>
                                    <option value="ab+">AB+</option>
                                    <option value="ab-">AB-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-globe"></i></span>
                                </div>
                                <select name="division" id="division" class="form-control">
                                    <option value="">Select Your Division</option>
                                    <?php foreach ($division as $value) : ?>
                                        <option value="<?= $value['id']; ?>"><?= $value['division_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-pin"></i></span>
                                </div>
                                <select name="district" id="district" class="form-control">
                                    <option value="">Select Your District</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-location-arrow"></i></span>
                                </div>
                                <select name="upazilla" id="thana" class="form-control">
                                    <option value="">Select Your Thana</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="password" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Register" class="btn btn-danger btn-block" id="register_btn">
                    </div>
                </form>
            </div>
            <div class="modal-footer text-center">
                <a href="#" class="text-muter">Already Register?</a>
            </div>
        </div>
    </div>
</div>
<!-- Register Modal -->