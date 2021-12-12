<?php
    echo ' <div class="container-fluid">
    <div class="container p-md-5">
        <div class="row ">
            <div class="col-md-12 shadow p-4 pt-3 rounded mx-auto">
             <div id="notice">
                
             </div>
                <h3 class="text-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Student</h3>
                <hr>
                <form id="add-student-form">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="sname">Student Name</label>
                                 <input type="text" name="sname" id="sname" class="form-control" placeholder="Student Name">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="sbranch">Student Branch</label>
                                 <select name="sbranch" id="sbranch" class="form-control">
                                    <option value="">Select your branch</option>
                                     <option value="Computer Science And Engineering">Computer Science And Engineering</option>
                                     <option value="Information And Technology">Information Technology</option>
                                     <option value="Civil Engineering">Civil Engineering</option>
                                     <option value="Mechnical Engineering">Mechnical Engineering</option>
                                     <option value="Electrical Engineering">Electrical Engineering</option>
                                     <option value="Electronics And Telecommunication">Electronics And Telecommunication</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                             <label for="batchFrom">Batch From : </label>
                             <input type="date" name="fdate" id="fdate" class="form-control">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                             <label for="batchTo">Batch To :</label>
                             <input type="date" name="tdate" id="tdate" class="form-control">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="syear">Student Year</label>
                                 <select name="syear" id="syear" class="form-control">
                                      <option value="">Select your year</option>
                                     <option value="First">First</option>
                                     <option value="Second">Second</option>
                                     <option value="Third">Third</option>
                                     <option value="Final">Final</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="smobile">Student Mobile</label>
                                 <input type="number" name="smobile" id="smobile" placeholder="Mobile Number" maxlength="10" class="form-control">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="saddress">Student Address</label>
                               <textarea name="saddress" id="saddress" cols="30" rows="5" class="form-control" placeholder="Enter Student address here..."></textarea >
                             </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="sphoto">Student Photo </label>
                                <input type="file" name="sphoto" id="sphoto" class="form-control">
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                             <center>
                                 <button type="submit" class="btn btn-success" id="add-student-btn"> Add </button>
                             </center>
                            </div>
                            
                        </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>';

?>