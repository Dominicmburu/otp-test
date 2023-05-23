<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>My Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a href="create.php" class="btn btn-primary" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                //create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //check connection
                if($connection->connect_error) {
                    die("Connection failed: Cannot connect to MySQL". $connection->connect_error);
                }

                //read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                //check if data is read in the database
                if(!$result){
                    die("No data found".$connection->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    //print data of each row
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a href='edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
                <!-- <tr>
                    <td>10</td>
                    <td>Bill Gates</td>
                    <td>bill.gate@gmail.com</td>
                    <td>+254717794150</td>
                    <td>new york</td>
                    <td>18/05/2022</td>
                    <td>
                        <a href="/myshop/edit.php" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/myshop/delete.php" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</body>
</html>