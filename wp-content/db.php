<?php
/**
 * Drop-in db.php para cargar PG4WP (PostgreSQL para WordPress)
 *
 * Este archivo **debe** llamarse exactamente "db.php" y
 * estar en el directorio wp-content/ (no dentro del plugin).
 */

/** Carga el núcleo de PG4WP desde la carpeta del plugin */
require_once __DIR__ . '/plugins/pg4wp/core.php';
