
        function mathparse($mathstring){        

        $debugvar = false;
        vvv("mathrecursionparser", 0);
        
        
        //bracketeer
        
        $bracketpointer = 0;
        
        $bracketlist = [];
        
        
        
        if ($_SESSION["mathrecursionparser"] == 0){ //add brackets at ground level
        
        
        while ($bracketpointer < strlen($mathstring)){
            
            
            $workingchar = $mathstring[$bracketpointer];
              if ($debugvar){
                 
                 echo "<br>now working on ".$workingchar;   
                    
                }
            if ($workingchar == "*"){
                if ($debugvar){
                 
                 echo "entered multiplication ".$bracketpointer;   
                    
                }
                
                $finderstring = $mathstring;
                
                $leftfinderpointer = $bracketpointer;
                $foundone = 0;
                $depth = 0;
                
                $numberfind = false;
                
                $breakloop = false;
                
                while ($leftfinderpointer >= 0 and !$breakloop){
                    
                    
                    $findworkingchar = $finderstring[$leftfinderpointer];
                     if ($debugvar){
                    
                    echo "in leftfinder: ".$findworkingchar." leftfindpointer: ".$leftfinderpointer;
                     }
                    
                    if (is_numeric($findworkingchar)){
                        
                        $numberfind = true;
                        
                        
                        
                    }else{
                        
                        if ($numberfind){
                            
                            if ($depth == 0){
                                
                                $breakloop = true;
                                
                                
                                
                            }
                            
                        }
                        
                        
                        
                    }
                    
                    
                        if ($findworkingchar == ")"){
                            $depth = $depth + 1;
                            
                        }
                        
                        if ($findworkingchar == "("){
                            $depth = $depth - 1;
                            
                        }
                        
                        
                    
                    if (!$breakloop){
                    
                    $leftfinderpointer = $leftfinderpointer - 1;
                    }
                    
                    
                }
                
                
                
                    $mathstring = stringinsert($mathstring, "(", $leftfinderpointer);
                  if ($debugvar){
                    
                    echo "<br>after leftfind: ".$mathstring."<br>";
                     }
                    
                
                
                $bracketpointer = $bracketpointer + 1;
                
                //now for the other bracket
                
                
                
                
                
                $finderstring = $mathstring;
                
                $rightfinderpointer = $bracketpointer;
                $foundone = 0;
                $depth = 0;
                
                $numberfind = false;
                
                $breakloop = false;
                
                while ($rightfinderpointer < strlen($finderstring) and !$breakloop){
                    
                    
                    $findworkingchar = $finderstring[$rightfinderpointer];
                    
                    if (is_numeric($findworkingchar)){
                        
                        $numberfind = true;
                        
                        
                        
                    }else{
                        
                        if ($numberfind){
                            
                            if ($depth == 0){
                                
                                $mathstring = stringinsert($mathstring, ")", $rightfinderpointer + 1);
                                
                                $breakloop = true;
                                
                                
                                
                            }
                            
                        }
                        
                        
                        
                        
                    }
                    
                    
                        if ($findworkingchar == "("){
                            $depth = $depth + 1;
                            
                        }
                        
                        if ($findworkingchar == ")"){
                            $depth = $depth - 1;
                            
                        }
                        
                    
                    
                    $rightfinderpointer = $rightfinderpointer + 1;
                    
                }
                
                
                if (!$breakloop){
                    
                    $mathstring = stringinsert($mathstring, ")", strlen($mathstring));
                    
                    
                }
                
                  if ($debugvar){
                    
                    echo "<br>after rightfind: ".$mathstring."<br>";
                     }
                //end of right bracket
                
                
                
                
                
                
                
                
                
            }
            
            $bracketpointer = $bracketpointer + 1;
            
            
            
        }
        
        
        
        if ($debugvar){
            echo "<br>end of preprocessing<br>$mathstring<br>";
        }
        
        }
        
        $_SESSION["mathrecursionparser"] = $_SESSION["mathrecursionparser"] + 1;
        
        
        
        
        //
        
        
        
        
        $breakloop = false;
        
        
        $layer = [];
        
        $resultstring = "";
        
        $mathstringpointer = 0;
        
        $currentnumber = 0;
        
        $numbergrabber = "";
        
        $lastoperator = "";
        
        if ($debugvar){
            echo "welcome to mathparse<br>$mathstring<br>";
        }
        
        
        
        while($mathstringpointer < strlen($mathstring) and $breakloop == false){
            $isnumber = true;
            $isoperator = false;
            
            $workingchar = $mathstring[$mathstringpointer];
            if ($debugvar){
                echo "-".$workingchar;
                 }
                 
            if ($workingchar == " "){
             $isnumber = false;
             
                
            }
                
            
            if ($workingchar == "("){
                
                
                
                $isnumber = false;
                
                $remainder = "";
                $remainderpointer = $mathstringpointer + 1;
                while ($remainderpointer < strlen($mathstring)){
                    $remainder = $remainder.$mathstring[$remainderpointer];
                    
                    $remainderpointer = $remainderpointer + 1;
                    
                }
                 if ($debugvar){
                echo "<br>trying to parse ".$remainder;
                 }
                 
                 //sniff out those brackets
                 
                 
                $pointerposition = $mathstringpointer + 1;
                $depth = 0;
                
                $foundclose = false;
                 
                 while (!$foundclose and $pointerposition < strlen($mathstring)){
                     $checkchar = $mathstring[$pointerposition];
                     if ($checkchar =="("){
                         $depth = $depth + 1;
                         
                         
                         
                         
                     }
                     if ($checkchar ==")"){
                         $depth = $depth - 1;
                         
                         if ($depth < 0){
                             
                             $foundclose = true;
                             
                             
                         }
                         
                         
                     }
                     
                     $pointerposition = $pointerposition + 1;
                     
                     
                     
                 }
                 
                 
                 $mathstringpointer = $pointerposition - 1;
                 
                 
                   if ($debugvar){
                echo "<br>mathstringpointer will be ".$mathstringpointer;
                 }
                 
                 
                 
                 
                 
                 
                $substitute = parsemath($remainder);
                
                
                  if ($debugvar){
                echo "<br>remainder is ".$substitute;
                 }
                 
                
                
                $numbergrabber = "$substitute";
                
                
            }
            
            if ($workingchar == "+"){
            
            $currentoperator = "+";
            $isoperator = true;
            
            
            }  
            
            
            if ($workingchar == "-"){
            
            $currentoperator = "-";
            $isoperator = true;
            
            
            } 
            
            
            if ($workingchar == "*"){
            
            $currentoperator = "*";
            $isoperator = true;
            
            
            }  
            
            if ($workingchar == "/"){
            
            $currentoperator = "/";
            $isoperator = true;
            
            
            }  
            
            
            if ($isoperator){
            
            
                
                 
                $isnumber = false;
                
                if ($numbergrabber == ""){
                    
                    $numbergrabber = "0";
                    
                }
                
                if (is_numeric($numbergrabber)){
                    
                $lastnumber = intval($numbergrabber);
                
                }
                
                
                  if ($debugvar){
                echo "<br>operator hit ".$lastoperator." with number ".$lastnumber;
                 }
                 
                 
                
                
                if ($lastoperator == "+"){
                    
                    
                    $currentnumber = $currentnumber + $lastnumber;
                    
                    
                }elseif($lastoperator == "*"){
                    
                    
                    $currentnumber = $currentnumber * $lastnumber;
                    
                    
                }elseif($lastoperator == "-"){
                    
                $currentnumber = $currentnumber - $lastnumber;
                
                
                }elseif($lastoperator == "/"){
                    
                $currentnumber = $currentnumber / $lastnumber;
                
                
                }else{
                    
                    
                    $currentnumber = $lastnumber;
                    
                    
                    
                }
                
                
                
                $lastoperator = $currentoperator;
                
                $numbergrabber = "";
                
                
                }
                
                
            
            
            
            if ($workingchar == ")"){
                
                
                
                
                $breakloop = true;
                
                
                
                 if ($debugvar){
                     echo "<br>returning to base with ".$currentnumber;
                 }
                $isnumber = false;
                
            
            }
            
            
            if ($isnumber){
                
                $numbergrabber = $numbergrabber.$workingchar;
               
            }else{
                
                
                
                
            }
            
            
            
        
                
                
                $mathstringpointer = $mathstringpointer + 1;
                
                    
        }
        
        
        
            if ($debugvar){
            echo "out of while<br>";
        }
        
            if ($debugvar){
            echo "last operator: $lastoperator<br>";
        }
        
        
                $isnumber = false;
                
                if ($numbergrabber == ""){
                    
                    $numbergrabber = "0";
                    
                }
                
                if (is_numeric($numbergrabber)){
                    
                $lastnumber = intval($numbergrabber);
                
                }
                
                if ($lastoperator == "+"){
                    
                    
                    $currentnumber = $currentnumber + $lastnumber;
                    
                    
                }elseif($lastoperator == "*"){
                    
                    
                    $currentnumber = $currentnumber * $lastnumber;
                    
                    
                }elseif($lastoperator == "-"){
                    
                $currentnumber = $currentnumber - $lastnumber;
                
                
                }elseif($lastoperator == "/"){
                    
                $currentnumber = $currentnumber / $lastnumber;
                
                
                }else{
                    
                    
                    $currentnumber = $lastnumber;
                    
                    
                    
                }
                
                
                
                $lastoperator = $currentoperator;
                
                $numbergrabber = "";
                
                $_SESSION["mathrecursionparser"] = $_SESSION["mathrecursionparser"] - 1;
                
        
        return $currentnumber;
        
        
        }
    
