/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  /* Set the width of the side navigation to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

//menu item onclick
// $("#mySidenav").on("click",".menu-item",()=>{
//     console.log($(this));
// });

// check user login or not 


function check(){
    $.ajax({
        type :'POST',
        url : "php/dcheckUser.php",
        success : function(response){
         if(response.trim() == "success"){
             window.location = "index.html";
         }
     }
    });
 }
 //showing student data on home page
 DisplayStudentData();
 editClick();

//click on navigation  
$("#mySidenav .menu-item").click(function(){
    let url = $(this).attr("data-name");
    if(url == "home_design"){
        directLink(url);
    }else if(url == "add_student_design"){
        directLink(url);
    }else if(url == "search_student_design"){
        directLink(url);
    }else if(url == "about_design"){
        directLink(url);
    }
});

function directLink(link){
    $.ajax({
        type : 'POST',
        url : "php/"+link+".php",
        beforeSend : function(){
            $("#app").html(` <div style="margin:16% auto;
            width: 20%;display: flex;">
               <button class="btn btn-primary mx-auto p-3">
                <span class="spinner-border "></span> 
                <br>
                Loading..
              </button>
            </div>`);
        },
        success : function(response){
            $("#app").html(response);
            if(link == "home_design"){
                DisplayStudentData();
                editClick();
            }
            if(link == "search_student_design"){
                SDisplayStudentData()
            }
            if(link == "search_student_design"){
                searchStudent();
            }
            if(link == "add_student_design"){
                addStudentForm();
            }
        }
    });
}

// onclick on add student form
function addStudentForm(){
  $("#add-student-form").submit(function(e){
      e.preventDefault();
        $.ajax({
            type : 'POST',
            url  : "php/add_student_data.php",
            data : new FormData(this),
            processData : false,
            contentType : false,
            cache : false,
            // data : {
            //     sname : btoa($("#sname").val()),
            //     sbranch : btoa($("#sbranch").val()),
            //     fdate : btoa($("#fdate").val()),
            //     tdate : btoa($("#tdate").val()),
            //     syear : btoa($("#syear").val()),
            //     smobile : btoa($("#smobile").val()),
            //     saddress : btoa($("#saddress").val())
            // },
            beforeSend : function(){
                $("#add-student-btn").html(" <span class='spinner-border spinner-border-sm'></span> Loading..");
            },
            success : function(response){
                $("#add-student-btn").html("Add");
                
                if(response.trim() == "success"){
                    $("#notice").html(` <div class="alert alert-success">
                    <i class="close" data-dismiss="alert" style="cursor: pointer;"> &times; </i>
                    <strong>Student Data Successfully Added !</strong>
                </div>`);
                $("#add-student-form").trigger("reset");
                    setTimeout(()=>{
                        $("#notice").html(" ");
                    },2000);
                }else if(response.trim() == "fail"){
                    $("#notice").html(` <div class="alert alert-warning">
                    <i class="close" data-dismiss="alert" style="cursor: pointer;"> &times; </i>
                    <strong>Failed to Add Student Data !</strong>
                </div>`);

                    setTimeout(()=>{
                        $("#notice").html(" ");
                    },2000);
                }
            }
        });
  });
}
// search student data onclick tab
function SDisplayStudentData(){
    $.ajax({
        type : 'POST',
        url : "php/displayStudentData.php",
       
        success : function(response){
          const studentTable = document.getElementById("student-data");
            if(response != "No Student Found"){
          const studentData = JSON.parse(response);
          let count = 0;
          const studentTable = document.getElementById("student-data");
          studentData.forEach((currentElement)=>{
              studentTable.innerHTML += `
              <tr>
              <td>${++count}</td>
              <td> <div style="width: 70px;height: 70px;border: 1px solid rgb(209, 185, 185);background-image: url(${currentElement.sphoto});background-position: center;background-size: cover;background-repeat: no-repeat;" class="shadow rounded"> </div> </td>
              <td>${currentElement.sname}</td>
              <td>${currentElement.sbranch}</td>
              <td>${currentElement.syear}</td>
              <td>${currentElement.bFrom}</td>
              <td>${currentElement.bTo}</td>
              <td>${currentElement.saddress}</td>
              <td>${currentElement.smobile}</td>
          </tr>
              `
               
          })
      }else{
          studentTable.innerHTML = response;
      }
        }
    })
}

// search student data on searchig on  input box
function searchStudent(){
    $("#search").on('keyup',function(){
        $.ajax({
            type : 'POST',
            url : "php/search_student_data.php",
            data : {
                query : $(this).val()
            },
            success : function(response){
              const studentTable = document.getElementById("student-data");
              studentTable.innerHTML = "";
                if(response != "No Student Found"){
              const studentData = JSON.parse(response);
              let count = 0;
              const studentTable = document.getElementById("student-data");
              studentData.forEach((currentElement)=>{
                  studentTable.innerHTML += `
                  <tr>
                  <td>${++count}</td>
                  <td> <div style="width: 70px;height: 70px;border: 1px solid rgb(209, 185, 185);background-image: url(${currentElement.sphoto});background-position: center;background-size: cover;background-repeat: no-repeat;" class="shadow rounded"> </div> </td>
                  <td>${currentElement.sname}</td>
                  <td>${currentElement.sbranch}</td>
                  <td>${currentElement.syear}</td>
                  <td>${currentElement.bFrom}</td>
                  <td>${currentElement.bTo}</td>
                  <td>${currentElement.saddress}</td>
                  <td>${currentElement.smobile}</td>
              </tr>
                  `
                   
              })
          }else{
            studentTable.innerHTML = `<tr> <td colspan="11"> <div class="w-100 text-warning"><h2 class="text-center"> ${response} </h2></div> </td> </tr>`;
          }
            }
        })
    }); 
}

//showing all students Data
  function DisplayStudentData(){
      $.ajax({
          type : 'POST',
          url : "php/displayStudentData.php",
          success : function(response){
            const studentTable = document.getElementById("student-data");
              if(response != "No Student Found"){
            const studentData = JSON.parse(response);
            let count = 0;
            const studentTable = document.getElementById("student-data");
            studentData.forEach((currentElement)=>{
                studentTable.innerHTML += `
                <tr>
                <td>${++count}</td>
                <td> <div style="width: 70px;height: 70px;border: 1px solid rgb(209, 185, 185);background-image: url(${currentElement.sphoto});background-position: center;background-size: cover;background-repeat: no-repeat;" class="shadow rounded"> </div> </td>
                <td>${currentElement.sname}</td>
                <td>${currentElement.sbranch}</td>
                <td>${currentElement.syear}</td>
                <td>${currentElement.bFrom}</td>
                <td>${currentElement.bTo}</td>
                <td>${currentElement.saddress}</td>
                <td>${currentElement.smobile}</td>
                <td> <button type="button" data-id="${currentElement.id}" class="edit-btn btn btn-info"> 
                 <i class="fa fa-edit"></i>
                </button> </td>
                <td> <button type="button" data-sphoto="${currentElement.sphoto}" class="btn btn-danger del-btn" onclick="(confirm('Are you sure you want to delete this student data ?'))?deleteStudent(${currentElement.id},true,this):''">  <i class="fa fa-trash"></i></button></td>
            </tr>
                `
                 
            })
        }else{
            studentTable.innerHTML = `<tr> <td colspan="11"> <div class="w-100 text-warning"><h2 class="text-center"> ${response} </h2></div> </td> </tr>`;
        }
          }
      })
  }

  // onclick on delete button 
  function deleteStudent(id,status,btn){
       if(status){
           $.ajax({
               type : 'POST',
               url  : "php/deleteStudent.php",
               data : {
                   id : id,
                   picPath : btn.getAttribute("data-sphoto")
               },
               success : function(response){
                   if(response.trim() == "success"){
                       window.location.reload();
                   }
               }
           })
       }
  }


  //onclick on edit button
  function editClick(){
$(document).ready(function(){
  //  DisplayStudentData();
    $("tbody").on("click",".edit-btn",()=>{
        $.ajax({
            type:'POST',
            url : "php/edit_student_design.php",
            beforeSend : function(){
                $("#app").html(` <div style="margin:16% auto;
                width: 20%;display: flex;">
                   <button class="btn btn-primary mx-auto p-3">
                    <span class="spinner-border "></span> 
                    <br>
                    Loading..
                  </button>
                </div>`);
            },
            data : {
                studentId : $(this)[0].activeElement.getAttribute('data-id')
            },
            success : function(response){
                $("#app").html(response);
                updateStudent();
                changeProfile();
            }
        });
           // console.log($(this)[0].activeElement.getAttribute('data-id'));
    })


});

  }


  // change profile on update
  function changeProfile(){
    const fileInput = document.getElementById("sphoto");
    fileInput.onchange = function(e){ 
        const file = e.target;
        let reader = new FileReader();
        reader.onload = function(){
            let filename = reader.result;
            $("#profile-cont").css("background-image",`url("${filename}")`);
        };
        reader.readAsDataURL(file.files[0]);
    }
  }

  // update student on edit btn
  function updateStudent(){
  $("#update-student-form").submit(function(e){
    e.preventDefault();
      $.ajax({
          type : 'POST',
          url  : "php/update_student_data.php",
          data : new FormData(this),
          processData : false,
          contentType : false,
          cache : false,
          // data : {
          //     sname : btoa($("#sname").val()),
          //     sbranch : btoa($("#sbranch").val()),
          //     fdate : btoa($("#fdate").val()),
          //     tdate : btoa($("#tdate").val()),
          //     syear : btoa($("#syear").val()),
          //     smobile : btoa($("#smobile").val()),
          //     saddress : btoa($("#saddress").val())
          // },
          beforeSend : function(){
              $("#update-student-btn").html(" <span class='spinner-border spinner-border-sm'></span> Loading..");
          },
          success : function(response){
              console.log(response);
              $("#update-student-btn").html(`<i class="fa fa-refresh" aria-hidden="true"></i> Update`);
              if(response.trim() == "success"){
                  $("#notice").html(` <div class="alert alert-success">
                  <i class="close" data-dismiss="alert" style="cursor: pointer;"> &times; </i>
                  <strong>Student Data Successfully Updated !</strong>
              </div>`);
                  setTimeout(()=>{
                      $("#notice").html(" ");
                  },2000);
              }else if(response.trim() == "fail"){
                  $("#notice").html(` <div class="alert alert-warning">
                  <i class="close" data-dismiss="alert" style="cursor: pointer;"> &times; </i>
                  <strong>Failed to Update Student Data !</strong>
              </div>`);

                  setTimeout(()=>{
                      $("#notice").html(" ");
                  },2000);
              }
          }
      });
});
  }