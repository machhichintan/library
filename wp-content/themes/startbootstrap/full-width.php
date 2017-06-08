<?php
/*
 * Template name:Full Width
 */
get_header();
?>
<?php

if (isset($_POST['add_data'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $mother_name = $_POST['mother_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];

    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $zipcode = $_POST['zipcode'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $occupation = $_POST['occupation'];
    $occupation_area = $_POST['occupation_area'];

    $brother_name[] = $_POST['brother_name'];
    $sister_name[] = $_POST['sister_name'];
    $spouse = $_POST['spouse'];
    $child[] = $_POST['childs'];
    
    $my_post = array(
        'post_title' => $first_name,
        'post_content' => '',
        'post_status' => 'publish',
        'post_type' => 'post',
    );

    // Insert the post into the database
    $mypost_id = wp_insert_post($my_post, true);
    if(is_wp_error($mypost_id)){
        ?>
        <script>alert("Enter Data");</script>
    <?php
    }
    else{
            update_post_meta($mypost_id, 'lastname', $last_name);
            update_post_meta($mypost_id, 'middlename', $middle_name);
            update_post_meta($mypost_id, 'mothername', $mother_name);
            update_post_meta($mypost_id, 'gender', $gender);
            update_post_meta($mypost_id, 'dateofbirth', $dob);
            update_post_meta($mypost_id, 'religion', $religion);
            update_post_meta($mypost_id, 'nationality', $nationality);
            
            update_post_meta($mypost_id, 'email', $email);
            update_post_meta($mypost_id, 'mobile', $mobile);
            update_post_meta($mypost_id, 'zipcode', $zipcode);
            update_post_meta($mypost_id, 'address', $address);
            update_post_meta($mypost_id, 'area', $area);
            update_post_meta($mypost_id, 'city', $city);
            update_post_meta($mypost_id, 'state', $state);
            update_post_meta($mypost_id, 'country', $country);
            
            update_post_meta($mypost_id, 'occupation', $occupation);
            update_post_meta($mypost_id, 'occupationarea', $occupation_area);
            update_post_meta($mypost_id, 'spouse', $spouse);
            
            foreach($brother_name as $newname){
                add_post_meta($mypost_id, 'brothername', $newname);
            }
            foreach($sister_name as $newname){
                add_post_meta($mypost_id, 'sistername', $newname);
            }
            foreach($child as $newname){
                add_post_meta($mypost_id, 'childran', $newname);
            }
            ?>
            <script>
                alert("success");
            </script>
<?php
    }
}
?>


<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Add New User</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <form name="details_form" method="post">
                <div class="container">
                    <div class="form-group mypanel" data-toggle="collapse" data-target="#demo">
                        (A) Personal Information
                        <span class="fa fa-plus myclass pull-right"></span>
                    </div>
                    <div id="demo" class="active">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Last Name 
                                    <span class="lname_error" style="color: red;">
                                        <?php 
                                        if(isset($first_name))
                                            {
                                                echo "&nbsp"." "."* Please Enter First Name";
                                            }
                                        ?>
                                    </span>
                                </label>
                                <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last Name" >
                            </div>
                            <div class="form-group">
                                <label>First Name
                                    <span class="fname_error" style="color: red;">
                                        <?php 
                                        if(isset($last_name))
                                            {
                                                echo "&nbsp"." "."* Please Enter Last Name";
                                            }
                                        ?>
                                    </span>
                                </label>
                                <input type="text" name="first_name" class="form-control" id="fname" placeholder="First Name" >
                            </div>
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" id="mname" placeholder="Middle Name" >
                            </div>
                            <div class="form-group">
                                <label>Mother Name</label>
                                <input type="text" name="mother_name" class="form-control" id="m_name" placeholder="Mother Name" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control" id="g_gender">
                                    <option style="">Select</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="text" name="dob" class="form-control" id="datepicker" placeholder="DD/MM/YYYY" >
                            </div>
                            <div class="form-group">
                                <label>Religion </label>
                                <input type="text" name="religion" class="form-control" placeholder="Religion" >
                            </div>
                            <div class="form-group">
                                <label>Nationality </label>
                                <input type="text" name="nationality" class="form-control" placeholder="Nationality" >
                            </div>
                        </div>
                        <!--<button type="submit" class="btn btn-default">Submit</button>-->
                    </div>
                </div>

                <div class="container">
                    <div class="form-group mypanel" data-toggle="collapse" data-target="#demo1">
                        (B) Contact Information
                        <span class="fa fa-plus myclass pull-right"></span>
                    </div>
                    <div id="demo1" class="collapse">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email ID</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" >
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile" >
                            </div>
                            <div class="form-group">
                                <label>Zipcode</label>
                                <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Zipcode" >
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" placeholder="Address" ></textarea> 
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Area</label>
                                <input type="text" id="area_pin" name="area" class="form-control" placeholder="Area Name" >
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" id="city_pin" name="city" class="form-control" placeholder="City Name" >
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" id="state_pin" readonly name="state" class="form-control" placeholder="State Name" >
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" id="country_pin" readonly name="country" class="form-control" placeholder="Country Name" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="form-group mypanel" data-toggle="collapse" data-target="#demo2">
                        (C) Occupation
                        <span class="fa fa-plus myclass pull-right"></span>
                    </div>
                    <div id="demo2" class="collapse">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Occupation</label>
                                <input type="text" name="occupation" class="form-control" placeholder="Occupation" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Occupation Area</label>
                                <input type="text" name="occupation_area" class="form-control" placeholder="Occupation Area" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="form-group mypanel" data-toggle="collapse" data-target="#demo3">
                        (D) Family Background
                        <span class="fa fa-plus myclass pull-right"></span>
                    </div>
                    <div id="demo3" class="collapse">

                        <div class="col-lg-6">
                            <div class="form-group brother_name">
                                <label>Brother Name</label>
                                <input type="text" name="brother_name[]" class="form-control" placeholder="Brother Name" ><br />
                            </div>
                            <div class="hide_brother">
                                <span class="btn btn-info" id="add_brother"><input type="button" style="border:none; background-color: #5bc0de;" name="add_brother" value="Add Brother"></span>&nbsp;&nbsp;&nbsp;<label class="brother_msg"></label>
                            </div><br />

                            <div class="form-group sister_name">
                                <label>Sister Name</label>
                                <input type="text" name="sister_name[]" class="form-control" placeholder="Sister Name" ><br />
                            </div>
                            <div class="hide_sister">
                                <span class="btn btn-info" id="add_sister"><input type="button" style="border:none; background-color: #5bc0de;" name="add_sister" value="Add Sister"></span>&nbsp;&nbsp;&nbsp;<label class="sister_msg"></label>
                            </div><br />

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Married</label><br />
                                Yes/No &nbsp;<input type="checkbox" id="married_check" name="married" >
                            </div>
                            <div class="form-group spouse_name">
                                <label>Spouse</label>
                                <input type="text" id="spouse_name" name="spouse" class="form-control" placeholder="Spouse Name" ><br />
                            </div>
                            <div class="hide_child">
                                <span class="btn btn-info" id="add_chiled"><input type="button" style="border:none; background-color: #5bc0de;" name="add_children" value="Child">&nbsp;&nbsp;<i class="fa fa-child" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;<label class="child_msg"></label>
                            </div><br />

                        </div>
                    </div>
                </div>
                <button type="submit" name="add_data" class="btn btn-default" style="box-shadow: 1px 3px 5px #888888;">Submit</button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>