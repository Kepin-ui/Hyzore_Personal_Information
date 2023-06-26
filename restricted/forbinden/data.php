<?php
include "../../conn.php";
include "../logged.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #222;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #333;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .form-container input[type="submit"],
        .form-container input[type="button"] {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
        }

        .form-container input[type="submit"]:hover,
        .form-container input[type="button"]:hover {
            background-color: #0056b3;
        }

        .form-container input[type="submit"]:focus,
        .form-container input[type="button"]:focus {
            outline: none;
        }

        .edit {
            padding: 5px 9px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 12px;
            border-radius: 3px;
            text-decoration: none;
        }

        .table {
            display: table;
            border-collapse: separate;
            box-sizing: border-box;
            text-indent: initial;
            border-spacing: 2px;
            border-color: gray;
        }

        .delete {
            padding: 5px 10px;
            border: none;
            background-color: red;
            color: #fff;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            border-radius: 3px;
        }

        header {
            background-color: #222;
            padding: 20px;
            text-align: center;
            text-transform: none;
        }

        h1 {
            margin: 0;
            font-size: 22px;
        }

        .action {
            padding-left: 360px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th,
        .data-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #333;
            word-break: break-word;
        }

        .data-table th {
            background-color: #444;
        }

        .data-table tr:nth-child(even) {
            background-color: #333;
        }

        .data-table tr:hover {
            background-color: #555;
        }

        @media (max-width: 600px) {
            .form-container {
                max-width: 100%;
                padding: 10px;
            }
            .delete, .edit {
                margin-top: 0px;
            }
        }
        @media (min-width: 600px) {
            .delete, .edit {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1 style="font-family: 'Montserrat', sans-serif;">Project Data</h1>
    </header>
    <div class="form-container">
    <a href="add.php"><input type="button" value="Add"></a>
    <a style="color-background: red;" href="../logout.php"><input type="button" value="Out"></a>
        <table class="data-table">
            <thead>
                <tr>
                    <th>
                        <center>Title</center>
                    </th>
                    <th <center>Date</center>
                    </th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <?php
            $tampil = mysqli_query($conn, "SELECT * FROM project") or die(mysqli_error($conn));
            while ($data = mysqli_fetch_array($tampil)) { ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $data['title']; ?>
                        </td>
                        <td>
                            <?php echo $data['timestamp']; ?>
                        </td>
                        <td <center>
                            <div id="thanks"><a class="edit" data-placement="bottom" data-toggle="tooltip" title="Edit"
                                    href="edit.php?hal=edit&id=<?php echo $data['id']; ?>"><span
                                        class="fa fa-edit"></span></a>
                                <a onclick="return confirm ('Are you sure to delete <?php echo $data['title']; ?>.?');"
                                    class="delete fa fa-trash" data-placement="bottom" data-toggle="tooltip" title="Delete"
                                    href="delete.php?hal=del&id=<?php echo $data['id']; ?>"><span></a>
                                </center>
                        </td>
                    </tr>
        </div>

        <?php
            }
            ?>
    </tbody>
    </table>
    </div>
</body>

</html>