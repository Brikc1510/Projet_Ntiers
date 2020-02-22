<main role="main" class="container">
    <div class="starter-template">
        <h1>Affichage de la liste des interventions</h1>
    </div>

    <div class="row">
        <table class="table table-sm">
            <thead>
            <tr>

                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Commune</th>
                <th scope="col">Adresse</th>
                <th scope="col">Type</th>
                <th scope="col">Requerant</th>
                <th scope="col">Date Debut</th>
                <th scope="col">Heure Debut</th>
                <th scope="col">Date Fin</th>
                <th scope="col">Heure Fin</th>
                <th scope="col">Responsable</th>
                <th scope="col">TV CODE</th>
                <th scope="col">Date depart</th>
                <th scope="col">Heure depart</th>
                <th scope="col">Date arrivéée</th>
                <th scope="col">Heure arrivée</th>
                <th scope="col">Date retour</th>
                <th scope="col">Heure retour</th>
                <th scope="col"><i class="fas fa-eye"></i></th>
                <th scope="col"><i class="fas fa-edit"></i></th>
                <th scope="col"><i class="fas fa-trash-alt"></i></th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($interventionlist as $i){ ?>
                <tr>

                    <td><?php if (isset($i->nom)) echo $i->nom; ?></td>
                    <td><?php if (isset($i->prenom)) echo $i->prenom; ?></td>
                    <td><?php if (isset($i->commune)) echo $i->commune; ?></td>
                    <td><?php if (isset($i->adresse)) echo $i->adresse; ?></td>
                    <td><?php if (isset($i->typeI)) echo $i->typeI; ?></td>
                    <td><?php if (isset($i->requerant)) echo $i->requerant; ?></td>
                    <td><?php if (isset($i->dateDebut)) echo date('d/m/Y',strtotime($i->dateDebut)); ?></td>
                    <td><?php if (isset($i->heureDebut)) echo date('H:i:s',strtotime($i->heureDebut)); ?></td>
                    <td><?php if (isset($i->dateFin)) echo date('d/m/Y',strtotime($i->dateFin)); ?></td>
                    <td><?php if (isset($i->heureFin)) echo date('H:i:s',strtotime($i->heureFin)); ?></td>
                    <td><?php if (isset($i->responsable)) echo $i->responsable; ?></td>
                    <td><?php if (isset($i->TV_CODE)) echo $i->TV_CODE; ?></td>

                    <td><?php if (isset($i->dateDepart)) echo date('d/m/Y',strtotime($i->dateDepart)); ?></td>
                    <td><?php if (isset($i->heureDepart)) echo date('H:i:s',strtotime($i->heureDepart)); ?></td>
                    <td><?php if (isset($i->dateArrivee)) echo date('d/m/Y',strtotime($i->dateArrivee)); ?></td>
                    <td><?php if (isset($i->heureArrivee)) echo date('H:i:s',strtotime($i->heureArrivee)); ?></td>
                    <td><?php if (isset($i->dateRetour)) echo date('d/m/Y',strtotime($i->dateRetour)); ?></td>
                    <td><?php if (isset($i->heureRetour)) echo date('H:i:s',strtotime($i->heureRetour)); ?></td>
                    <td><?php if (isset($i->id)) echo '<a href="index.php?c=intervention&m=view&id='.$i->id.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>';?></td>
                    <td><?php if (isset($i->id)) echo '<a href="index.php?c=intervention&m=edit&id='.$i->id.'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>';?></td>
                    <td><?php if (isset($i->id)) echo '<a href="index.php?c=intervention&m=delete&id='.$i->id.'" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';?></td>



                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</main><!-- /.container -->