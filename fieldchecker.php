<?php
    function FieldChecker($InputData, $NumbersNotAllowed, $SpaceNotAllowed, $StingSize){
        $InputData = strval($InputData);

        $TempInputData = trim($InputData);
        if($TempInputData == ""){
            return [false, "EMPTY"];
        }


        if($NumbersNotAllowed){
            $Numbers = ["0","1","2","3","4","5","6","7","8","9"];
            foreach($Numbers as $value){
                if(str_contains($InputData, $value)){
                    return [false, "NUMBER"];
                    die();
                }
            }
        }

        if($SpaceNotAllowed){
            if(preg_match("/\s/", $InputData)){
                return [false, "SPACE"];
                die();
            }
        }

        $SpecialChars = ["<",">",",","/","&","é",'"',"'","(",")","§","è","!","ç","à","[","]","^","$","¨","*","€","ù","µ",";",":","=","?",".","~","+","´","%","£","-","_","²","³","@","|","#","{","}","´"];
        foreach($SpecialChars as $value){
            if(str_contains($InputData, $value)){
                return [false, "SPECIALCHAR"];
                die();
            }
        }


        if(!ctype_alnum($InputData)){
            return [false, "CHARACTERS"];
            die();
        }

        if($StingSize < 1){
            return [true];
        }else{
            if(strlen($InputData) > $StingSize){
                return [false, "SIZE"];
            }else{
                return [true];
            }
        }

    }
?>