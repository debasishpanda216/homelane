<?php include '../config/NotesUtility.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note Details</title>
    <link rel="stylesheet" href="../assets/css/lister.css" />
</head>
<body>
    <?php
        $notesUtility   = new NotesUtility();
        $noteDetails    = $notesUtility->fetchNoteDetails($_GET['id']);
    ?>
    <center>
        <h3 style="text-align: center">Note Details</h3>
        <table>
            <tr>
                <th>Created On : </th>
                <td><?php echo date('jS M Y h:i A', strtotime($noteDetails["createdon"]))?></td>
            </tr>
            <tr>
                <th>Title : </th>
                <td><?php echo $noteDetails['title']?></td>
            </tr>
            <tr>
                <th>Text : </th>
                <td><?php echo $noteDetails['details']?></td>
            </tr>

        </table>

    </center>
</body>
</html>