<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $original_id = $_POST['original_id'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $section = $_POST['section'];

    $xml = simplexml_load_file("cict.xml");
    foreach ($xml->student as $student) {
        if ((string)$student->id == $original_id) {
            $student->id = $id;
            $student->name = $name;
            $student->course = $course;
            $student->section = $section;
            break;
        }
    }
    $xml->asXML("cict.xml");
    echo "<script>alert('Student updated successfully!');</script>";
}
?>
<!DOCTYPE html>
<html>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(to right, #eef2f3, #dfe9f3);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        background: #e60b0b;
        display: flex;
        align-items: center;
        padding: 15px 40px;
    }

    .bsit {
        color: white;
        font-size: 18px;
        font-weight: 600;
    }

    .members {
        color: #ffffff;
        font-size: 13px;
        margin-left: 15px;
    }

    nav {
        display: flex;
        width: 100%;
        align-items: center;
    }

    .home {
        margin-left: auto;
        color: #e60b0b;
        text-decoration: none;
        padding: 8px 18px;
        border-radius: 20px;
        background: white;
        transition: 0.3s;
    }

    .home:hover {
        background: #e60b0b;
        color: white;
    }

    .container-info {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 80px;
    }

    form {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .select-acc {
        color: #1e293b;
        margin-bottom: 15px;
        font-size: 16px;
    }

    #selectors {
        width: 220px;
        padding: 6px;
        border-radius: 5px;
        border: 1px solid #cbd5e1;
    }

    #a {
        text-align: center;
        margin-top: 40px;
    }

    .info-detail {
        color: #2563eb;
        font-weight: 500;
    }
</style>

<head>
    <title>SEARCH DATA</title>
</head>


<script>

    function showData(str) {
        if (str == "") {
            document.getElementById("a").innerHTML = "";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("a").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "getinfo.php?q=" + str, true);
        xmlhttp.send();
    }
</script>

<body>
    <div class="container">
        <nav>
            <h3 class="bsit"><em>BSIT 2J-G2</em></h3>
            <h1 class="members" style="margin-left:10px"> DOMANILLO,KENNETH CARL || CAMUA,CALVIN JOHN</h1>
            <a href="index.php" class="home">HOME</a>
        </nav>
    </div>
    <div class="container-info">
        <form>
            <h3 class="select-acc">Select Account to Display Information:</h3>
            <select name="cds" onchange="showData(this.value)" id="selectors">
                <option value="">Names:</option>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $xml = simplexml_load_file("cict.xml");

                    $original = $_POST['original_id'];

                    foreach ($xml->student as $student) {
                        if ((string) $student->id == (string) $original) {

                            $student->id = $_POST['id'];
                            $student->name = $_POST['name'];
                            $student->course = $_POST['course'];

                            break;
                        }
                    }
                    $result = $xml->asXML("cict.xml");

                    if ($result) {
                        echo "<script>alert('Record Updated Successfully!'); window.location.href='index.php';</script>";
                    } else {
                        echo "ERROR: Failed to save XML";
                    }
                }
                ?>
                <?php
                $xml = simplexml_load_file("cict.xml");

                foreach ($xml->student as $student) {
                    ?>
                    <option value="<?php echo $student->id; ?>">
                        <?php echo $student->name; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </form>
    </div>
    <div id="a"><b class="info-detail">Account information will be listed here...</b></div>



</body>

</html>