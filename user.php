<?php
class User
{
    private $host = "localhost";
    private $felhasznalonev = "root";
    private $jelszo = "";
    private $abNev = "pizzahot_uj";
    private $kapcsolat;

    //konstuktor
    public function __construct()
    {
        $this->kapcsolat = new mysqli($this->host, $this->felhasznalonev, $this->jelszo, $this->abNev); //létrehozzuk a kapcsolatot egy példányosításon keresztül a paraméterek beállításával
        if ($this->kapcsolat->connect_error) {
            $szoveg = "<p>Hiba: " . $this->kapcsolat->connect_error . "</p>";
        } else {
            $szoveg = "<p>Sikeres kapcsolódás.</p>";
        }

        //ékezetes betűk
        $this->kapcsolat->query("SET NAMES UTF8");
        $this->kapcsolat->query("set character set UTF8");
        echo $szoveg; //itt jelenítjük meg a kapcsolódás sikerét/stelenségét.
    }
    public function lekerdezes($sql)
    {
        return $this->kapcsolat->query($sql);
    }
    public function oszlopMegjelenit($tabla, $oszlop, $oszlop2)
    {
        $sql = "SELECT $oszlop, $oszlop2 FROM $tabla";
        $eredmeny = $this->lekerdezes($sql);

        /* echo $row[$oszlop];
                echo $row[$oszlop2]; */
        $tablazat = "<table><thead><tr><td>NÉV</td><td>DÁTUM</td></tr></thead>";
        $tablazat .= "<tbody>";
        while ($sor = $eredmeny->fetch_assoc()) {
            $tablazat .= "<tr><td>$sor[$oszlop]</td>";
            $tablazat .= "<td>$sor[$oszlop2]</td></tr>";
        }
        $tablazat .= "</tbody></table>";

        echo $tablazat;
    }
}
