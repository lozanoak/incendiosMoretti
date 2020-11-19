<?php


class operaciones
{

    public function iTemperatura ($temperatura):float{
        global $indiceTemp; //checar esta variable
        if ($temperatura >=1.0 and $temperatura<=17.9){
            $indiceTemp=12.0;
        }else if ($temperatura>=18.0 && $temperatura<=19.9) {
            $indiceTemp=15.5;
        }else if ($temperatura>=20.0 && $temperatura<=21.9) {
            $indiceTemp=17.5;}
        else if ($temperatura>=22.0 && $temperatura<=23.9) {
            $indiceTemp=20.0;}
        else if ($temperatura>=24.0 && $temperatura<=25.9) {
            $indiceTemp=22.5;}
        else if ($temperatura>=26.0){
            $indiceTemp=25.0;}

        return $indiceTemp;
    }

    public function iHumedad ($humedad):float{
        global $indiceHum;
        if ($humedad>=80.0){
            $indiceHum=2.5;
        }elseif ($humedad<=79.0 && $humedad>=75.0){
            $indiceHum=5.0;
        }elseif ($humedad<=74 && $humedad>=70.0){
            $indiceHum=7.5;
        }elseif ($humedad<=69 && $humedad>=65.0){
            $indiceHum=10.5;
        }elseif ($humedad<=64 && $humedad>=60.0){
            $indiceHum=12.5;
        }elseif ($humedad<=59 && $humedad>=55.0){
            $indiceHum=15.0;
        }elseif ($humedad<=54 && $humedad>=50.0){
            $indiceHum=17.5;
        }elseif ($humedad<=49 && $humedad>=45.0){
            $indiceHum=20.0;
        }elseif ($humedad<=44.0 && $humedad>=40.0){
            $indiceHum=22.5;
        }elseif ($humedad<=39.0){
            $indiceHum=25.0;
        }
        return $indiceHum;
    }

    public function iVelocidad ($velocidad):float{
        global $indiceVel;
        if ($velocidad<3.0){
            $indiceVel=1.5;
        }elseif ($velocidad>=3.0 && $velocidad<=5.9){
            $indiceVel=3.0;
        }elseif ($velocidad>=6.0 && $velocidad<=8.9){
            $indiceVel=4.5;
        }elseif ($velocidad>=9.0 && $velocidad<=11.9){
            $indiceVel=6.0;
        }elseif ($velocidad>=12.0 && $velocidad<=14.9){
            $indiceVel=7.5;
        }elseif ($velocidad>=15.0 && $velocidad<=17.9){
            $indiceVel=9.0;
        }elseif ($velocidad>=18.0 && $velocidad<=20.9){
            $indiceVel=10.5;
        }elseif ($velocidad>=21.0 && $velocidad<=23.9){
            $indiceVel=12.0;
        }elseif ($velocidad>=24.0 && $velocidad<=26.9){
            $indiceVel=13.5;
        }elseif ($velocidad>=27.0){
            $indiceVel=15.0;
        }

        return $indiceVel;
    }

    public function iSequia ($sequia):float{
        global $indiceSeq;
        if ($sequia==0.0){
            $indiceSeq=0.0;
        }else if ($sequia==1.0){
            $indiceSeq=3.5;
        }else if ($sequia>=2 && $sequia<=4){
            $indiceSeq=7.0;
        }else if ($sequia>=5 && $sequia<=7){
            $indiceSeq=10.5;
        }else if ($sequia>=8 && $sequia<=10){
            $indiceSeq=14.0;
        }else if ($sequia>=11 && $sequia<=13){
            $indiceSeq=17.5;
        }else if ($sequia>=14 && $sequia<=16){
            $indiceSeq=21.0;
        }else if ($sequia>=17 && $sequia<=19){
            $indiceSeq=24.5;
        }else if ($sequia>=20 && $sequia<=22){
            $indiceSeq=28.0;
        }else if ($sequia>=23 && $sequia<=25){
            $indiceSeq=31.5;
        }else if ($sequia>=26){
            $indiceSeq=35.0;
        }
        return $indiceSeq;
    }

    public function tIndices ($temperatura, $humedad, $velocidad, $sequia)
    {

        $totalI = $this->iTemperatura($temperatura)+$this->iHumedad($humedad)+$this->iVelocidad($velocidad)+$this->iSequia($sequia);
        return $totalI;
    }

    public function indicePeligrosidad ($indice){
        if ($indice<20){
            $resultado= "BAJO";
        }else if ($indice>=20 && $indice<=40){
            $resultado="MODERADO";
        }else if ($indice>40 && $indice<=60){
            $resultado= "ALTO";
        }else if ($indice>60){
           $resultado= "MUY ALTO";
        }
        return $resultado;

    }

    public function fondo ($variable){
        if ($variable=="BAJO"){
            $fondoc='<body style="background-color:green">';
        }else if ($variable=="MODERADO"){
            $fondoc='<body style="background-color:yellow">';
        }else if ($variable=="ALTO"){
            $fondoc='<body style="background-color:orange">';
        }else if ($variable=="MUY ALTO"){
            $fondoc='<body style="background-color:red">';
        }
        return $fondoc;
    }

}