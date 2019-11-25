// read all users : method GET
function Read(){
var container  = document.getElementById("ajax-content");                                    // container for ajax response
const strtHead = ["ID USER","NAME","LOGIN","PASSWORD","ID COMAPANY","COMPANY NAME","CREATED"];         // const for table head
var url  = "http://localhost/api/user/read.php";
container.innerHTML = new String("");
var xhr  = new XMLHttpRequest();
xhr.open('GET', url, true)
xhr.onload = function () {
   var user = JSON.parse(xhr.responseText);
   if (xhr.readyState == 4 && xhr.status == "200") {
   
   document.getElementById("id-modal").style.display = "block";
        
   var tbl = document.createElement("TABLE");                        // create table       
   var thead  = document.createElement("THEAD");                     // create head table
   var trh = document.createElement("TR");
   for( k = 0; k < 7; k++ ) {
      var th = document.createElement("TH");
      var textHead = document.createTextNode(strtHead[k]);
      th.appendChild(textHead);  
      trh.appendChild(th);
   }  
   thead.appendChild(trh);
   var tblBody = document.createElement("tbody");                    // create body table
   for (var i= 0; i < user.users.length; i++) {         
      var rowBody = document.createElement("TR");
      for (var j = 0; j<7; j++) {               
        var cellBody = document.createElement("TD");                
        var cellText = document.createTextNode(Object.values(user.users[i])[j]);
        cellBody.appendChild(cellText);                
        rowBody.appendChild(cellBody);
      }   
      tblBody.appendChild(rowBody);          
   }           
   tbl.appendChild(tblBody);
   tbl.appendChild(thead); 
   container.appendChild(tbl);
   // log
   console.log(user);
   console.table(user);         
   } 
   else {
   	  document.getElementById("id-modal").style.display = "block";
	    container.innerHTML = "<h4 style='color:red;'>"+users.message+"</h4>";
	    console.error(user);
   }
}
xhr.send(null);
}

// read a user : method GET
function Read_One(){
var container  = document.getElementById("ajax-content");                                   // container for ajax response
const strtHead = ["ID USER","NAME","LOGIN","PASSWORD","ID COMAPANY","COMPANY NAME","CREATED"];        // const for table head
var url  = "http://localhost/api/user/read_one.php?id=";
container.innerHTML = new String("");

var xhr  = new XMLHttpRequest();
xhr.open('GET', url+filterURL('id'), true);
xhr.onload = function () {
	var user = JSON.parse(xhr.responseText);
  console.log(user.created);
	if (xhr.readyState == 4 && xhr.status == "200") {
		
       document.getElementById("id-modal").style.display = "block";
     
       var tbl = document.createElement("TABLE");
       var thead  = document.createElement("THEAD");
       var trh = document.createElement("TR");
       for( k = 0; k < 7; k++ ) {
         var th = document.createElement("TH");         
         var textHead = document.createTextNode(strtHead[k]);
         th.appendChild(textHead);  
         trh.appendChild(th);
       }  
       thead.appendChild(trh);
       var tblBody = document.createElement("tbody");
       var rowBody = document.createElement("TR");
       for (var j = 0; j<7; j++) {               
          var cellBody = document.createElement("TD"); 
          var cellText = document.createTextNode(Object.values(user)[j]);
          cellBody.appendChild(cellText);                
          rowBody.appendChild(cellBody);
       }  
       tblBody.appendChild(rowBody);
       tbl.appendChild(tblBody);
       tbl.appendChild(thead);  
       container.appendChild(tbl);
       // log		
       console.log(user);
       console.table(user);
	
	} else {
		document.getElementById("id-modal").style.display = "block";
		container.innerHTML = "<h3 style='color:red;'>"+user.message+"</h3>";
		console.error(user);
  }
}
xhr.send(null);
}

// create a user : method POST
function Create() {
var container  = document.getElementById("ajax-content");                 // container for ajax response
var url = "http://localhost/api/user/create.php";
container.innerHTML = new String("");

var data = {};   // data to post
data.name        = filterURL('name');                    // user name
data.login       = filterURL('login');                   // user login
data.password    = filterURL('password');                // user password
data.company_id  = filterURL('company_id');              // company id
data.created     = "2015-02-16 11:10:20";                // creation date
var json = JSON.stringify(data);                         // convert object to JSON

var xhr = new XMLHttpRequest();
xhr.open("POST", url, true);
xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
xhr.onload = function () {
	var user = JSON.parse(xhr.responseText);
	if (xhr.readyState == 4 && xhr.status == "201") {
	   document.getElementById("id-modal").style.display = "block";
	   container.innerHTML = "<h3 style='color:green;'>User was created.</h3>";
	   console.table(user);
	} else {
	   document.getElementById("id-modal").style.display = "block";
	   container.innerHTML = "<h3 style='color:red;'>"+user.message+"</h3>";
	   console.error(user);
	}
}
xhr.send(json);
}

// update a user : method PUT
function Update(){
var container  = document.getElementById("ajax-content");             // container for ajax response
var url = "http://localhost/api/user/update.php";
container.innerHTML = new String("");

var data = {};
data.id    = filterURL('id');
data.name  = filterURL('name');                                       // update user name
data.login = filterURL('login');                                      // update user login
data.password    = filterURL('password');                             // user password
data.company_id  = filterURL('company_id');                           // company id
//data.created     = "2014-04-12 11:10:20";                             // creation date
var json = JSON.stringify(data);

var xhr = new XMLHttpRequest();
xhr.open("PUT", url, true);
xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
xhr.onload = function () {
	var user = JSON.parse(xhr.responseText);
	if (xhr.readyState == 4 && xhr.status == "200") {
		document.getElementById("id-modal").style.display = "block";
		container.innerHTML = "<h3 style='color:green;'>200 User was updated.</h3>";
		console.table(user);
	} else {
		document.getElementById("id-modal").style.display = "block";
		container.innerHTML = "<h3 style='color:red;'>"+user.message+"</h3>";
		console.error(user);
	}
}
xhr.send(json);
}

// delete a user : method DELETE
function Delete(){
var container  = document.getElementById("ajax-content");                // container for ajax response
var url = "http://localhost/api/user/delete.php";
container.innerHTML = new String("");

var data = {};
data.id  = filterURL('id');
var json = JSON.stringify(data);                                         // convert object to JSON

var xhr = new XMLHttpRequest();
xhr.open("POST", url, true);
xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
xhr.onload = function () {
	var user = JSON.parse(xhr.responseText);
	if (xhr.readyState == 4 && xhr.status == "200") {
	   document.getElementById("id-modal").style.display = "block";
	   container.innerHTML = "<h3 style='color:green;'>200 User was deleted.</h3>";
	   console.table(user);
	} else {
	   document.getElementById("id-modal").style.display = "block";
	   container.innerHTML = "<h4 style='color:red;'>"+message.user+"</h4>";
	   console.error(user);
	}
}
xhr.send(json);
}

// filter paramaters
function filterURL(sVar) {  
  return unescape(
    window.location.search.replace(
      new RegExp("^(?:.*[&\\?]" +
      escape(sVar).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
}

function closeModal(){
  document.getElementById("id-modal").style.display = "none";
}