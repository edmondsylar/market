<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="<?php echo base_url(); ?>" class="btn btn-blue btn-sm ml-2" data-toggle="tooltip" data-placement="top" title="Return Home">
                    <i class="mdi mdi-home"></i>
                </a>
                <a href="<?php echo base_url(); ?>admin" class="btn btn-blue btn-sm ml-1" data-toggle="tooltip" data-placement="top" title="Dashboard">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
            </div>
            <h4 class="page-title">Available Built In Tags to Customize Emails</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>Tags</th>
                        <th>Function</th>
                        <th>Usage</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{site_logo}</td>
                            <td>Curent Website Logo Url</td>
                            <td>This tag grab your website logo url that can be use in image tags</td>
                        </tr>
                        <tr>
                            <td scope="row">{site_name}</td>
                            <td>Website Name</td>
                            <td>The tags will display your setted website name</td>
                        </tr>
                        <tr>
                            <td scope="row">{main_url}</td>
                            <td>Website Homepage Url</td>
                            <td>This tag set url website homepage url e.g http://elecom.com/</td>
                        </tr>
                        <tr>
                            <td scope="row">{user_firstname}</td>
                            <td>Customer Firstname</td>
                            <td>This tag set the particular customer firstname which the email is sending to.</td>
                        </tr>
                        <tr>
                            <td scope="row">{user_lastname}</td>
                            <td>Customer Lastname</td>
                            <td>This tag set the particular customer lastname which the email is sending to.</td>
                        </tr>
                        <tr>
                            <td scope="row">{verify_code}</td>
                            <td>User Account Verification Code</td>
                            <td>This tag carry the unique generated code that the user need to veriy and active his or her account.</td>
                        </tr>
                        <tr>
                            <td scope="row">{irect_verify}</td>
                            <td>Customer Verification Link</td>
                            <td>This tag handle the actual customer verification link</td>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>
</div>