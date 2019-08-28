<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=reamisDB', 'root', '');
if ($pdo->errorCode()) {
    die($pdo->errorCode() . '_' . $pdo->errorInfo());
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>reamis Main</title>
    <link href="StyleSheet.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>

</head>
<body>


<?php
#regionL_Anzeigen
if ($_POST['auswahl'] == 'Anzeigen') {
    echo("
<h1>REAMIS</h1>
<h2>Liegenschaften</h2>
<table>
  <tr>
    <th>Id</th>
    <th>Verwaltung Id</th>
    <th>Liegenschafft Art</th>
    <th>Ort</th>
    <th>Zimmer</th>
    <th>Fläche</th>
  </tr>
 
");
    $sql = "SELECT * FROM liegenschaften";
    foreach ($pdo->query($sql) as $row) {
        echo("<tr>
                <td>$row[id]</td><td>$row[v_id]</td><td>$row[lg_Art]</td><td>$row[ort]</td><td>$row[zimmer]</td><td>$row[flaeche]</td>
                </tr>"
        );
    }
    echo("</table>");
}
#endregionL_AnzeigenL

#region V_Anzeigen
elseif ($_POST['auswahl'] == 'V_Anzeigen') {
    echo("
<h1>REAMIS</h1>
<h2>Liegenschaften</h2>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Adresse</th>
    <th>Ort</th>
   
  </tr>
 
");
    $sql = "SELECT * FROM Verwaltung";
    foreach ($pdo->query($sql) as $row) {
        echo("<tr>
                <td>$row[id]</td><td>$row[name]</td><td>$row[adresse]</td><td>$row[ort]</td>
                </tr>"
        );
    }
    echo("</table>");
}
#endregion V_verwaltung
#region L_Hinzufügen
elseif ($_POST['auswahl'] == 'Hinzufügen') {
    echo("

<div class=cont>
   <h1>REAMIS</h1>
    <div class=fc>
        <form action=?edit=1 method=POST>
            <fieldset>
                <h2>Liegenschaft Hinzufügen</h2>
                <div class='bls'>
                
                    <label for=id>ID</label>
                    <input type=number name=Id id=id value=''></input>

                    <label for=V_id>V_id</label>
                    <input type=number name=V_id id=V_id value=value=''></input>
                    
                    <label for=Lg_Art>Lg_Art</label>
                    <select name=Lg_Art id=Lg_Art>
                        <option></option>
                        <option value=Hause>Hause</option>
                        <option value=Wohnung>Wohnung</option>
                        <option value=Gewerbe>Gewerbe</option>
                        <option value=Grundstück>Grundstück</option>    
                    </select>
                    
                    <label for=Ort>Ort</label>
                    <input type=text name=Ort id=Ort></input>
                    
                    <label for=Zimmer>Zimmer</label>
                    <input type=number name=Zimmer id=Zimmer value=''></input>
                    
                    <label for=Flaeche>Fläche</label>
                    <input type=number name=Flaeche id=Flaeche value=''></input>

                </div>
                <button type=submit name=Hinzufügen value= 'bbb' >Hinzufügen</button>
                <button type=reset name=Reset value=Zurücksetzen>Zurücksetzen</button>
                
            </fieldset>
        </form>
    </div>
</div>

");
} elseif ($_POST['Hinzufügen'] == 'bbb') {
    $do = true;// zum überprüfen ob die eingaben eingegeben würden
    $id = $_POST['Id'];
    if (strlen($id) <= 0) {
        $do = false;
    }
    $v_id = $_POST['V_id'];
    if (strlen($v_id) <= 0) {
        $do = false;
    } else {
        $do = true;
    }
    $lg_Art = $_POST['Lg_Art'];
    if (strlen($lg_Art) <= 0) {
        $do = false;
    } else {
        $do = true;
    }
    $ort = $_POST['Ort'];
    if (strlen($ort) <= 0) {
        $do = false;
    } else {
        $do = true;
    }

    $zimmer = $_POST['Zimmer'];

    $flaeche = $_POST['Flaeche'];
    if (strlen($flaeche) <= 0) {
        $do = false;
    } else {
        $do = true;
    }

    if ($do == true) {
        $statement = $pdo->prepare("INSERT INTO liegenschaften (id,v_id,lg_Art,ort,zimmer,flaeche) VALUES (?,?,?,?,?,?)");
        $res = $statement->execute(array($id, $v_id, $lg_Art, $ort, $zimmer, $flaeche));
    }
    echo("<h2>Liegenschaften</h2>
                        <table>
                          <tr>
                            <th>Id</th>
                            <th>Verwaltung Id</th>
                            <th>Liegenschafft Art</th>
                            <th>Ort</th>
                            <th>Zimmer</th>
                            <th>Fläche</th>
                          </tr>
                     ");
    $sql = "SELECT * FROM liegenschaften";
    foreach ($pdo->query($sql) as $row) {

        echo("<tr>
                        <td>$row[id]</td><td>$row[v_id]</td><td>$row[lg_Art]</td><td>$row[ort]</td><td>$row[zimmer]</td><td>$row[flaeche]</td>
                     </tr>");
    }
    echo("</table>");
}
#endregion L_Hinzufügen
#region L_Löschen
elseif ($_POST['auswahl'] == 'Löschen') {
    echo("

<div class=cont>
   <h1>REAMIS</h1>
    <div class=fc>
        <form action=?edit=1 method=POST>
            <fieldset>
                <h2>Liegenschaft Löschen</h2>
                <div class='bls'>
                
                    <label for=id>ID</label>
                    <input type=number name=Id id=id value=''></input>

                </div>
                <button type=submit name=loeschen value= 'lo' >Löschen</button>
                <button type=reset name=Reset value=Zurücksetzen>Zurücksetzen</button>
                
            </fieldset>
        </form>
    </div>
</div>

");
} elseif ($_POST['loeschen'] == 'lo') {
    $id = $_POST['Id'];
    $sql = "DELETE FROM liegenschaften WHERE Id = $id";
    $res = $pdo->query($sql);
    if ($res) {


        echo("<h2>Liegenschaften</h2>
                        <table>
                          <tr>
                            <th>Id</th>
                            <th>Verwaltung Id</th>
                            <th>Liegenschafft Art</th>
                            <th>Ort</th>
                            <th>Zimmer</th>
                            <th>Fläche</th>
                          </tr>
                     ");
        $sql = "SELECT * FROM liegenschaften";
        foreach ($pdo->query($sql) as $row) {
            echo("<tr>
                        <td>$row[id]</td><td>$row[v_id]</td><td>$row[lg_Art]</td><td>$row[ort]</td><td>$row[zimmer]</td><td>$row[flaeche]</td>
              </tr>");
        }

    }

}
#endregion l_Lösche
#region L_Ändern
elseif ($_POST['auswahl'] == 'aa') {

    echo("

<div class=cont>
   <h1>REAMIS</h1>
    <div class=fc>
        <form action=?edit=1 method=POST>
            <fieldset>
                <h2>Liegenschaft ändern</h2>
                <div class='bls'>
                
                    <label for=id>ID</label>
                    <input type=number name=Id id=id value=''></input>

                    <label for=V_id>V_id</label>
                    <input type=number name=V_id id=V_id value=value=''></input>
                    
                    <label for=Lg_Art>Lg_Art</label>
                    <select name=Lg_Art id=Lg_Art>
                        <option></option>
                        <option value=Hause>Hause</option>
                        <option value=Wohnung>Wohnung</option>
                        <option value=Gewerbe>Gewerbe</option>
                        <option value=Grundstück>Grundstück</option>    
                    </select>
                    
                    <label for=Ort>Ort</label>
                    <input type=text name=Ort id=Ort></input>
                    
                    <label for=Zimmer>Zimmer</label>
                    <input type=number name=Zimmer id=Zimmer value=''></input>
                    
                    <label for=Flaeche>Fläche</label>
                    <input type=number name=Flaeche id=Flaeche value=''></input>

                </div>
                <button type=submit name=la value= 'ae' >Ändern</button>
                <button type=reset name=Reset value=Zurücksetzen>Zurücksetzen</button>
                
            </fieldset>
        </form>
    </div>
</div>

");

}
elseif ($_POST['la'] == 'ae') {

$query = "UPDATE liegenschaften SET";
$hasUpdate = false;
if (isset($_POST['Id'])) {
    $id = $_POST['Id'];
    $hasUpdate = true;
    $query = $query . " id = '$id',";
}
if (isset($_POST['V_id'])) {
    $v_id = $_POST['V_id'];
    $hasUpdate = true;
    $query = $query . " v_id = '$v_id',";
}
if (isset($_POST['Lg_Art'])) {
    $lg_Art = $_POST['Lg_Art'];
    $hasUpdate = true;
    $query = $query . " lg_Art = '$lg_Art',";
}
if (isset($_POST['Ort'])) {
    $ort = $_POST['Ort'];
    $hasUpdate = true;
    $query = $query . " ort = '$ort',";
}
if (isset($_POST['Zimmer'])) {
    $zimmer = $_POST['Zimmer'];
    $hasUpdate = true;
    $query = $query . " zimmer = '$zimmer',";
}
if (isset($_POST['Flaeche'])) {
    $flaeche = $_POST['Flaeche'];
    $hasUpdate = true;
    $query = $query . " flaeche = '$flaeche',";
}

if ($hasUpdate) {
    $query = substr($query, 0, -1);
}

$query = $query . " WHERE id = '$id' ";


if ($hasUpdate) {
    $pdo->query($query);
}
?>
<h1>REAMIS</h1>
<h2>Liegenschaften</h2>
<table>
    <tr>
        <th>Id</th>
        <th>Verwaltung Id</th>
        <th>Liegenschafft Art</th>
        <th>Ort</th>
        <th>Zimmer</th>
        <th>Fläche</th>
    </tr>
    <?php
    $sql = "SELECT * FROM liegenschaften";
    foreach ($pdo->query($sql) as $row) {
        echo("<tr>
                        <td>$row[id]</td><td>$row[v_id]</td><td>$row[lg_Art]</td><td>$row[ort]</td><td>$row[zimmer]</td><td>$row[flaeche]</td>
                     </tr>");
    }
    echo("</table>");
    }
#endregion L_Ändern
#regionAbfrage
    elseif ($_POST['auswahl'] == 'Abfrage') {
    $sql = ("SELECT Verwaltung.name, Verwaltung.ort, liegenschaften.lg_Art , liegenschaften.ort FROM Verwaltung INNER JOIN liegenschaften ON Verwaltung.id = liegenschaften.v_id");
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $statementrecords = $statement->fetchAll();
    ?>
    <h1>REAMIS</h1>
    <h2>liegenschaften pro Verwaltung</h2>
    <table>
        <tr>
            <th>Verwaltung Name</th>
            <th>Verwaltung Ort</th>
            <th>Liegenschafft Art</th>
            <th>Liegenschaft Ort</th>
        </tr>
        <?php
        foreach ($statementrecords as $row) {
            echo("<tr>
                  <td>$row[name]</td><td>$row[ort]</td><td>$row[lg_Art]</td><td>$row[ort]</td>
             </tr>");
        }
        echo("</table>");

        }
#endregionAbfrage

        ?>

        <button class=ZB onclick="window.location.href= 'auswahl.php'">Zurück</button>
</body>
<footer>
    <p>Copyright reamis ag</p>
</footer>
</html>
</DOCTYPE>
