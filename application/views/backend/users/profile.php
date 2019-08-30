<div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                       <h2><strong><?php echo $user['user_nama'] ?></strong></h2>
                    </div>
                    <div class="body clearfix">
                        <div class="row">
                        <div class="col-md-4 rounded">
                            <img src="<?php echo base_url() ?>assets/templates/images/profile_av.jpg" alt="no-omage" width="250" height="250">
                        </div>
                        <div class="col-md-8">
                            <table>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong><?php echo $user['user_email'] ?></strong></td>
                            </tr>
                            <tr>
                                <td><strong>Username</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong><?php echo $user['user_username'] ?></strong></td>
                            </tr>
                            <tr>
                                <td><strong>Level</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong><?php echo $user['user_level'] ?></strong></td>
                            </tr>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
</div>