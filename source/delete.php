<?php
/**
 * Created by PhpStorm.
 * User: debasish.panda
 * Date: 23-12-2018
 * Time: 12:14
 */

include '../config/NotesUtility.php';
//echo "<br><pre>";print_r($_GET);die;
$notesUtility   = new NotesUtility();
$notesUtility->deleteNote($_GET);
header('location: lister.php');


