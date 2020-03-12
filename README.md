# Projet_Ntiers
Pour ce Premier liverable on s'y passer sur les fonctionalités suivante: 
1-Le Login 
2-Recuperation de mot de passe 
3-Accés soit a la page d'aministrateur soit la page utilisateur
4-Formulaire d'intervention 
5-Ajout d'une intervension (fonctionalité incomplete) 



Les fonctionnalités ajoutées pour ce deuxième livrable sont:
1- Ajoute d'une intervention avec plusieurs véhicules.
2- Déconnexion.

On a du refaire la base de données pour pouvoir ajouter plusieurs véhicule à la meme intervention.



Les fonctionnalités ajoutées pour le livrable final sont :
1-Profil de l'utilisateur
2-Possibilité de modifier le profile de l'utilisateur
3-Api restful
4-Affichage des interventions
5-Possibilité de filter les interventions
6-Possibilité d'exporter les interventions en fichier csv
7-Validataion des interventions
8-Modification des interventions

Modifications apportées sur la base de données

ALTER TABLE `interventions`
  DROP `dateDepart`,
  DROP `heureDepart`,
  DROP `dateArrivee`,
  DROP `heureArrivee`,
  DROP `dateRetour`,
  DROP `heureRetour`;

ALTER TABLE `interventions` ADD `etat` VARCHAR(10) NOT NULL AFTER `responsable`;
ALTER TABLE `interventions` ADD `idChef` INT NOT NULL AFTER `responsable`;

ALTER TABLE `interventions` ADD `commentaire` VARCHAR(100) NULL AFTER `etat`;
