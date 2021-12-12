<?php
    session_start();
    require("database.php");
    $id = $_POST['studentId'];
    $sql = "SELECT * FROM students WHERE id='$id'";
    $response = $db->query($sql);
    $data = $response->fetch_assoc();
    $_SESSION['old_url'] = $data['sphoto'];
    echo '
    <div class="container-fluid">
     <div class="container p-md-5">
         <div class="row ">
             <div class="col-md-12 shadow p-4 pt-3 rounded mx-auto">
              <div id="notice">
                 
              </div>
                 <h3 class="text-center"> <i class="fa fa-edit" aria-hidden="true"></i> &nbsp; Edit Student Data</h3>
                 <hr>
                 <form id="update-student-form">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="sname">Student Name</label>
                                  <input type="text" name="sname" id="sname" class="form-control" value="'.$data['sname'].'" placeholder="Student Name">
                              </div>
                          </div>
                          <div class="col-md-6">
                          <label for="sbranch">Student Branch</label>
                                  <select name="sbranch" id="sbranch" class="form-control">
                          '?>
                          <option <?php echo ($data['sbranch'] == '')?"selected":"" ?>   value="">Select your branch</option> 

                         <option <?php echo ($data['sbranch'] == 'Computer Science And Engineering')?"selected":"" ?>   value="Computer Science And Engineering">Computer Science And Engineering</option>
                         
                         <option <?php echo ($data['sbranch'] == 'Information And Technology')?
                         "selected":"" ?>   value="Information And Technology">Information And Technology</option>

                          <option <?php echo ($data['sbranch'] == 'Civil Engineering')?"selected":"" ?>   value="Civil Engineering">Civil Engineering</option>

                          <option <?php echo ($data['sbranch'] == 'Mechnical Engineering')?"selected":"" ?>   value="Mechnical Engineering">Mechnical Engineering</option>

                          <option <?php echo ($data['sbranch'] == 'Electrical Engineering')?"selected":"" ?>   value="Electrical Engineering">Electrical Engineering</option>

                          <option <?php echo ($data['sbranch'] == 'Electronics And Telecommunication')?"selected":"" ?>   value="Electronics And Telecommunication">Electronics And Telecommunication</option>
                     <?php  echo '
                            </select>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                              <label for="batchFrom">Batch From : </label>
                              <input type="date" name="fdate" id="fdate" class="form-control" value="'.$data['bFrom'].'">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                              <label for="batchTo">Batch To :</label>
                              <input type="date" name="tdate" id="tdate" class="form-control" value="'.$data['bTo'].'">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="syear">Student Year</label>
                                <select name="syear" id="syear" class="form-control">
                                '?>
                                     <option <?php echo ($data['syear'] == '')?"selected":"" ?>   value="">Select your year</option> 

                                    <option <?php echo ($data['syear'] == 'First')?"selected":"" ?>   value="First">First</option>
                                    
                                    <option <?php echo ($data['syear'] == 'Second')?
                                    "selected":"" ?>   value="Second">Second</option>

                                     <option <?php echo ($data['syear'] == 'Third')?"selected":"" ?>   value="Third">Third</option>

                                     <option <?php echo ($data['syear'] == 'Final')?"selected":"" ?>   value="Final">Final</option>
                                <?php  echo '    
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="smobile">Student Mobile</label>
                                  <input type="number" name="smobile" id="smobile" placeholder="Mobile Number" maxlength="10" class="form-control" value="'.$data['smobile'].'">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="saddress">Student Address</label>
                                <textarea name="saddress" id="saddress" cols="30" rows="5" class="form-control" placeholder="Enter Student address here...">'.$data['saddress'].'
                                </textarea >
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="sphoto">Student Photo </label>
                        <abbr title="Click on photo to update the profile">
                        <div style="width: 150px;height: 150px;border: 1px solid rgb(209, 185, 185);background-image: url('.$data['sphoto'].');background-position: center;background-size: cover;background-repeat: no-repeat;" class="shadow rounded" id="profile-cont">
                            <input type="file" name="sphoto" id="sphoto" accept="image/*" style="display: block;width: 100%;height: 100%;opacity: 0;" class="form-control">
                         </div>
                         </abbr>
                             </div>
                      </div>
                      <div class="row">
                         <div class="col-md-12">
                         <input type="hidden" name="studentId" id="studentId" value="'.$id.'"
                             <div class="form-group">
                              <center>
                                  <button type="submit" class="btn btn-success" id="update-student-btn"><i class="fa fa-refresh" aria-hidden="true"></i> Update  </button>
                              </center>
                             </div>
                             
                         </div>
                      </div>
                 </form>
             </div>
         </div>
     </div>
 </div>';

 $db->close();
?>