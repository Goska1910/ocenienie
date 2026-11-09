<?php
$uczniowie = array(
    array("imie" => "Adam", "punkty" => 85),
    array("imie" => "Kasia", "punkty" => 92),
    array("imie" => "Marek", "punkty" => 48),
    array("imie" => "Ola", "punkty" => 67),
    array("imie" => "Tomek", "punkty" => 35)
);
 
function obliczprocent($punkty) {
    return $punkty . "%";
}
 
function dajocene($punkty) {
    if ($punkty >= 90) {
        $ocena = 5;
    } else {
        if ($punkty >= 80) {
            $ocena = 4;
        } else {
            if ($punkty >= 60) {
                $ocena = 3;
            } else {
                if ($punkty >= 40) {
                    $ocena = 2;
                } else {
                    $ocena = 1;
                }
            }
        }
    }
    return $ocena;
}
 
function czyzdal($punkty) {
    if ($punkty >= 40) {
        return true;
    } else {
        return false;
    }
}
 
echo "RAPORT WYNIKOW TESTU INFORMATYCZNEGO<br><br>";
 
$zaliczylo = array();
$niezaliczylo = array();
 
foreach ($uczniowie as $uczen) {
    $imie = $uczen["imie"];
    $punkty = $uczen["punkty"];
   
    $ocena = dajocene($punkty);
    $procent = obliczprocent($punkty);
    $zdal = czyzdal($punkty);
   
    if ($zdal == true) {
        $status = "ZALICZONY";
        $zaliczylo[] = $imie;
    } else {
        $status = "NIEZALICZONY";
        $niezaliczylo[] = $imie;
    }
   
    echo "$imie<br>";
    echo "Punkty: $punkty<br>";
    echo "Procent: $procent<br>";
    echo "Ocena: $ocena<br>";
    echo "Status: $status<br><br>";
}
 
$suma = 0;
$liczbauczniow = count($uczniowie);
 
for ($i = 0; $i < $liczbauczniow; $i++) {
    $suma = $suma + $uczniowie[$i]["punkty"];
}
 
$srednia = $suma / $liczbauczniow;
 
if ($srednia < 40) {
    $komentarz = "Bardzo slaby wynik klasy";
} else {
    if ($srednia <= 59) {
        $komentarz = "Wynik klasy jest niezadowalajacy";
    } else {
        if ($srednia <= 79) {
            $komentarz = "Dobry wynik klasy";
        } else {
            $komentarz = "Bardzo dobry wynik klasy";
        }
    }
}
 
 
echo "PODSUMOWANIE KLASY<br><br>";
echo "Liczba uczniow: " . $liczbauczniow . "<br>";
echo "Suma punktow: $suma<br>";
echo "Srednia punktow: $srednia<br><br>";
echo "Zaliczylo: " . count($zaliczylo) . "<br>";
echo "Nie zaliczylo: " . count($niezaliczylo) . "<br>";
echo "Nie zaliczyli: ";
for ($j = 0; $j < count($niezaliczylo); $j++) {
    echo $niezaliczylo[$j];
}
echo "<br><br>";
echo "Komentarz: $komentarz";
?>