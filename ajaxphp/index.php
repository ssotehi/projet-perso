<!DOCTYPE html>
<html lang="fr">
<head>
<title>Registration and Login with PHP / Ajax</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<style>
  
* {
  margin: 0px 0px 0px 0px;
  padding: 0px 0px 0px 0px;
}

body, html {
  padding: 0;
  background-color: #FFFFFF;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14pt;
  color: #000000;
}

table {
  text-align: left;
  color: black;
  font-size:18px; 
}

table th {
  border: 1px solid green;
  background: #357354;
  padding: 5px;
  width: 100%;
  color: white;
}

table td {
  border: 1px solid green;
  background: #7f5176;
  padding: 5px;
  width: 100%;
  color: #D3D3D3;
}

input[type=text], 
input[type=password], 
input[type=email] 
{
  padding: 12px;
  background: #aea46a;
  margin-bottom: 15px;
  border: none;
  font-size: 18px;
}

input[type=button],
input[type=submit] 
{ 
  cursor: pointer;
  padding: 12px;
  background: #004ca0;
  border: none;
  color: white;
}


input[type=checkbox] 
{ 
   background: green;
}

.title {
  background: grey;
  height: 40px;
  padding: 16px;
  text-align: center;
}

.title span {
  padding: 5px;
  color: #D3D3D3;
  display: inline-block;
}

.btn-user {
  position: absolute;
  top: 0px;
  right: 0px;
  background: grey;
}

.user-login {
  float: left;
  display: inline-block;
  background: #D3D3D3;
  width: 25%;
  height: 20%;
  padding: 10px;
}

.tab {
  text-align: center;
  font-size: 16px;
  margin-top: 8px;
}

.tab a {
  padding: 10px;
  text-decoration: none;
  color: green;
}

.items {

  padding: 15px;
}

.items div:not(:target) {
  display: none;
}

.items div:target {
  display: block;
}

.content {
  display: none;
  position: fixed;
  width: 68%;
  height: 306px;
  padding: 20px;
  margin-right: 30px;
  margin-left: 370px;
  overflow-y: auto;
}

.content h1 { 
  color: #653172;
}

.register {
   width: 20%;
   background: black;
}

.login {
   width: 20%;
   background: black;
 }
 
 .success {
    color: green;
 }

.error {
  color: red;
}

.footer {
  position: fixed;
  bottom: 0px;
  height: 28%;
  width: 100%;
  background: #000000;
}

.planet {
  display: none;
  float: left;
  width: 150px;
  height: 150px;
  padding: 0;
  margin-left: 12px;
}

.validator {

}
</style>
<script>

// POST request, submit form
function AJAXSubmit(ofElement) {

  if (!ofElement.action) { return; }
  
  var xhr = new XMLHttpRequest();
  xhr.onload = function(){

  console.log(this.responseText);
  
  if (xhr.readyState == 4 && xhr.status == "200") {
   
      var container = document.getElementById('container');
      container.style.display = "block";
      container.innerHTML = this.responseText
   } 
   // TODO: other http code
  }

  var sData = new FormData(ofElement);
  if (ofElement.method.toLowerCase() === "post") {
    xhr.open("post", ofElement.action);
    xhr.send(sData);
  } 

}

// GET request
function getRequest(url, oElement){
  
  var xhr = new XMLHttpRequest();

  xhr.onload = function(){

   if (xhr.readyState == 4 && xhr.status == "200") {
   
      var container = document.getElementById(oElement);
      container.style.display = "block";
      container.innerHTML = this.responseText
   } 
   // TODO: http code
  }

    xhr.open("GET", url, true);
    xhr.send(null); 
}

</script>
</head>
<body>
<div class="title">
  <h1><span>XMLHttpRequest / PHP Example</span></h1>
  <div class="btn-user">
    <span><input type="button" value="Get All" onclick="getRequest('user.php', 'container')"/></span>
  </div>
</div>
<div class="user-login">
  <div class="tab">
    <a href="#registration"><span>Registration</span></a>
    <a href="#connection"><span>Connection</span></a>
  </div>
  <div class="items">
    <div id="registration">
      <form action="register.php" method="post" onsubmit="AJAXSubmit(this);return false;"> 
        <input type="text" name="pseudo" placeholder="Pseudo" required /><br>
        <input type="email" name="email" placeholder="Email"  required /><br>
        <input type="password" name="password" placeholder="Password" required /><br>
        <input type="submit" value="Register"/>
      </form>
    </div>
    <div id="connection">
      <form action="login.php" method="post" onsubmit="AJAXSubmit(this);return false;">
        <input type="email" name="email" placeholder="Email"  required /><br>
        <input type="password" name="password" placeholder="Password" required /><br>
        <input type="submit" value="Login" />
      </form>
    </div>
  </div>
</div>
<div id="container" class="content"></div>
<div class="footer">
  <div id="footer-id">
    <script>getRequest('footer.php','footer-id');</script>
  </div>
</div>
<div class="validator"></div>

<script>
function lovePlanet(sPlanet, sCheck){
  
  var btnCheckAll  = document.getElementById('check-all');
  var planet = document.getElementById(sPlanet);
  var btnCheck  = document.getElementById(sCheck);
  /*
  console.log("sPlanet: "+planet);  
  console.log("sCheck: "+btnCheck);
  console.log("All: "+btnCheckAll); 
  */

  if(btnCheck.checked == false && btnCheckAll.checked) {
     btnCheckAll.checked = false;
     console.log("All: "+btnCheckAll);
  }

  if(btnCheck.checked) {
      planet.style.display = 'block';
  } else {
      planet.style.display = 'none'; 
  }
}

 function loveAllPlanets(sCheck) {
    var btnCheck  = document.getElementById(sCheck);
    var planets   = document.querySelectorAll('div[class="planet"]');
    var checkAll  = document.querySelectorAll('input[name="favorite"]');
    
    console.log("btnCheck: "+btnCheck);
    console.log("planets length: "+planets.length);

    if(btnCheck.checked) {
      for(var idx=0; idx < checkAll.length; idx++){
         checkAll[idx].checked = true;
      }
      for(var s= 0; s < planets.length; s++ ){
        planets[s].style.display = 'block';
      }
    } 
    else {
      for(var idx=0; idx < checkAll.length; idx++){
         checkAll[idx].checked = false;
      }
      for(var s= 0; s < planets.length; s++ ){
        planets[s].style.display = 'none';
      }
    }
 }
</script>
</body>
</html>