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
}