<?php
/**
 * Created by PhpStorm.
 * User: debasish.panda
 * Date: 23-12-2018
 * Time: 12:14
 */

include '../config/NotesUtility.php';
//echo "<br><pre>";print_r($_POST);die;
$notesUtility   = new NotesUtility();
$notesUtility->saveNote($_POST);
header('location: lister.php');


