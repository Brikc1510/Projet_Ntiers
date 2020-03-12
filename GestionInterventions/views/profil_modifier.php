<?php
function fAge($date) {
  $datetime1 = new DateTime("today");
  $datetime2 = new DateTime($date);
  $interval = $datetime2->diff($datetime1);
  return $interval->format('%y');
  }  ?>
<html>
<head>
    <title>Interventions</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
<!--     <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">

<?php require_once VIEWS.DS.'common'.DS.'entete.php';  ?>
</head>
<body>

   <div class="container">
<div class="row">
<div class="col-md-10 ">
<?php foreach ($info as $e){ ?>        
<form class="form-horizontal" action="index.php?c=user&m=modifierbdd" method="post">
<fieldset>

<!-- Form Name -->
<legend>User profile form requirement</legend>

<!-- Text input-->




<div class="form-group">
  <label class="col-md-4 control-label" for="Name (Full name)">Nom</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-user">
        </i>
       </div>
       <input id="Name (Full name)" name="n" type="text" value=<?php if (isset($e->P_NOM)) echo $e->P_NOM; ?> class="form-control input-md">
      </div>
      </div>
    
  </div>

  <div class="form-group">
  <label class="col-md-4 control-label" for="Name (Full name)">prénom</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-user">
        </i>
       </div>
       <input id="Name" name="prenom" type="text"  value=<?php if (isset($e->P_PRENOM)) echo $e->P_PRENOM; ?> class="form-control input-md">
      </div>
      </div>

</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Date Of Birth">Date de naissance</label>  
  <div class="col-md-4">

  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-birthday-cake"></i>
        
       </div>
       <input id="Date Of Birth" name="dated" type="text" value=<?php if (isset($e->P_BIRTHDATE)) echo $e->P_BIRTHDATE; ?> class="form-control input-md">
      </div>
  
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Father">Sexe:</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
      <i class="fa fa-male" style="font-size: 20px;"></i>
        
       </div>
      <input id="Father" name="sexe" type="text" value=<?php if (isset($e->P_SEXE)) echo $e->P_SEXE; ?> class="form-control input-md">

      </div>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Availability time">Adresse</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="glyphicon glyphicon-home"></i>
        
       </div>
    <input id="Availability time" name="add" type="text" value=<?php if (isset($e->P_ADDRESS)) echo $e->P_ADDRESS; ?> class="form-control input-md">
    
      </div>
  
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Primary Occupation">Occupation</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-briefcase"></i>
        
       </div>
      <input id="Primary Occupation" name="poste" type="text" value=<?php if (isset($e->P_PROFESSION)) echo $e->P_PROFESSION; ?> class="form-control input-md">
      </div>
  
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Phone number ">Phone number </label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-phone"></i>
        
       </div>
    <input id="Phone number " name="tele" type="text"  value=<?php if (isset($e->P_PHONE)) echo $e->P_PHONE; ?> class="form-control input-md">
    
      </div>
      </div>
      </div>
      <div class="form-group">
  <label class="col-md-4 control-label" for="Email Address">Email Address</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-envelope-o"></i>
        
       </div>
    <input id="Email Address" name="email" type="text"  value=<?php if (isset($e->P_EMAIL)) echo $e->P_EMAIL; ?>  class="form-control input-md">
    
      </div>
  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Availability time">date d'engagement</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-clock-o"></i>
        
       </div>
    <input id="Availability time" name="datee" type="text" value=<?php if (isset($e->P_DATE_ENGAGEMENT)) echo $e->P_DATE_ENGAGEMENT; ?> class="form-control input-md">
    
      </div>
  
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" ></label>  
  <div class="col-md-4">
  <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-thumbs-up">Changer</button>
  <!-- <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Submit</a> -->
  <a href="index.php?c=user&m=modifier&id='.$e->P_CODE." class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span> Clear</a>
    
  </div>
</div>

</fieldset>
</form>
<?php }?>
</div>
<div class="col-md-2 hidden-xs">
<img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
  </div>


</div>
   </div>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>