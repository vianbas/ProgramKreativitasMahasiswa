<?php
?>
   
     

<div class="box no-border">
                <div class="box-body no-padding no-border">
                  <table class="table table-striped">
                    <tr>
                      <th>Group Name</th>
                      <td><?= $model->group_name ?></td>                      
                    </tr>
                    <tr>                      
                      <th>Group Description</th>
                      <td><?= $model->Description ?> </td>
                    </tr>
                    <tr>                      
                      <th>Year</th>
                      <td><?= $model->year ?> </td>
                    </tr>
                    <tr>                      
                      <th>Supervisior</th>
                      <td><?= $modelSupervisior->idSupervisior->nama ?></td>
                    </tr>
                    <tr>                      
                      <th>Leader</th>
                      <td><?= $modelLeader->idStudents->nama ?></td>
                    </tr>
                    <tr>                      
                      <th>Members</th>
                      <td> <?= $this->render('members.php',['modelStudents'=>$modelStudents]) ?> </td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
</div><!-- /.box -->


