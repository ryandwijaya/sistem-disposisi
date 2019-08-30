<div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>List Users</strong></h2>
                    </div>
                    <div class="body">
                         <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th class="text-center"><i class="material-icons">settings</i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1; 
                                foreach ($user as $key => $val): ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $val['user_nama'] ?></td>
                                        <td><?php echo $val['user_username'] ?></td>
                                        <td><?php echo $val['user_email'] ?></td>
                                        <td><?php echo $val['user_level'] ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i> Edit</button>
                                            <i class="material-icons">delete</i>
                                        </td>
                                        
                                    </tr>
                                <?php
                                $no++;
                                 endforeach ?>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>