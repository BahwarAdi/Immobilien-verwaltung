<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang='de'>
<title>Verwaltung</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>

</head>
<div class="cont">
    <h1>Reamis</h1>
    <h2>real estate asset management system</h2>
    <div class="fc">
        <form action="edit.php" method="POST">
            <fieldset>
                <button type="submit" name="auswahl" value="Anzeigen"> Liegenschfften Anzeigen </button>
                <button type="submit" name="auswahl" value="V_Anzeigen"> Verwaltungen Anzeigen </button>
                <button type="submit" name="auswahl" value="Hinzufügen"> Liegenschfften Hinzufügen </button>
                <button type="submit" name="auswahl" value="aa"> Liegenschfften Ändern </button>
                <button type="submit" name="auswahl" value="Löschen">Liegenschfften Löschen </button>
                <button type="submit" name="auswahl" value="Abfrage"> Abfragen erstellen </button>
                <button type=button onclick="window.location.href= 'charttest.php'">Abfrage Mit Chart</button>
                <button type=button onclick="window.location.href= 'Login.php'">Log-out</button>
            </fieldset>
        </form>
    </div>
</div>
<footer>
    <p>Copyright reamis ag</p>
</footer>

</body>

</html>

