<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Note</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/create.css" >
</head>
<body>
    <div class="content">
        <h3 style="text-align: center">Create Note</h3>

        <form method="post" action="savenote.php" onsubmit="return validateForm();">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Title : </label>
                </div>
                <div class="col-75">
                    <input type="text" id="title" name="title" placeholder="Enter note title">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Text : </label>
                </div>
                <div class="col-75">
                    <textarea id="text" name="text" placeholder="Enter note details" style="height:200px"></textarea>
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