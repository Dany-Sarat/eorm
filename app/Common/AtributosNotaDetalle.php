<?php
namespace App\Common;
class AtributosNotaDetalle
{
  private const UNIDAD = [
    1 => 'primera',
    2 => 'segunda',
    3 => 'tercera',
    4 => 'cuarta',
  ];
  public static function getAtributos(mixed $unidad)
  {
    $tareas = "tareas_" . self::UNIDAD[$unidad] . "_unidad";
    $examen = "examen_" . self::UNIDAD[$unidad] . "_unidad";
    $total = "total_" . self::UNIDAD[$unidad] . "_unidad";
    return [
      $tareas,
      $examen,
      $total,
    ];
  }
}