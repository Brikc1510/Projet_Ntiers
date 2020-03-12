 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Projet NTiers</a>
    </div>
    <ul class="nav navbar-nav">
      <?php
      if(session_status() !== PHP_SESSION_ACTIVE)
        session_start();
        switch($_SESSION['GP_ID'])
        {

           //Droit pour pompier simple
           case 0:
           echo '<li><a href="index.php?c=user&m=information">Profil</a></li>';
           echo '<li><a href="index.php?c=intervention&m=index">Mes participations</a></li>';

          break;

          //Droit pour chef de section
          case 2:
          echo '<li><a href="index.php?c=user&m=information">Profil</a></li>';
          echo '<li><a href="index.php?c=intervention&m=afficher">Saisie intervention</a></li>';
          echo '<li><a href="index.php?c=intervention&m=index">Mes interventions</a></li>';

          break;
          //Droit pour chef de centre
          case 3:
          echo '<li><a href="index.php?c=user&m=information">Profil</a></li>';
            echo '<li><a href="index.php?c=intervention&m=afficher">Saisie intervention</a></li>';
            echo '<li><a href="index.php?c=intervention&m=index">Toutes les interventions</a></li>';
            echo '<li><a href="index.php?c=intervention&m=listeInterAvalider">Interventions à valider</a></li>';
            
          break;
          //Droit pour admin
          case 4:
          echo '<li><a href="index.php?c=user&m=information">Profil</a></li>';
            echo '<li><a href="index.php?c=intervention&m=afficher">Saisie intervention</a></li>';
            echo '<li><a href="index.php?c=intervention&m=index">Toutes les interventions</a></li>';
            echo '<li><a href="index.php?c=intervention&m=listeInterAvalider">Interventions à valider</a></li>';
          break;
        }
      ?>
   
        
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php?c=user&m=logout">Deconnecter</a></li>
    </ul>
  </div>
</nav> 


