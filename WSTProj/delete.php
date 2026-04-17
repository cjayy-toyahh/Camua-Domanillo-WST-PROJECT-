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
            background: #1e3a5f;
            display: flex;
            align-items: center;
            padding: 15px 40px;
        }

        nav {
            display: flex;
            width: 100%;
            align-items: center;
        }

        .bsit {
            color: #fff;
            font-size: 18px;
            font-weight: 600;
        }

        .team {
            color: #cbd5e1;
            font-size: 13px;
            margin-left: 15px;
        }

        .home,
        .about {
            text-decoration: none;
            color: white;
            padding: 8px 18px;
            border-radius: 20px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            transition: 0.3s;
            margin-left: 10px;
        }

        .home {
            margin-left: auto;
        }

        .home:hover,
        .about:hover {
            background: linear-gradient(135deg, #2563eb, #1e3a8a);
        }

        .choose-message {
            text-align: center;
            margin-top: 60px;
            color: #1e293b;
            font-size: 20px;
            font-weight: 500;
        }

        form {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        table {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        #selectors {
            width: 200px;
            padding: 6px;
            border-radius: 5px;
            border: 1px solid #cbd5e1;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #dc2626;
        }
    </style>
        <head>
            <title>Delete Data</title>
    </head>

    <body>

        <div class="container">
            <nav>
                <h3 class="bsit"><em>BSIT 2J-G2</em></h3>
                <h3 class="team">DOMANILLO,KENNETH || CAMUA,CALVIN</h3>
                <a href="index.php" class="home">HOME</a>
            </nav>
        </div>

        <?php
        $xml = new DOMDocument;
        $xml->load('cict.xml');
        $x = $xml->getElementsByTagName('Students')->item(0);
        $fr = $x->getElementsByTagName('student');

        if (isset($_POST['submit'])) {

            if (!empty($_POST['name'])) {

                $Id = $_POST['name'];
                $found = false;

                foreach ($fr as $nd) {
                    if ($nd->getElementsByTagName('name')->item(0)->nodeValue == $Id) {
                        $x->removeChild($nd);
                        $xml->save("cict.xml");
                        echo "<script>alert('Deleted successfully')</script>";
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    echo "<script>alert('Name not found!')</script>";
                }

            } else {
                echo "<script>alert('Please select a name first!')</script>";
            }
        }
        ?>

        <h2 class="choose-message">Choose Name want to delete:</h2>

        <form method="POST">
            <table>
                <tr>
                    <td>
                        <select name="name" id="selectors">
                            <option value="">LIST OF NAMES:</option>

                            <?php
                            $xmls = simplexml_load_file("cict.xml");

                            foreach ($xmls->student as $student) {
                            ?>
                                <option value="<?php echo $student->name; ?>">
                                    <?php echo $student->name; ?>
                                </option>
                            <?php } ?>

                        </select>
                    </td>

                    <td>
                        <button type="submit" name="submit" class="btn-delete">Delete</button>
                    </td>
                </tr>
            </table>
        </form>

    </body>

</html>