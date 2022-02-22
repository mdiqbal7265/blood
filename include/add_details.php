<!-- Register Modal -->
<div id="addDetails" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger font-weight-bold">Add Donation Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <img src="assets/img/footer-logo.png" alt="" width="260px" class="mb-4">
                <form action="" method="post" id="add_details_form">
                    <input type="hidden" name="member_id" id="member_id" value="<?= $member_data['id']; ?>">
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="patient_name" class="form-control" placeholder="Patient Name" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-circle-exclamation"></i></span>
                                </div>
                                <input type="text" name="patient_problem" class="form-control" placeholder="Patient Problem" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-heart"></i></span>
                                </div>
                                <input type="text" name="blood_group" class="form-control" placeholder="Blood Group" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-keyboard"></i></span>
                                </div>
                                <input type="number" name="blood_quantity" class="form-control" placeholder="Blood Quantity" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars-staggered"></i></span>
                                </div>
                                <input type="text" name="himoglobin" class="form-control" placeholder="Himoglobin" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-plus"></i></span>
                                </div>
                                <input type="date" name="donation_date" class="form-control" placeholder="Donation Date" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row text-left">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-location-dot"></i></span>
                                </div>
                                <input type="text" name="donation_place" class="form-control" placeholder="Donation Place" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-square-phone-flip"></i></span>
                                </div>
                                <input type="number" name="contact_number" class="form-control" placeholder="Contact Number" aria-label="Name" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add Details" class="btn btn-danger btn-block" id="add_details_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Register Modal -->