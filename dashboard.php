<?php include 'include/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card profile-card shadow p-3 mb-5 bg-white rounded">
                <div class="card-content">
                    <div class="card-body p-auto">
                        <div class="profile"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583336/AAA/4.jpg" class="img-thumbnail img-fluid" style="width: 180px !important; height: 180px !important;"> </div>
                        <div class="card-title"> <?= $member_data['name']; ?>
                        </div>
                        <div class="card-subtitle">
                            <p>
                                <strong class="badge badge-success p-2 mr-2">Blood Group: </strong><span class="badge badge-danger p-2"><?= strtoupper($member_data['blood_group']) ?></span><br>
                                <strong>Phone Number: </strong><span><?= $member_data['phone']; ?></span><br>
                                <strong>Email: </strong><span><?= $member_data['email']; ?></span><br>
                                <strong>Address: </strong><span class="text-danger"><?= $member_data['upozilla_name']; ?>, <?= $member_data['district_name']; ?>, <?= $member_data['division_name']; ?></span><br>
                                <strong>Last Donate: </strong><span><?= $help->timeAgo($member_data['created_at']); ?></span>
                            </p>
                            <a href="#" class="btn btn-danger btn-block" data-target="#edit" data-toggle="pill">Update Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card z-depth-3 shadow mb-5 bg-white rounded">
                <div class="card-body">
                    <ul class="nav nav-pills nav-pills-danger nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="fa fa-user"></i> <span class="hidden-xs">Last Donation Details</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="fa fa-envelope-open"></i> <span class="hidden-xs">Donation Details</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span></a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active show" id="profile">
                            <h5 class="mb-3 text-success font-weight-bold mr-5">Last Donation Details
                            </h5>

                            <div class="donation_details text-danger">
                                <h5>Patient Name: <span class="ml-4 badge badge-danger">Jhon Doe</span></h5>
                                <h5>Patient Problem: <span class="ml-4 badge badge-danger">Delivery</span></h5>
                                <h5>Blood Group: <span class="ml-4 badge badge-danger">O+</span></h5>
                                <h5>Blood Quantity: <span class="ml-4 badge badge-danger">2 beg</span></h5>
                                <h5>Himoglobin: <span class="ml-4 badge badge-danger">Don't know</span></h5>
                                <h5>Donation Date: <span class="ml-4 badge badge-danger">Emergency</span></h5>
                                <h5>Donation Place: <span class="ml-4 badge badge-danger p-2">Cumilla Medical Tower Hospital</span></h5>
                                <h5>Contact Number: <span class="ml-4 badge badge-danger p-2">+016748569</span></h5>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="messages">
                            <h4 class="card-title text-danger font-weight-bold">All Donation Details
                                <a href="#" class="text-danger ml-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Your Donation Details"><i class="fa fa-circle-plus" data-toggle="modal" data-target="#addDetails"></i></a>
                            </h4>
                            <hr>
                            <div id="display_details">

                            </div>                                
                        </div>
                        <div class="tab-pane" id="edit">
                            <form action="" method="post" id="update_profile_from">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" id="name" type="text" value="<?= $member_data['name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="email" id="email" type="email" value="<?= $member_data['email'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="phone" id="phone" type="num" value="<?= $member_data['phone'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="photo" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="address" type="text" value="<?= $member_data['address'] ?>" placeholder="Street">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-5">
                                        <select name="blood_group" id="" class="form-control">
                                            <option value="">blood group</option>
                                            <option <?= ($member_data['blood_group'] == 'o+' ? 'selected' : '') ?> value="o+">O+</option>
                                            <option <?= ($member_data['blood_group'] == 'o-' ? 'selected' : '') ?> value="o-">O-</option>
                                            <option <?= ($member_data['blood_group'] == 'a+' ? 'selected' : '') ?> value="a+">A+</option>
                                            <option <?= ($member_data['blood_group'] == 'a-' ? 'selected' : '') ?> value="a-">A-</option>
                                            <option <?= ($member_data['blood_group'] == 'b+' ? 'selected' : '') ?> value="b+">B+</option>
                                            <option <?= ($member_data['blood_group'] == 'b-' ? 'selected' : '') ?> value="b-">B-</option>
                                            <option <?= ($member_data['blood_group'] == 'ab+' ? 'selected' : '') ?> value="ab+">AB+</option>
                                            <option <?= ($member_data['blood_group'] == 'ab-' ? 'selected' : '') ?> value="ab-">AB-</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name="division" id="division" class="form-control">
                                            <option value="">Select Your Division</option>
                                            <?php foreach ($division as $value) : ?>
                                                <option <?= ($member_data['division'] == $value['id'] ? 'selected' : '') ?> value="<?= $value['id']; ?>"><?= $value['division_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-5">
                                        <input type="hidden" name="district" value="<?= $member_data['district'] ?>">
                                        <select name="district" id="district" class="form-control">
                                            <option value="">Select Your District</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="hidden" name="upazilla" value="<?= $member_data['upazilla'] ?>">
                                        <select name="upazilla" id="thana" class="form-control">
                                            <option value="">Select Your Thana</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="username" type="text" value="<?= $member_data['username'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="password" type="password">
                                        <span class="text-danger">If you don't change your password. Don't fill up password field.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="cpassword" type="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="button" class="btn btn-danger" id="update_profile_btn" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/add_details.php' ?>
<?php include 'include/footer.php'; ?>