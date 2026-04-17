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
        color: #ffffff;
        font-weight: 600;
        font-size: 22px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
    }

    .team {
        color: #ffffff;
        font-size: 14px;
        text-align: center;
    }

    .home {
        color: #e60b0b;
        text-decoration: none;
        font-size: 15px;
        padding: 10px 22px;
        border-radius: 25px;
        background: linear-gradient(135deg, #fff, #fff);
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .home:hover {
        background: linear-gradient(135deg, #e60b0b, #e60b0b);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .about {
        color: #e60b0b;
        text-decoration: none;
        font-size: 15px;
        padding: 10px 22px;
        border-radius: 25px;
        background: linear-gradient(135deg, #fff, #fff);
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .about:hover {
        background: linear-gradient(135deg, #e60b0b, #e60b0b);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    nav {
        display: flex;
        width: 100%;
        align-items: center;
    }


    .head {
        margin-right: 40px;
        color: #1e293b;
        text-align: center;
        margin-top: 50px;
        font-size: 32px;
        font-weight: 600;
    }


    table {
        width: 55%;
        margin: 40px auto;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        font-size: 18px;
    }

    th {
        background: #000102;
        color: #fff;
        font-weight: 600;
        padding: 14px;
    }


    td {
        background: #f8fafc;
        color: #1e293b;
        border-bottom: 1px solid #e2e8f0;
        padding: 12px;
    }

    tr:hover td {
        background: #e0f2fe;
        transition: 0.2s;
    }

    button {
        cursor: pointer;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-add {
        background: #e60b0b;
        color: white;
        width: 110px;
        height: 40px;
    }

    .btn-add:hover {
        background: #16a34a;
    }

    .btn-del {
        background: #e60b0b;
        color: white;
        width: 110px;
        height: 40px;
    }

    .btn-del:hover {
        background: #e4e0e0;
    }

    .btn-search {
        background: #e60b0b;
        color: white;
        width: 150px;
        height: 40px;
    }

    .btn-search:hover {
        background: #3819e7;
    }

    .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
        gap: 10px;
    }

    #searchInput {
        padding: 10px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
</style>

        <head>
            <title>HOME</title>
        </head>

        <html>

        <body>
            <div class="container">
                <nav style="display: flex; width: 100%; align-items: center;">

                    <h3 class="bsit"><em>BSIT 2J-G2</em></h3>
                    <h3 class="team" style="margin-left:10px;">
                        DOMANILLO,KENNETH CARL || CAMUA,CALVIN JOHN
                    </h3>

                    <div style="margin-left:auto;">
                        <a href="index.php" class="home">HOME</a>
                        <a href="about.php" class="about">ABOUT</a>
                    </div>

                </nav>
            </div>

            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search by name or course">
                <button class="btn-search" onclick="searchStudents()">SEARCH</button>
            </div>

            <table>
                <h2 class="head">LIST OF DATA</h2>
                <tr>
                    <td class="header-name">ID</td>
                    <td class="header-name">Name</td>
                    <td class="header-name">Course</td>
                </tr>
                <?php
                $xml = new DOMDocument;
                $xml->load('cict.xml');
                $x = $xml->getElementsByTagName('Students')->item(0);
                $fr = $x->getElementsByTagName('student');
                $i = 0;
                $tf = 0;


                foreach ($fr as $stud) {


                    $Id = $stud->getElementsByTagName('id')->item(0)->nodeValue;
                    $Name = $stud->getElementsByTagName('name')->item(0)->nodeValue;
                    $course = $stud->getElementsByTagName('course')->item(0)->nodeValue;

                    ?>
                    <tr>
                        <td class="user-data"><?php echo $Id ?></td>
                        <td class="user-data"><?php echo $Name ?></td>
                        <td class="user-data"><?php echo $course ?></td>
                    </tr>
                    <?php
                } ?>


                <tr>
                    <td colspan="3" style="text-align: center; padding: 20px;">
                        <button onclick="location.href='add.php'" class="btn-add">ADD NEW</button>
                        <button onclick="location.href='delete.php'" class="btn-del">DELETE</button>
                        <button onclick="location.href='update.php'" class="btn-search">UPDATE</button>
                    </td>
                </tr>

            </table>

            <script>
                function searchStudents() {
                    const input = document.getElementById('searchInput').value.toLowerCase();
                    const rows = document.querySelectorAll('table tr');
                    for (let i = 1; i < rows.length - 1; i++) { // skip header and button row
                        const cells = rows[i].querySelectorAll('td');
                        const name = cells[1].textContent.toLowerCase();
                        const course = cells[2].textContent.toLowerCase();
                        if (name.includes(input) || course.includes(input)) {
                            rows[i].style.display = '';
                        } else {
                            rows[i].style.display = 'none';
                        }
                    }
                }
            </script>
        </body>

</html>