<?php
session_start();

require_once 'classes/Database.php';
require_once 'classes/Helper.php';

$db = new Database();
$help = new Helper();


// Fetch Division
$division = $db->table('divisions')->getAll();

// Fetch District by division id
if (isset($_POST['divid'])) {
    $divid = $_POST['divid'];

    $dis = $db->table('districts')->where(['division_id' => $divid])->getAll();

    echo '<option value="">Select District</option>';
    foreach ($dis as $val) {
        echo '<option value="' . $val['id'] . '">' . $val['district_name'] . '</option>';
    }

    // print_r($_POST);
}

// Fetch upazilla by user id
if (isset($_POST['disid'])) {
    $disid = $_POST['disid'];

    $upazilla = $db->table('upazilas')->where(['district_id' => $disid])->getAll();
    echo '<option value="">Select Upazila</option>';
    foreach ($upazilla as $val) {
        echo '<option value="' . $val['id'] . '">' . $val['upozilla_name'] . '</option>';
    }
}

// Handle User Register From
if (isset($_POST['action']) && $_POST['action'] == 'register') {
    $fname = $help->sanitize_data($_POST['fname']);
    $lname = $help->sanitize_data($_POST['lname']);
    $name = $fname . ' ' . $lname;
    $password = $help->sanitize_data($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);

    $member = [
        'name' => $name,
        'email' => $help->sanitize_data($_POST['email']),
        'phone' => $help->sanitize_data($_POST['phone']),
        'blood_group' => $help->sanitize_data($_POST['blood_group']),
        'division' => $help->sanitize_data($_POST['division']),
        'district' => $help->sanitize_data($_POST['district']),
        'upazilla' => $help->sanitize_data($_POST['upazilla']),
        'username' => $help->sanitize_data($_POST['username']),
        'password' => $password,
    ];


    $member_exists = $db->table('member')->where(['username' => $member['username']])->get();

    if ($member_exists) {
        echo 'user_exists';
    } else {
        if ($db->table('member')->insert($member)) {
            echo 'register';
            $_SESSION['member'] = $member['username'];
        } else {
            echo 'failed';
        }
    }
}

// Hnadle Member Login
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    $username = $help->sanitize_data($_POST['username']);
    $password = $help->sanitize_data($_POST['password']);

    $loggedIn = $db->table('member')->where(['username' => $username])->get();
    if ($loggedIn != null) {
        if (password_verify($password, $loggedIn['password'])) {
            if (!empty($_POST['rem'])) {
                setcookie("username", $username, time() + (30 * 24 * 60 * 60), '/');
                setcookie("password", $password, time() + (30 * 24 * 60 * 60), '/');
            } else {
                setcookie("username", "", 1, '/');
                setcookie("password", "", 1, '/');
            }

            echo "login";
            $_SESSION['member'] = $username;
        } else {
            echo 'password_not_matched';
            //echo $help->message('danger','Password didn\'t matched with your email');
        }
    } else {
        echo 'data_not_found';
        //echo $help->message('danger','We didn\'t find your email in our database');
    }
}

// Handle Member Logout
if (isset($_POST['action']) && $_POST['action'] == 'logout') {
    unset($_SESSION['member']);
    echo 'logout';
}

// Add Donation Details
if (isset($_POST['action']) && $_POST['action'] == 'add_details') {
    $data = [
        'patient_name' => $help->sanitize_data($_POST['patient_name']),
        'patient_problem' => $help->sanitize_data($_POST['patient_problem']),
        'blood_group' => $help->sanitize_data($_POST['blood_group']),
        'blood_quantity' => $help->sanitize_data($_POST['blood_quantity']),
        'himoglobin' => $help->sanitize_data($_POST['himoglobin']),
        'donation_date' => $help->sanitize_data($_POST['donation_date']),
        'donation_place' => $help->sanitize_data($_POST['donation_place']),
        'contact_number' => $help->sanitize_data($_POST['contact_number']),
        'member_id' => $help->sanitize_data($_POST['member_id']),
    ];

    $db->table('donation_details')->insert($data);
    echo true;
    // print_r($_POST);
}

// Fetch Donation Details
if (isset($_POST['action']) && $_POST['action'] == 'fetch_details') {
    $id = $_POST['id'];
    $output = "";
    $data = $db->table('donation_details')->where(['member_id' => $id])->getAll();

    if ($data) {
        $output .= '<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Patient Problem</th>
                <th>Blood Group</th>
                <th>Donation Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($data as $value) {
            $output .= '<tr>
                <td>' . $value['patient_name'] . '</td>
                <td>' . $value['patient_problem'] . '</td>
                <td>' . $value['blood_group'] . '</td>
                <td>' . $value['donation_date'] . '</td>
                <td>
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details" class="text-info"><i class="fa fa-info-circle"></i></a>&nbsp;
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Details" class="text-success"><i class="fa fa-edit"></i></a>&nbsp;
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Details" class="text-danger"><i class="fa fa-trash"></i></a>&nbsp;
                </td>            
            </tr>';
        }

        $output .= '</tbody>
        </table>';

        echo $output;
    } else {
        echo "<h2 class='text-center text-danger'>No Data Available Here.</h2>";
    }
}
