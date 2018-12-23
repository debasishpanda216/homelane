<?php include '../config/NotesUtility.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notes List</title>
    <link rel="stylesheet" href="../assets/css/lister.css" />
</head>
<body>
    <center>
        <h3 style="text-align: center">Notes List</h3>
        <form method="post" action="search.php">
            <input type="text" name="keyword" placeholder="Search by title, text" value="<?php if(isset($_GET['keyword']) && trim($_GET['keyword']) != ''){echo $_GET['keyword'];}?>">
            <input type="submit" value="Search">
        </form>
        <br/><br/>
        <table>
            <tr>
                <th>Title</th>
                <th>Text</th>
                <th>
                    Created On <br/>
                    <a href="lister.php?sort=ASC" style="text-align: center;font-size: 10px;color: red;">ASC</a>
                    <a href="lister.php?sort=DESC" style="text-align: center;font-size: 10px;color: red;">DESC</a>
                </th>
                <th>Actions</th>
            </tr>

            <?php
                $sort           = isset($_GET['sort']) && trim($_GET['sort']) != '' ? $_GET['sort'] : '';
                $keyword        = isset($_GET['keyword']) && trim($_GET['keyword']) != '' ? $_GET['keyword'] : '';
                $notesUtility   = new NotesUtility();
                $result         = $notesUtility->fetchAllNotes($sort,$keyword);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><a href="details.php?id=<?php echo $row["id"];?>"><?php echo $row["title"];?></a></td>
                            <td><?php echo substr($row['details'],0,140).'...'?></td>
                            <td><?php echo date('jS M Y h:i A', strtotime($row["createdon"])); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row["id"];?>" style="text-align: center;color: red;">Edit</a>
                                <br/> <br/>
                                <a href="delete.php?id=<?php echo $row["id"];?>" style="text-align: center;color: red;padding-top: 10px;">Delete</a>
                            </td>
                        </tr>

                <?php    }
                } else { ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">
                            <a href="create.php" style="text-align: center;">No Notes created.Create a new one.</a>
                        </td>
                    </tr>
            <?php    }
            ?>

            <tr>
                <td colspan="4" style="text-align: center;">
                    <a href="create.php" style="text-align: center;color: red;">Create New Note</a>
                </td>
            </tr>
        </table>

    </center>
</body>
</html>