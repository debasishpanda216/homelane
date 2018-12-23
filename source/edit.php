<?php include '../config/NotesUtility.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Note</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/create.css" >
</head>
<body>
    <div class="content">
        <h3 style="text-align: center">Edit Note</h3>
        <?php
            $notesUtility   = new NotesUtility();
            $noteDetails    = $notesUtility->fetchNoteDetails($_GET['id']);
        ?>
        <form method="post" action="editNote.php" onsubmit="return validateForm();">
            <input type="hidden" id="id" name="id" value="<?php echo $noteDetails['id']?>">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Title : </label>
                </div>
                <div class="col-75">
                    <input type="text" id="title" name="title" placeholder="Enter note title" value="<?php echo $noteDetails['title']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Text : </label>
                </div>
                <div class="col-75">
                    <textarea id="text" name="text" placeholder="Enter note details" style="height:200px"><?php echo $noteDetails['details']?></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Save">
            </div>
        </form>

    </div>
    <script type="text/javascript" src="../assets/js/validation.js"></script>

</body>
</html>