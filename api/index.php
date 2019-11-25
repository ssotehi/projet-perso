<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Sample REST API with PHP et Ajax</title>
  <link rel="stylesheet" href="./resource/style.css" type="text/css" media="screen"/>
  <script type="text/JavaScript" src="./resource/ajaxcrud.js"></script>
</head>
<body >
<div class="menu">
  <input type="checkbox" id="toggle" />
  <label id="show-menu" for="toggle">
    <div class="btn">
      <span class="material-icons md-36 toggleBtn menuBtn">MENU</span>
      <span class="material-icons md-36 toggleBtn closeBtn">REST</span>
    </div>
    <!-- CRUD -->
    <div class="btn" onclick="Create()">Create</div>     
    <div class="btn" onclick="Read()">Read</div>         
    <div class="btn" onclick="Update()">Update</div>     
    <div class="btn" onclick="Delete()">Delete</div>     
    <div class="btn" onclick="Read_One()">ONE</div>      
 
    <div class="btn" onclick="Update()">PUT</div>        
    <div class="btn" onclick="Delete()">POST</div>       
    <div class="btn" onclick="Read_One()">GET</div>      
  </label>
</div>
<div id="id-modal" class="modal">                        
  <div class="modal-content">
    <div class="modal-header">
      <span class="close" onclick="closeModal()">&times;</span>     
      <h4 style='margin-top: 8px'>AJAX RESPONSE</h4>
    </div>
    <div class="modal-body">
      <div id="ajax-content"></div>                        
    </div>
    <div class="modal-footer"></div>
  </div>
</div>
<div class="http-verb" onclick="httpVerb()"></div>
<div class="arch-api" onclick="apiArch()"></div>

<div class="validator"></div>
<script>

  function apiArch(){
    alert('Architecture');

  }

  function httpVerb(){
     alert('HTTP-VERB');
  }

</script>
</body>
</html>