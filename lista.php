<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styl.css">
    <title>Lista przyjaciół</title>
</head>
<body>
    <header>
        <h1>Portal Społecznościowy - moje konto</h1>
    </header>

    <main>
        <h2>Moje zainteresowania</h2>
        
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>

        <h2>Moi znajomi</h2>

        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane');

            $query = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1, 2, 6)";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result))
            {
                $code =<<<CODE
                    <div class="photo">
                        <img src="$row[zdjecie]" alt="przyjaciel"/>
                    </div>

                    <div class="desc">
                        <h3>$row[imie] $row[nazwisko]</h3>
                        <p>Ostatni wpis: $row[opis]</p>
                    </div>

                    <div class="line">
                        <hr>
                    </div>
                CODE;

                echo $code;
            }

            mysqli_close($conn);
        ?>
    </main>

    <footer>
        <section id="footer-left">
            Stronę wykonał: Franciszek Pawłowski
        </section>

        <section id="footer-right">
            <a href="mailto:ja@portal.pl">napisz do mnie</a>
        </section>
    </footer>

</body>
</html>