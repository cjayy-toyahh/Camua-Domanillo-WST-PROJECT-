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
            justify-content: space-between;
            padding: 15px 40px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }


        .bsit {
            color: white;
            font-size: 18px;
            font-weight: 600;
        }

        .team {
            font-size: 15px;
            color: #ffffff;
            white-space: nowrap;
        }

        .nav {
            margin-left: auto;
        }

        .nav a {
            text-decoration: none;
            color: white;
            margin-left: 10px;
            padding: 8px 18px;
            border-radius: 20px;
            background: linear-gradient(135deg, #e60b0b, #ffffff);
            transition: 0.3s;
        }

        .nav a:hover {
            background: linear-gradient(135deg, #e60b0b, #e60b0b);
        }

        .head {
            text-align: center;
            margin-top: 40px;
            font-size: 28px;
            color: #000000;
        }

        table {
            width: 400px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        td {
            padding: 10px;
        }

        input {
            width: 100%;
            padding: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
        }

        .btn-add {
            background: #c92b2b;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-add:hover {
            background: #16a34a;
        }

        .btn-view {
            background: #e60b0b;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 6px;
            display: inline-block;
        }

        .btn-view:hover {
            background: #2563eb;
        }
    </style>
    
        <head>
            <title>ADD DATA</title>
        </head>

        <body>

            <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $course = $_POST['course'];

                $xml = new DOMDocument;
                $xml->load('cict.xml');

                $newStudent = $xml->createElement('student');
                $newStudent->appendChild($xml->createElement('id', $id));
                $newStudent->appendChild($xml->createElement('name', $name));
                $newStudent->appendChild($xml->createElement('course', $course));

                $xml->getElementsByTagName('Students')->item(0)->appendChild($newStudent);
                $test = $xml->save("cict.xml");

                if ($test) {
                    echo "<script>alert('Record added...')</script>";
                }
            }
            ?>

            <div class="container">
                <div class="header-left">
                    <span class="bsit"><em>BSIT 2J-G2</em></span>
                    <span class="team">DOMANILLO,KENNETH || CAMUA,CALVIN</span>
                </div>

                <div class="nav">
                    <a href="index.php">HOME</a>
                </div>
            </div>

            <h1 class="head">ADD NEW STUDENT</h1>


            <form method="POST">
                <table>
                    <tr>
                        <td>Id:</td>
                        <td><input type="number" name="id" required></td>
                    </tr>

                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" required></td>
                    </tr>

                    <tr>
                        <td>Course:</td>
                        <td><input type="text" name="course" required></td>
                    </tr>

                    <tr>
                        <td><button type="submit" name="submit" class="btn-add">ADD</button></td>
                        <td><a href="index.php" class="btn-view">VIEW DATA</a></td>
                    </tr>
                </table>
            </form>

        </body>

        </html>