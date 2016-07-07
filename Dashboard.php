<?php
session_start();
$response=file_get_contents('http://127.0.0.1:8000/accounts/create');
$token=json_decode($response,true);
$tokenVal=$token['csrf'];
//echo $tokenVal;
$_SESSION['csrf']=$tokenVal;
?>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/1.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/1.css">
  <link rel="stylesheet" type="text/css" href="css/form.css">
</head>

<body>
<header class='header'>
  <div class='profile'>
    <div class='profile__avatar i-block pull-left'>
      <span class='profile__monogram i-block'></span>
    </div>
    <div class='profile__name i-block pull-left'></div>
    <ul class='menu'>
      <li class='menu__item'>Home</li>
      <li class='menu__item'>Profile</li>
      <li class='menu__item'>Settings</li>
      <li class='menu__item'>Log out</li>
    </ul>
  </div>
</header>

  <div class="area">

  <div class="container">
  <h1>Progress Bar Navigation</h1>
<div class="progress_bar">
      <hr class="all_steps">
      <hr class="current_steps">
      <div class="step current" id="step1" data-step="1">
          Step 1
      </div>
      <div class="step" id="step2" data-step="2">
          Step 2
      </div>
      <div class="step" id="step3" data-step="3">
          Step 3
      </div>
      <div class="step" id="step4" data-step="4">
          Step 4
      </div>
      <div class="step" id="step5" data-step="5">
          Step 5
      </div>
  </div>

<div id="blocks">
  <div class="block" id="block1" style="left: 0%;">
    <div class="wrap">
<div class="form">
  <h2>Basic Info</h2>
  <form role="form">

  <div class="row">

  <div class="col-sm-6" style="padding:30px 20px;">
  <table style="width:100%;">
  <tr><td><label>Name :</label></td><td><input type="text" class="form-control1 textfield" id="name" placeholder="Name"></td></tr>
  <tr><td><label>Email Id :</label></td><td><input type="email" class="form-control1 textfield" id="email" placeholder="Email Id"></td></tr>
  <tr><td><label>Phone No. :</label></td><td><input type="number" class="form-control1 textfield" id="phone" placeholder="Phone No."></td></tr>

  <tr><td><label>Date of Birth :</label></td><td><input type="date" class="form-control1 textfield" id="dob" placeholder="Date of Birth"></td></tr>
   <input type="hidden" class="form-control1 textfield" name="csrfmiddlewaretoken" id="csrfToken" value="<?php echo $_SESSION['csrf'];?>"><br>
    
   </table>
  </div>
  
  <div class="col-sm-6">

  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <div class="file-upload">
      <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

      <div class="image-upload-wrap">
        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
        <div class="drag-text">
          <h3><span class="glyphicon glyphicon-plus"></span></h3>
        </div>
      </div>
      <div class="file-upload-content">
        <img class="file-upload-image" src="#" alt="your image"/>
        <div class="image-title-wrap">
          <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
        </div>
      </div>
    </div>
    <a onclick="step_process(1, 2)" class="form-control btn btn-default" id="basicInfo">Next</a>
    <script>

        $('#basicInfo').on("click",function(e) {
        var name=document.getElementById("name").value;
        //var emailID=document.getElementById("email").value;
        var email=document.getElementById("email").value;
        var phone=document.getElementById("phone").value;
        var dob=document.getElementById("dob").value;
        //var csrf=document.getElementById("csrfToken").value;
        var csrf=sessionStorage.getItem('csrf');
        var user=sessionStorage.getItem('username');
        //var profilePic=document.getElementById("pp").value;
//console.log(userID+" "+csrf);
//alert("CSRF: "+csrf);
var dataInp={user: user, name: name, email: email, phone: phone, dob: dob, profilePic: "", csrfmiddlewaretoken: csrf};
//console.log(dataInp);
        e.preventDefault();
        $.post(
                     "http://127.0.0.1:8000/create/",
                     dataInp,
                     function(responseData,status){
            console.log(responseData);
            //console.log(responseData.)
      //if(responseData.)
             step_process(1,2);
            }
    );





});

</script>

  </div>   
  </div>
    
  <div>
    
    <!--<button type="submit" class="form-control btn btn-danger"><a href="signup.html">New User</a></button>-->
  </div>  
  </form>
</div>
      <br />
    </div>
  </div>
  <div class="block" id="block2">
    <div class="wrap">
      <div class="container">

        <script type="text/javascript" src="js/1.js"></script>
       

          <div class="row clearfix">
                <div class="col-lg-12 column">
                  <table class="table" id="annotations">
                    <thead>
                      <tr>
                        <th class="text-center col-lg-2">
                          Year
                        </th>
                        <th class="text-center col-lg-4">
                          Degree
                        </th>
                        <th class="text-center col-lg-4">
                          Institution
                        </th>
                        <th class="text-center col-lg-2">
                          Aggregate
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id='annotations_template' title='annotation'>
                       
                         <th class="text-center col-lg-2">
                         <input type="text" class="fomr-control1 textfield">
                        </th>
                        <th class="text-center col-lg-4">
                         <input type="text" class="fomr-control1 textfield">
                        </th>
                        <th class="text-center col-lg-4">
                         <input type="text" class="fomr-control1 textfield">
                        </th>
                        <th class="text-center col-lg-2">
                         <input type="text" class="fomr-control1 textfield">
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <a class="glyphicon glyphicon-plus-sign" style="font-size:24px; color:#607D8B" id="addEducation"></a>
              </div>
              <script>
              $("#addEducation").click(function(){


                  $("#annotations > tbody").append("<tr><td>row content</td></tr>");

             
                   });

              </script>



     </div>
    </div>
  </div>
  <div class="block" id="block3">
    <div class="wrap">
      <h2>Block 3</h2>
      <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <br />
      <a onclick="step_process(3, 2, 'desc')" class="butt">Prev</a><a onclick="step_process(3, 4)" class="butt">Next</a>
    </div>
  </div>
  <div class="block" id="block4">
    <div class="wrap">
      <h2>Block 4</h2>
      <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <br />
      <a onclick="step_process(4, 5)" class="butt">Next</a>
    </div>
  </div>
  <div class="block" id="block5">
    <div class="wrap">
      <h2>Block 5</h2>
      <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <br />
      Use the progress bar at the top as a navigation back.
    </div>
  </div>
</div>
<br class="clear" />
</div>

  </div>
  <nav class="main-menu">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            UI Components
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Forms
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Pages
                        </span>
                    </a>

                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Graphs and Statistics
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-font fa-2x"></i>
                        <span class="nav-text">
                            Typography and Icons
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Tables
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="#" id="logout">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>

        <script>

        $('#logout').on("click",function(e) {
        var csrf=sessionStorage.getItem('csrf');
        console.log(csrf);
        var dataInp={csrfmiddlewaretoken: csrf};
//console.log(dataInp);
        e.preventDefault();
        $.post(
                     "http://127.0.0.1:8000/accounts/logout",
                     dataInp,
                     function(responseData,status){
            console.log("Logged Out");
            //console.log(responseData.);
      //if(responseData.)
            }
    );
});
var name = sessionStorage.getItem('username');
var getMonogram = function getMonogram(name) {
    var words = name.toUpperCase().split(' ');
    var result = '';
    words.forEach(function (value) {
        result += value[0];
    });
    return result;
};
var monogram = getMonogram(name);
$('.profile__monogram').text(monogram);
$('.profile__name').text(name);

</script>

</body>
</html>