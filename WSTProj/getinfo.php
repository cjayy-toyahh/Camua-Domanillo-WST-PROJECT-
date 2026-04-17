<?php
$q = $_GET["q"];
$xml = simplexml_load_file("cict.xml");

foreach ($xml->student as $student) {
    if ($student->id == $q) {
?>
        <style>
            .update-form {
                margin-top: 30px;
                background: #ffffff;
                padding: 25px;
                border-radius: 10px;
                width: 300px;
                margin-left: auto;
                margin-right: auto;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                text-align: center;
            }

            .update-form input {
                width: 90%;
                padding: 8px;
                margin: 8px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .update-btn {
                background: linear-gradient(135deg, #22c55e, #15803d);
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .update-btn:hover {
                background: linear-gradient(135deg, #16a34a, #14532d);
            }
        </style>

        <form method="POST" action="update.php" class="update-form">
            <h3>Update Student</h3>

            <input type="text" name="id" value="<?php echo $student->id; ?>" placeholder="ID"><br>
            <input type="text" name="name" value="<?php echo $student->name; ?>" placeholder="Name"><br>
            <input type="text" name="course" value="<?php echo $student->course; ?>" placeholder="Course"><br>

            <input type="hidden" name="original_id" value="<?php echo $student->id; ?>">

            <button type="submit" class="update-btn">Update</button>
        </form>
<?php
    }
}
?>