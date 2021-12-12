<?php

    echo '
    <div class="container-fluid p-5">
            <div class="row" >
                <div class="input-group">   
                    <input type="search" name="search" id="search" placeholder="Search Student ..." class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-search"> </i>
                        </span>
                </div>
            </div>
            </div>
             <div class="row">
                 <div class="col-12">
                     <table class="table table-border">
                        <thead>
                             <tr>
                                 <th>Sr. No</th>
                                 <th>Photo </p>
                                 <th>Name</th>
                                 <th>Branch</th>
                                 <th>Year</th>
                                 <th>Batch From</th>
                                 <th>Batch To</th>
                                 <th>Address</th>
                                 <th>Mobile</th>
                             </tr>
                        </thead>
                        <tbody id="student-data">
                          
                        </tbody>
                     </table>
                 </div>
             </div>
         
    </div>
   ';

?>