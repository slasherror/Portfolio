<?php
include 'connect.php';


// Function to sanitize input data
function sanitize($data)
{
    global $connection;
    return mysqli_real_escape_string($connection, htmlspecialchars(trim($data)));
}

// Initialize variables for programming skills
/*
$html = '';
$css = '';
$java_script = '';
$c_programming = '';
$c_plus_plus_programming = '';
$python = '';
$c_sharp = '';

// Initialize variables for knowledge
$windows = '';
$linux = '';
$database = '';
$git = '';
$machine_learning = '';
$cyber_security = '';

*/

// If form is submitted for programming skills
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_skills'])) {
    // Sanitize input data for programming skills
    $html = sanitize($_POST['html']);
    $css = sanitize($_POST['css']);
    $java_script = sanitize($_POST['java_script']);
    $c_programming = sanitize($_POST['c_programming']);
    $c_plus_plus_programming = sanitize($_POST['c_plus_plus_programming']);
    $python = sanitize($_POST['python']);
    $c_sharp = sanitize($_POST['c_sharp']);

    // Update programming skills in the database
    $query = "UPDATE programing SET 
                html = '$html',
                css = '$css',
                java_script = '$java_script',
                c_programing = '$c_programming',
                `c++programing` = '$c_plus_plus_programming',
                python = '$python',
                c_sharp = '$c_sharp'
                WHERE id = 1";
    $result = mysqli_query($connection, $query);

    /*

    if ($result) {
        echo "Programming skills updated successfully";
    } else {
        echo "Error updating programming skills: " . mysqli_error($connection);
    }
    */
}

// If form is submitted for knowledge
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_knowledge'])) {
    // Sanitize input data for knowledge
    $windows = sanitize($_POST['windows']);
    $linux = sanitize($_POST['linux']);
    $database = sanitize($_POST['database']);
    $git = sanitize($_POST['git']);
    $machine_learning = sanitize($_POST['machine_learning']);
    $cyber_security = sanitize($_POST['cyber_security']);

    // Update knowledge in the database
    $query = "UPDATE know SET 
                windows = '$windows',
                linux = '$linux',
                data_base = '$database',
                git = '$git',
                machine_learning = '$machine_learning',
                cyber_security = '$cyber_security'
                WHERE id = 1";
    $result = mysqli_query($connection, $query);
    /*
    if ($result) {
        echo "Knowledge updated successfully";
    } else {
        echo "Error updating knowledge: " . mysqli_error($connection);
    }
    */
}

// Fetch programming skill data from the database
$query = "SELECT * FROM programing WHERE id = 1";
$result = mysqli_query($connection, $query);
$pro_row = mysqli_fetch_assoc($result);
/*
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $html = $row['html'];
    $css = $row['css'];
    $java_script = $row['java_script'];
    $c_programming = $row['c_programing'];
    $c_plus_plus_programming = $row['c++programing'];
    $python = $row['python'];
    $c_sharp = $row['c_sharp'];
}
*/
// Fetch knowledge data from the database
$query = "SELECT * FROM know WHERE id = 1";
$result = mysqli_query($connection, $query);
$know_row = mysqli_fetch_assoc($result);
/*
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $windows = $row['windows'];
    $linux = $row['linux'];
    $database = $row['data_base'];
    $git = $row['git'];
    $machine_learning = $row['machine_learning'];
    $cyber_security = $row['cyber_security'];
}
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="profile/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table,
        th,
        td {
            border: 2px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
    <title>Admin Panel</title>
</head>

<body>



    <!-- introduction section -->

    <div class="container_display">
        <h2>Profile</h2>
        <br><br>
        <?php
        if (isset($_GET['image_success'])) {
            echo '<div class="success">Image Uploaded successfully</div>';
        }

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action == 'saved') {
                echo '<div class="success">Saved </div>';
            } elseif ($action == 'deleted') {
                echo '<div class="success">Image Deleted Successfully ... </div>';
            }
        }
        ?>
        <table cellpadding="10" style="border:1px solid black;">
            <!-- <tr>
                <td colspan='7'><span style="float:right;"><a href="upload.php"><button class="btn-primary">Upload New image </button></a></span></td>
            </tr> -->
            <tr>
                <th>Image</th>
                <th>Description</th>
                <th>CV Link</th>
                <th>Contact Link</th>
                <th>Github Link</th>
                <th>Linkedin Link</th>
                <th>Action</th>
            </tr>
            <?php $res = mysqli_query($connection, "SELECT* from profile where id=1");
            while ($row = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td><img src="profile/uploads/<?php echo $row['image'];?>" width="50px" height="50px"/></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['cv_link']; ?></td>
                    <td><?php echo $row['contact_link']; ?></td>
                    <td><?php echo $row['github_link']; ?></td>
                    <td><?php echo $row['linkedin_link']; ?></td>
                    <td><a href="profile/edit.php?id=' . $row['id'] . '"><button class="btn-primary">Edit </button></a>
                        <br> <br>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>



    <!-- this is about section -->

    <div class="container_display">
        <h2>About</h2>
        <br><br>
        <?php
        if (isset($_GET['image_success'])) {
            echo '<div class="success">Image Uploaded successfully</div>';
        }

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action == 'saved') {
                echo '<div class="success">Saved </div>';
            } elseif ($action == 'deleted') {
                echo '<div class="success">Image Deleted Successfully ... </div>';
            }
        }
        ?>
        <table cellpadding="10" style="border:1px solid black;">
            <!-- <tr>
                <td colspan='7'><span style="float:right;"><a href="upload.php"><button class="btn-primary">Upload New image </button></a></span></td>
            </tr> -->
            <tr>
                <th>Image</th>
                <th>experience</th>
                <th>education</th>
                <th>about</th>
                <th>Action</th>
            </tr>
            <?php $res = mysqli_query($connection, "SELECT* from about where id=1");
            while ($row = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td><img src="about/uploads/<?php echo $row['image_about'];?>" width="50px" height="50px"/></td>
                    <td><?php echo $row['experience']; ?></td>
                    <td><?php echo $row['education']; ?></td>
                    <td><?php echo $row['about']; ?></td>
                    <td><a href="about/edit.php?id=' . $row['id'] . '"><button class="btn-primary">Edit </button></a>
                        <br> <br>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>






    <div class="container_display">
        <h2>Edit Programming Skills</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="html">HTML:</label><br>
            <input type="text" id="html" name="html" value="<?php echo $pro_row['html']; ?>"><br>

            <label for="css">CSS:</label><br>
            <input type="text" id="css" name="css" value="<?php echo  $pro_row['css']; ?>"><br>

            <label for="java_script">JavaScript:</label><br>
            <input type="text" id="java_script" name="java_script" value="<?php echo $pro_row['java_script']; ?>"><br>

            <label for="c_programming">C Programming:</label><br>
            <input type="text" id="c_programming" name="c_programming" value="<?php echo $pro_row['c_programing']; ?>"><br>

            <label for="c_plus_plus_programming">C++ Programming:</label><br>
            <input type="text" id="c_plus_plus_programming" name="c_plus_plus_programming" value="<?php echo $pro_row['c++programing']; ?>"><br>

            <label for="python">Python:</label><br>
            <input type="text" id="python" name="python" value="<?php echo $pro_row['python']; ?>"><br>

            <label for="c_sharp">C#:</label><br>
            <input type="text" id="c_sharp" name="c_sharp" value="<?php echo $pro_row['c_sharp']; ?>"><br>

            <input type="submit" name="submit_skills" value="Submit">
        </form>
    </div>

    <div class="container_display">
        <h2>Edit Knowledge</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="windows">Windows:</label><br>
            <input type="text" id="windows" name="windows" value="<?php echo $know_row['windows']; ?>"><br>

            <label for="linux">Linux:</label><br>
            <input type="text" id="linux" name="linux" value="<?php echo $know_row['linux']; ?>"><br>

            <label for="database">Database:</label><br>
            <input type="text" id="database" name="database" value="<?php echo $know_row['data_base']; ?>"><br>

            <label for="git">Git:</label><br>
            <input type="text" id="git" name="git" value="<?php echo $know_row['git']; ?>"><br>

            <label for="machine_learning">Machine Learning:</label><br>
            <input type="text" id="machine_learning" name="machine_learning" value="<?php echo $know_row['machine_learning']; ?>"><br>

            <label for="cyber_security">Cyber Security:</label><br>
            <input type="text" id="cyber_security" name="cyber_security" value="<?php echo $know_row['cyber_security']; ?>"><br>

            <input type="submit" name="submit_knowledge" value="Submit">
        </form>
    </div>


</body>

</html>