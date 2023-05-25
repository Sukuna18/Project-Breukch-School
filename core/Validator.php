<?php

namespace Core;

class Validator{
  public function verifierFormatDate($annee)
  {
      if (strlen($annee) !== 9 || strpos($annee, '-') !== 4) {
          return false;
      }
      $parties = explode('-', $annee);
      if (count($parties) !== 2) {
          return false;
      }
      $debut_annee = trim($parties[0]);
      $fin_annee = trim($parties[1]);
      if (!is_numeric($debut_annee) || !is_numeric($fin_annee)) {
          return false;
      }
      return ($fin_annee - $debut_annee === 1);
  }
  public function verifierDateNaissance($date)
  {
      if (strlen($date) !== 10 || strpos($date, '-') !== 4) {
          return false;
      }
      $parties = explode('-', $date);
      if (count($parties) !== 3) {
          return false;
      }
      $annee = trim($parties[0]);
      $mois = trim($parties[1]);
      $jour = trim($parties[2]);
      if (!is_numeric($annee) || !is_numeric($mois) || !is_numeric($jour)) {
          return false;
      }
      return checkdate($mois, $jour, $annee);
  }
}