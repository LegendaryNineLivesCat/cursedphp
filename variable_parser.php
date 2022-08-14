    function nyaasubstitutor($string){
        
        $debugvar = true;
        
        
        $stringpointer = 0;
        
        $newstring = "";
        
        while($stringpointer < strlen($string)){
            
            
            $workingchar = $string[$stringpointer];
            
            
            if ($workingchar == "{"){
                
                
                //find the endpoint
                $findpointer = $stringpointer + 1;
                $breakloop = false;
                $depth = 0;
                
                $processstring = "";
                
                while(!$breakloop and $findpointer < strlen($string)){
                    
                    $findworkingchar = $string[$findpointer];
                    
                    $processstring = $processstring.$findworkingchar;
                    
                    if ($findworkingchar == "{"){
                        
                        $depth = $depth + 1;
                        
                        
                    }
                    
                    
                    if ($findworkingchar == "}"){
                        
                        if ($depth == 0){
                            
                            $breakloop = true;
                            
                        }
                        
                        $depth = $depth - 1;
                        
                        
                    }
                    
                    if (!$breakloop){
                    $findpointer = $findpointer + 1;
                    }
                    
                
                        
                        
                    }
                
                
                $stringpointer = $findpointer;
                
                //echo $processstring;
                
                
                $substitute = nyaasubstitutor($processstring);
                
                //echo "substituting ".$substitute;
                
                
                $workingchar = nyaavarchecker($substitute);
                
                
                
                
                
            }
            
            
            
            if ($workingchar == "}"){
             
             return $newstring;
             
                
                
            }
            
            
            $newstring = $newstring.$workingchar;
            
            
            $stringpointer = $stringpointer + 1;
        }
        
        
        
        return $newstring;
        
        
        
        
    }
