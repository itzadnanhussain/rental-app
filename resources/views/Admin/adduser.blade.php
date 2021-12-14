@include('admin.header')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New User</h4>
                       <!-- success message -->
                       <div class="alert alert-success" id="alert-success" style="display: none;" role="alert"></div>
                        <!-- warning message -->
                        <div class="alert alert-warning" id="alert-warning" style="display: none;" role="alert">

                        </div>

                    <form class="file-form" action="<?php echo SERVER_ROOT_PATH.'admin/add_user_process' ?>" enctype="multipart/form-data">



                        <div class="form-group">
                            <label for="exampleSelectGender">Select User Type</label>
                            <select class="form-control" name="user_type" id="exampleSelectGender">
                                <option value="host">Host</option>
                                <option value="guest">Guest</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Profile</label>
                            <input type="file" name="profile" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Profile">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload Profile</button>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                         </div>
                        <input type="submit" class="btn btn-primary mr-2" value="Submit"> 
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
 