

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
<script src="index.js"> </script>
   <style>
   body{
   margin:0%;
  
   }
   .center{
       margin: auto;
  width: 60%;
   }
   a:hover{
   text-decoration:underline;
   }
   input:focus, textarea:focus, select:focus{
        outline: none;
    }
   </style> 
  
<title>Test Telephone Directory</title>
</head>
<body >
    
   
       <!-- NavBar -->
       <nav class="navbar navbar-expand-lg fixed-top mb-5  bg-dark text-dark w-100">
          <div class="container-fluid">
          <a class="navbar-brand" href="#"><h3 class="text-white ml-2"><i class=" mr-2 bi bi-telephone"></i>Telephone Directory</h3></a>
           <button class="navbar-toggler mb-2" data-toggle="collapse" data-target="#navbarid">
             <i class="fa fa-bars sales-header"></i>
        </button>
          
          <div class="collapse navbar-collapse " id="navbarid">
            
            <ul class="nav ml-auto nav-pills">
                <li class="nav-item mr-3">
                  <a class="nav-link text-white bg-dark" data-toggle="tab" href="#home" >CreateUser</a>
                </li>
                <li class="nav-item mr-3">
                   <a class="nav-link text-white bg-dark" data-toggle="tab" href="#menu1" id="read" >ReadUsers</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-white bg-dark " data-toggle="tab" href="#menu2" id="updation_tab">UpdateUser</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link text-white bg-dark" data-toggle="tab" href="#menu3" id="delete_tab">DeleteUser</a>
                </li>
            </ul>
          
          </div>
          </div>
          
       </nav>
       
       <!-- MainBody -->
       <div class="tab-content mt-5 pt-3">
    <div id="home" class="tab-pane  in active mt-5 mb-5">
         
        <div class="jumbotron mt-5 d-flex flex-column  center"  id="creation-tab">
            <h1 class="text-center">User Creation</h1>
            <form id="createUser" method="POST">
              <div class="form-group">
                 <label for="name">Enter Name</label>
                 <input type="text" required name="user_name" id="name_user"class="form-control"/>
              </div>
              <div class="form-group">
                 <label for="age">Enter PhoneNumber</label>
                 <input type="text" required name="phone_number" id="phone_user"class="form-control"/>
              </div>
              <div class="form-group">
                 <label for="age">Enter Address</label>
                 <input type="text" required name="address" id="address_user"class="form-control"/>
              </div>
              <input  id="submit" class="btn btn-submit btn-success" value="Submit">
            </form>
        </div>
       
      
    </div>
    <div id="menu1" class="tab-pane fade center mb-5 mt-5" >
       <!-- -read users -->
       
      <!-- -Dynamic Table -->
    </div>
    <div id="menu2" class="tab-pane fade center mb-5 mt-2" >
      <!-- -Updation Menu -->
      <div class="jumbotron d-flex flex-column mt-5 mr-5 ml-5" id="updation-tab">
         <h2>Updation Panel</h2><br>
        <form id="updationForm">
          <div class="row border " >
        
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="exampleFormControlSelect1">Pick UserName</label>
                             <select class="form-control" name="user_name" id="uname_col">
                              
                              </select>
                  </div>
                  <div class="form-group">
                     <label for="exampleFormControlSelect1"> PhoneNumber</label>
                             <input class="form-control" name="phone_number" id="pno_col" />
                              
                  </div>
                  <div class="form-group">
                     <label for="exampleFormControlSelect1"> Address</label>
                             <input class="form-control" name="address" id="a_col" />
                              
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="uname">Enter Updated UserName</label>
                     <input type="text" id="u_user_name" class="form-control"name="u_user_name">
                  </div>
                  <div class="form-group">
                     <label for="uphone">Enter Updated PhoneNumber</label>
                     <input type="text" id="u_phone_number" class="form-control" name="u_phone_number">
                  </div>
                  <div class="form-group">
                     <label for="uaddress">Enter Updated Address</label>
                     <input type="text" id="u_address" class="form-control" name="u_address">
                  </div>
               </div>
               <input type="button" id="update" value="Update" class="mr-3  w-25 ml-auto btn btn-warning">
          </div>
         </form>
      </div>
  
    </div>
    <div id="menu3" class="tab-pane fade center mb-5 mt-2" >
      <!-- -Deletion Menu -->
       <div class="jumbotron mt-5 d-flex flex-column center mb-5 " id="deletion-tab">
            <h2>Enter the User details.... </h2><br>
            <form  method="POST" id="delete_user">
               
               <div class="form-group">
                     <label for="UserID">Enter the UserName</label>
                          <select class="form-control" name="user_name" id="duname_col">
                              
                          </select>
               </div>
               <div class="form-group">
                  <label for="phoneNumber">Enter the PhoneNumber</label>
                      <input  class="form-control" name="phone_number" id="dp_col" />
                        
                  
           
               </div>
               <input id="delete" class="btn btn-danger" value="Submit">
              
            </form>
        </div> 
     
    </div>
  </div>
       
       
       <!--  -->
         
         
         
         
         
         
         
         
       
       <!-- Footer -->
        <div class="container-fluid pt-5 pb-5 " style="background-color:#f7f7f7;">
        <div class="row mt-5 pl-5 pr-5 pb-5" >
            <div class="col-md-2 pl-4" >
                <div class="row">
                    <div class="col-md-12">
                     <a href="https://enparadigm.com/"><img style="width: 100%;"  src="https://enpwebsite.s3.amazonaws.com/verjun19/Enparadigm-LOGO.png" alt="enParadigm">
                     </a>
                   </div>
                   <div class="row mt-4 d-inline-flex justify-content-between w-100" >
                       <div class="" >
                         <a href="#" > <div class="social-network-icon facebook-icon"></div> </a>
                       </div>
                       <div class="" >
                         <a href="#" > <div class="social-network-icon linkedin-icon"></div> </a>
                       </div>
                       <div class="" >
                         <a href="#" > <div class="social-network-icon twitter-icon"></div> </a>
                       </div>
                   </div>
                </div>
            </div>
            <div class="col-md-2"></div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="font-weight-bold">Digital Simulations</span>
                         <ul class="list-group">
                             <li class="pt-3">
                                 Business<br/>
                                 Simulation Site
                             </li>
                             <li class="pt-3" >
                                 Behavioural<br/>
                                 Simulation Site
                             </li>
                            
                         </ul>
                    </div>
                </div>
            <div class="col-md-2">
             <div class="row">
                 <div class="col-md-12">
                     <span class="font-weight-bold">Mobile Products</span>
                      <ul class="list-group">
                          <li class="pt-3" >
                              Smart Skill
                          </li>
                          <li class="pt-3" >
                              Smart Sustain
                          </li>
                           <li class="pt-3">
                               SmartLaunch
                           </li>
                      </ul>
                 </div>
             </div>
            </div>
            <div class="col-md-2">
             <div class="row">
                 <div class="col-md-12">
                     <span class="font-weight-bold">Insights</span>
                      <ul class="list-group">
                          <li class="pt-3" >
                              Blog
                          </li>
                          <li class="pt-3" >
                              Our Approach
                          </li>
                           <li class="pt-3" >
                               Simulation
                           </li>
                      </ul>
                 </div>
             </div>
            </div>
            <div class="col-md-2">
             <div class="row">
                 <div class="col-md-12">
                     <span class="font-weight-bold">Company</span>
                      <ul class="list-group">
                          <li class="pt-3">
                              Management Team
                          </li>
                          <li class="pt-3">
                              Careers
                          </li>
                           <li class="pt-3">
                               Contact Us
                           </li>
                           <li class="pt-3">
                               Privacy Policy
                             </li>
                      </ul>
                 </div>
             </div>
            </div>
        </div>
        
           <div class="row">
               <div class="pl-5 col-md-12 d-flex jusitfy-content-start">
                 <p class="copyright">© 2020 all rights reserved</p>
               </div>
           </div>
     </div>
       
              
    
    <script>
    
    </script>
</body>
</html>


