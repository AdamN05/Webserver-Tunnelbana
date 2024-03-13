<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunnelbana-upp1</title>
</head>
<body>
<style>
<?php include 'CSS/style.css'; ?>
</style>

<div class="allt">
    <p>Från</p>

    
    <?php
        // array med stationer på linje 19
        $linje19 = ['Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan',
        'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];

        // Skapar en lista för att välja start station
        echo '<select id="fromStation" name="linje19">';
        foreach ($linje19 as $station) {
            echo '<option value="' . $station . '">' . $station . '</option>';
        }
        echo "</select>";
    ?>

    <p>Till</p>

    <?php
        // Skapar en lista för att välja destination
        echo '<select id="toStation" name="linje19">';
        foreach ($linje19 as $station) {
            echo '<option value="' . $station . '">' . $station . '</option>';
        }
        echo "</select>";
    ?>

    <!-- Knapp -->
    <button type="button" onclick="calculate()">Räkna</button>

</div>

    <script>
            function calculate() {
                // Hämtar den valda start stationen och destinationen
                var fromStation = document.getElementById("fromStation").value;
                var toStation = document.getElementById("toStation").value;

                // Hämtar php array med stationerna
                var linje19 = <?php echo json_encode($linje19); ?>;

                // Beräknar restiden baserat på arrayindex för start och destination
                var fromIndex = linje19.indexOf(fromStation);
                var toIndex = linje19.indexOf(toStation);
                var result = (toIndex - fromIndex) * 3; // varje station tar 3 minuter

                // Hämtar nuvarande tid
                var currentTime = new Date();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();

                // Beräknar ankomsttiden
                var arrivalMinutes = minutes + result;

                // fixar så att ankomstminuterna inte kan överskrida 59
                var arrivalHours = hours;
                if (arrivalMinutes > 59) {
                    arrivalHours += Math.floor(arrivalMinutes / 60);
                    arrivalMinutes %= 60;
                }

                // Formaterar ankomsttiden korrekt genom att lägga en 0 om arrival minutes är under 10
                var arrivalTime = arrivalHours + ":" + (arrivalMinutes < 10 ? '0' : " ") + arrivalMinutes;

                // Visar en prompt med restid och ankomsttid
                alert("Det kommer ta " + result + " minuter. Du kommer vara framme kl " + arrivalTime);
            }
    </script>
</body>
</html>