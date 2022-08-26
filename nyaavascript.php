<?php

function parsemmm($filedata){
    
    
    $_SESSION["webpagestructure"] = [];
    $_SESSION["webpagestructurepointer"] = 0;
    $_SESSION["nyaavascriptbuffer"] = "";
    
    
    
    
    $_SESSION["webpagewidth"] = 100;
    $_SESSION["webpageheight"] = 50;
    $charpointer = 0;
    $minitag = "close";
    $tagstatus = "close";
    $tagname = "";
    
    $tagdata = "";
    $taglastname = "";
    
    $tagproperties = array(); 
    
    
    $propertystatus = "closed";
    
    $gettagflag = true;
    
    
    $tagno = 0;
    
    
    
    while ($charpointer < strlen($filedata)){
        
        $ignoreadd = false;
        
        $workingchar = $filedata[$charpointer];
        
        if ($workingchar == "+"){ //tag thingy detected
        $ignoreadd = true;
        
        if ($minitag == "close"){
            
            $minitag = "open";
            if ($tagno == 0){
                $taglastname = "";
                 $tagname = "";
                $tagno = 1;
                
                
            }else{
                
                $tagno = 0;
                
            }
            
            
            
           
            
            if ($tagstatus == "close"){
                
                $tagproperties = [];
                
                
                
            }
            
            
            
            
        }else{
            
            $minitag = "close";
            
            
            
            
            closedtag($tagname);
            
            if ($tagstatus == "close"){
                $tagstatus = "open";
                
                
                
                $tagdata = "";
                
                
            }else{
                
                processtag($tagdata);
                
                
          
            
                
                
                $tagstatus = "close";
                
                
                
            }
            
                  
            if ($tagstatus == "close"){
                
                
                processendtag($tagname, $tagdata, $taglastname);
                
                
                
                
            }
            
            
        }
            
            
            
            
            
            
            
        }
        
        
      
      
             
        if ($minitag == "open" and $gettagflag){
            
            
            
            
            
        }
        
        
        
        
        if ($workingchar == "-"){
            $ignoreadd = true;
            
            if ($propertystatus == "open"){
                $propertystatus = "closed";
            
                
                
            }else{
                $propertystatus = "open";
                
                
            }
            
            
            
        }
        
        
        
        
        
        if (!$ignoreadd){
            
            
            
            
            
            if ($minitag == "open"){
                
                
                if ($tagno == 1){
            $tagname = $tagname.$workingchar;
                }else{
                    
                    $taglastname = $taglastname.$workingchar;
                    
                }
            
            }
            
            if ($tagstatus == "open" and $minitag == "close"){
                
                $tagdata = $tagdata.$workingchar;
                
                
                
                
            }
            
            
            
            
        }
        
        
        
        
        
        
        $charpointer = $charpointer + 1;
        
        
    } 
    
    
    
    
    displaymmm($_SESSION["pagedisplay"], $_SESSION["colormap"], $_SESSION["clickmap"],$_SESSION["webpageheight"], $_SESSION["webpagewidth"]);
    
    
    
}










function closedtag($tagname){
    
    //fb("closed tag: ".$tagname);
    
    
    
}


function processtag($tagdata){
    
    //fb("processing ".$tagdata);
    
    
    
}


function processendtag($tagname, $tagdata,$taglastname){
    
    $tagdetails = explode(",",$tagname);
      
    $lastnameargs = explode(",",$taglastname);
        
    //fb("tag:".$tagname);
    
    fb("tagname: ".$tagname." - ".$taglastname);
    
    
    if ($tagdetails[0] == "title"){
        
        fb("site title: ".$tagdata);
        
        if ($tagdetails[1]){
            
            $_SESSION["webpagewidth"] = intval($tagdetails[2]);
            
            
            
        }
        
        if ($tagdetails[2]){
            
            $_SESSION["webpageheight"] = intval($tagdetails[1]);
            
            
            
        }
        
        
        
    $_SESSION["pagedisplay"] = [];
        
    $_SESSION["clickmap"] = [];
    $_SESSION["colormap"] = [];
    
    
    for ($i = 0; $i<$_SESSION["webpageheight"];$i++){
        $_SESSION["pagedisplay"][$i] = [];
        $_SESSION["clickmap"][$j] = [];
        $_SESSION["colormap"][$i] = [];
    
        for ($j = 0; $j<$_SESSION["webpagewidth"];$j++){
            
            
            $_SESSION["pagedisplay"][$i][$j] = " ";
            $_SESSION["clickmap"][$i][$j] = "webclick $i $j";
            
            
            $_SESSION["colormap"][$i][$j] = [];
            $_SESSION["colormap"][$i][$j]["fg"] = "white";
            $_SESSION["colormap"][$i][$j]["bg"] = "black";
        
        
        
        
        }    
        
        
        
        
    }
    
    
    //$_SESSION["clickmap"] = $_SESSION["pagedisplay"];
    
    
    
    
            
        
    }
    
    if ($tagdetails[0] == "box"){
        
        if ($_SESSION["debugmode"] == "yes"){
        fb("drawing box ".$tagname);
        }
        
        
        $GLOBALS["commandinjector"] = "";
        
        
        if (count($lastnameargs)> 1){
            
            
        $GLOBALS["commandinjector"] = $lastnameargs[1];
        
            
        }
        
        drawbox(intval($tagdetails[1]), intval($tagdetails[2]),intval($tagdetails[3]), intval($tagdetails[4]), $tagdata);
        
        
         
        
        
        
    }
    
    
    if ($tagdetails[0] == "label" or $tagdetails[0] == "text"){
        
        
        $GLOBALS["commandinjector"] = "";
        
        
        if (count($lastnameargs)> 1){
            
            
        $GLOBALS["commandinjector"] = $lastnameargs[1];
        
            
        }
        
        
        drawtext(intval($tagdetails[1]), intval($tagdetails[2]), $tagdata);
    }
    
    
    if ($tagdetails[0] == "script"){
        
        if ($_SESSION["loadnyaa"] == true){
        
        $_SESSION["nyaavascriptpointer"] = 1;
        
        
        $scripttype = "normal";
        
        
        if ($lastnameargs[1] == "loop"){
            $scripttype = "loop";
            
        }
        
        
        
        
        loadnyaavascript($tagdata, $scripttype);
        
        if ($tagdetails[1]){
            
            $loadedfile = filegrab($_SESSION["currentwebaddress"], "website", $tagdetails[1]);
            
            
        
            loadnyaavascript($loadedfile, $scripttype);
        
            
        }
        
        
        
        }
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
}


function loadnyaavascript($text, $type){
    
    if ($type == "normal"){
    
    $_SESSION["nyaavascriptbuffer"] = $_SESSION["nyaavascriptbuffer"].":".$text;
    
    }
    
    if ($type == "loop"){
    
    $_SESSION["nyaavascriptloop"] = $_SESSION["nyaavascriptloop"].":".$text;
    
    }
    
    
}




function tagfold($tagname, $tagdata, $taglastname){
    
    $_SESSION["webpagestructure"][$_SESSION["webpagestructurepointer"]] = [];
    $_SESSION["webpagestructure"][$_SESSION["webpagestructurepointer"]]["tagname"] = $tagname;
    $_SESSION["webpagestructure"][$_SESSION["webpagestructurepointer"]]["tagdata"] = $tagdata;
    $_SESSION["webpagestructure"][$_SESSION["webpagestructurepointer"]]["taglastname"] = $taglastname;
    
    $_SESSION["webpagestructurepointer"] = $_SESSION["webpagestructurepointer"] + 1;
    
}


function tagunfold($tagname, $tagdata, $taglastname){
    
    
    return "+$tagname+$tagdata+$taglastname+";
    
    
    
    
}


function saverawmmm($pagedata){
    
    $finalpage = "";
    
    foreach ($pagedata as $element){
        
        $finalpage = $finalpage.tagunfold($element["tagname"],$element["tagdata"], $element["taglastname"] );
        
        
        
        
    }
    
    return $finalpage;
    
    
    
}

function processmmm($structure){
  
    
    
    $_SESSION["webpagewidth"] = 100;
    $_SESSION["webpageheight"] = 50;
    
    foreach ($structure as $element){
        
        
        
        processendtag($element["tagname"], $element["tagdata"],$element["taglastname"]);
        
        
        
    }
    
    
    
}



function drawtext($x, $y, $text){
    fb("in drawtext");
    
    $mastertextpointery = $y;
    $mastertextpointerx = $x;
    
    
    $maxtexty = $_SESSION["webpagewidth"]- 1;
    $maxtextx = $_SESSION["webpageheight"] - 1;
    
    $splitter = explode(" ", $text);
    
    $wordcounter = 0;
    
    foreach ($splitter as $word){
        
        $textpointer = 0;
        
        
        
        if ($mastertextpointery + strlen($word) >= $maxtexty and !($wordcounter == 0)){
            
            $mastertextpointery = 1;
            $mastertextpointerx = $mastertextpointerx + 1;
            
            
            
            
        }
        
        
        while ($textpointer < strlen($word)){
            
            if ($mastertextpointery >= $maxtexty){
                
                $mastertextpointery = 1;
                $mastertextpointerx = $mastertextpointerx + 1;
                
                
                
            }
            
            
                $_SESSION["pagedisplay"][$mastertextpointerx][$mastertextpointery] = $word[$textpointer];
                
                
                if ($GLOBALS["commandinjector"] == ""){}else{
                    $_SESSION["clickmap"][$mastertextpointerx][$mastertextpointery] = $GLOBALS["commandinjector"];
                    
                    
                    
                }
            
            
            $mastertextpointery = $mastertextpointery + 1;
            
            $textpointer = $textpointer + 1;
        }
        
        $_SESSION["pagedisplay"][$mastertextpointerx][$mastertextpointery] = " ";
        
        
                if ($GLOBALS["commandinjector"] == ""){}else{
                    $_SESSION["clickmap"][$mastertextpointerx][$mastertextpointery] = $GLOBALS["commandinjector"];
                    
                    
                    
                }
        
        
        $mastertextpointery = $mastertextpointery + 1;
        
        
        $wordcounter = $wordcounter + 1;
        
        
        
        
    }
    
    
    
    
        
    
    
    
}

function drawbox($x,$y,$height,$width, $text = "", $border = "x"){
    
    
    //fb("box details: ".$x." ".$y." ".$width." ".$height);
     
        
    $mastertextpointerx = $x + 1;
    
    $mastertextpointery = $y + 1;
    
    
    $textx = $x + 1;
    $maxtextx = $x + $height - 1;
    
    $texty = $y + 1;
    $maxtexty = $y + $width - 1;
    
    
    
    
    
    $splitter = explode(" ", $text);
    
    $wordcounter = 0;
    
    foreach ($splitter as $word){
        
        $textpointer = 0;
        
        
        
        if ($mastertextpointery + strlen($word) >= $maxtexty and !($wordcounter == 0)){
            
            $mastertextpointery = $y + 1;
            $mastertextpointerx = $mastertextpointerx + 1;
            
            
            
            
        }
        
        
        while ($textpointer < strlen($word)){
            
            if ($mastertextpointery >= $maxtexty){
                
                $mastertextpointery = $y + 1;
                $mastertextpointerx = $mastertextpointerx + 1;
                
                
                
            }
            
            
                $_SESSION["pagedisplay"][$mastertextpointerx][$mastertextpointery] = $word[$textpointer];
                
                if ($GLOBALS["commandinjector"] == ""){}else{
                    $_SESSION["clickmap"][$mastertextpointerx][$mastertextpointery] = $GLOBALS["commandinjector"];
                    
                    
                    
                }
            
            
            
            $mastertextpointery = $mastertextpointery + 1;
            
            $textpointer = $textpointer + 1;
        }
        
        $_SESSION["pagedisplay"][$mastertextpointerx][$mastertextpointery] = " ";
        
        
                if ($GLOBALS["commandinjector"] == ""){}else{
                    $_SESSION["clickmap"][$mastertextpointerx][$mastertextpointery] = $GLOBALS["commandinjector"];
                    
                    
                    
                }
        
        
        $mastertextpointery = $mastertextpointery + 1;
        
        
        $wordcounter = $wordcounter + 1;
        
        
        
        
    }
    
    
    
    
        
        
        
        
    for ($i = 0; $i < $height; $i++){
        
    
    for ($j = 0; $j < $width; $j++){
        if ($i == 0 or $i == $height - 1){
            
            $_SESSION["pagedisplay"][$i + $x][$j + $y] = $border;
            
            
        
        
        
        }
        
        if ($j == 0 or $j == $width - 1){
            
            $_SESSION["pagedisplay"][$i + $x][$j + $y] = $border;
            
            
        
        
        
        }
    
    
    
    
    
    }       
        
        
        
        
    }
        
        
        
    }
    
    
    




function displaymmm($display, $colormap, $clickmap, $height, $width){
    fb("in displayer");
    
    $displaystring = "";
    
    for ($i = 0; $i<$height;$i++){

    
        for ($j = 0; $j<$width;$j++){
            
            
            $fgcolor = $colormap[$i][$j]["fg"];
            $bgcolor = $colormap[$i][$j]["bg"];
            
            if ($display[$i][$j] == " "){
                
                $displaychar = "&nbsp;";
                
            }else{
                
                $displaychar = $display[$i][$j];
                
                
            }
            
            $clickchar = $clickmap[$i][$j];
            
            
            $displaystring = $displaystring."<span style = \"background-color: $bgcolor;color: $fgcolor\" onclick = \"beam(`$clickchar`)\">".$displaychar."</span>";
            
            
        
        
        
        
        
        
        }    
        
        fb($displaystring, false);
        $displaystring = "";
        
        
        
    }
    
    
            
        
    }
    
    

function loadrawmmm($filedata){
    
    
    $_SESSION["webpagestructure"] = [];
    $_SESSION["webpagestructurepointer"] = 0;
     $_SESSION["nyaavascriptbuffer"] = "";
     $_SESSION["nyaavascriptloop"] = "";
     $_SESSION["loadnyaa"] = true;
    
    
    $charpointer = 0;
    $minitag = "close";
    $tagstatus = "close";
    $tagname = "";
    
    $tagdata = "";
    $taglastname = "";
    
    $tagproperties = array();
    
    
    $propertystatus = "closed";
    
    $gettagflag = true;
    
    
    $tagno = 0;
    
    
    
    while ($charpointer < strlen($filedata)){
        
        $ignoreadd = false;
        
        $workingchar = $filedata[$charpointer];
        
        if ($workingchar == "+"){ //tag thingy detected
        $ignoreadd = true;
        
        if ($minitag == "close"){
            
            $minitag = "open";
            if ($tagno == 0){
                $taglastname = "";
                 $tagname = "";
                $tagno = 1;
                
                
            }else{
                
                $tagno = 0;
                
            }
            
            
            
           
            
            if ($tagstatus == "close"){
                
                $tagproperties = [];
                
                
                
            }
            
            
            
            
        }else{
            
            $minitag = "close";
            
            
            
            
            closedtag($tagname);
            
            if ($tagstatus == "close"){
                $tagstatus = "open";
                
                
                
                $tagdata = "";
                
                
            }else{
                
                processtag($tagdata);
                
                
          
            
                
                
                $tagstatus = "close";
                
                
                
            }
            
                  
            if ($tagstatus == "close"){
                
                fb("folding: tagfold($tagname, $tagdata, $taglastname);");
                tagfold($tagname, $tagdata, $taglastname);
                
                
                
                
            }
            
            
        }
            
            
            
            
            
            
            
        }
        
        
      
      
             
        if ($minitag == "open" and $gettagflag){
            
            
            
            
            
        }
        
        
        
        
        if ($workingchar == "-"){
            $ignoreadd = true;
            
            if ($propertystatus == "open"){
                $propertystatus = "closed";
            
                
                
            }else{
                $propertystatus = "open";
                
                
            }
            
            
            
        }
        
        
        
        
        
        if (!$ignoreadd){
            
            
            
            
            
            if ($minitag == "open"){
                
                
                if ($tagno == 1){
            $tagname = $tagname.$workingchar;
                }else{
                    
                    $taglastname = $taglastname.$workingchar;
                    
                }
            
            }
            
            if ($tagstatus == "open" and $minitag == "close"){
                
                $tagdata = $tagdata.$workingchar;
                
                
                
                
            }
            
            
            
            
        }
        
        
        
        
        
        
        $charpointer = $charpointer + 1;
        
        
    } 
    
    //$_SESSION["loadnyaa"] = false;
    
}  
    
    
    //nyaavascript functionality
    
    function nyaajump(){
        
          
    $_SESSION["nyaa"]["ifdepth"] = 0;
    $_SESSION["nyaa"]["ifdepthghost"] = 0;
    
   
     //$_SESSION["nyaa"]["programvars"] = array();
     $_SESSION["nyaa"]["ifside"] = [];
     $_SESSION["nyaa"]["ifpile"] = [];
     $_SESSION["nyaa"]["ifpile"][] = true;
     $_SESSION["nyaa"]["ifside"][] = true;
     
     
      $_SESSION["nyaa"]["forpile"] = [];
      
      
      $_SESSION["nyaa"]["fordepth"] = 0;
      $_SESSION["nyaa"]["forpile"][] = [];
      $_SESSION["nyaa"]["forpile"][0]["line"] = 0;
      $_SESSION["nyaa"]["forpile"][0]["iterator"] = 0;
      $_SESSION["nyaa"]["forpile"][0]["reach"] = 0;
      $_SESSION["nyaa"]["forpile"][0]["count"] = 0;
      
        
        $_SESSION["nyaa"]["whilepile"] = [];
      
      
      $_SESSION["nyaa"]["whiledepth"] = 0;
      $_SESSION["nyaa"]["whilepile"][] = [];
      $_SESSION["nyaa"]["whilepile"][0]["line"] = 0;
      
      
        
        
        
    }
    
    
    function initnyaavascript($startupvar = false){
        
        
        
        if ($startupvar){
           $_SESSION["nyaavascripthalted"] = false;
           
            
      $_SESSION["nyaa"] = [];
      
      
      $_SESSION["nyaa"]["variables"] = [];
      
            
        $_SESSION["nyaavascriptglobalvariables"] = [];
        $_SESSION["nyaarunning"] == false;
        
        
        }
    
    
     $_SESSION["nyaa"]["omencounter"] = 0;
    $_SESSION["nyaa"]["possessioncounter"] = 0;
    $_SESSION["nyaa"]["possessionlevel"] = 0;
    
        $_SESSION["nyaa"]["displaybuffer"] = [];
      $_SESSION["nyaa"]["waittimer"] = 0;
      
    $_SESSION["nyaa"]["ifdepth"] = 0;
    $_SESSION["nyaa"]["ifdepthghost"] = 0;
    
   
     $_SESSION["nyaa"]["programvars"] = array();
     $_SESSION["nyaa"]["ifside"] = [];
     $_SESSION["nyaa"]["ifpile"] = [];
     $_SESSION["nyaa"]["ifpile"][] = true;
     $_SESSION["nyaa"]["ifside"][] = true;
     
     
      $_SESSION["nyaa"]["forpile"] = [];
      
      
      $_SESSION["nyaa"]["fordepth"] = 0;
      $_SESSION["nyaa"]["forpile"][] = [];
      $_SESSION["nyaa"]["forpile"][0]["line"] = 0;
      $_SESSION["nyaa"]["forpile"][0]["iterator"] = 0;
      $_SESSION["nyaa"]["forpile"][0]["reach"] = 0;
      $_SESSION["nyaa"]["forpile"][0]["count"] = 0;
      
        
        $_SESSION["nyaa"]["whilepile"] = [];
      
      
      $_SESSION["nyaa"]["whiledepth"] = 0;
      $_SESSION["nyaa"]["whilepile"][] = [];
      $_SESSION["nyaa"]["whilepile"][0]["line"] = 0;
      
        $_SESSION["nyaa"]["inputlock"] = false;
     $_SESSION["nyaa"]["input"] = "";
      $_SESSION["nyaa"]["inputslot"] = "";
        
        
        $_SESSION["nyaa"]["functionlayer"] = [];
        
        $_SESSION["nyaa"]["functiondepth"] = 0;
        
        $_SESSION["nyaa"]["functionlayer"][0]["variables"] = [];
        
        
        
    }
    
    
    function nyaavarchecker($thingy){
        
        $returnvar = $thingy;
        
        
        
        if (isset($_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["localvariables"][$returnvar])){
            
            $returnvar = $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["localvariables"][$returnvar];
            
            
        }else{
        
        
        if (isset($_SESSION["nyaa"]["variables"][$returnvar])){
            
            $returnvar = $_SESSION["nyaa"]["variables"][$returnvar];
            
            
            
        }else{
            
            $returnvar = "undefined";
            
        }
        
        
        
        
        }
        
        return "$returnvar";
    }
    
    
    function logiccheck($var1, $var2, $operator){
        
        //echo "in logiccheck: ".$var1." and $var2 incoming<br><br>";
        $mathresult1 = parsemath($var1);
        
        $mathresult2 = parsemath($var2);
        
        //echo "<br>mathresult: ".$mathresult1." and ".$mathresult2;
        
        $result1 = stripstring("$mathresult1"," ");
        
        $result2 = stripstring("$mathresult2", " ");
        //echo "in logiccheck ".$result1." vs ".$result2." with operator ".$operator;
        
        
        
        if ($operator == "="){
            
            if ($result1 == $result2){
                
                return "true";
                
                
            }else{
                
                return "false";
                
            }
            
            
            
        }
        
        
        
        
    }
    
    
    
    
    function nyaalogicparser($logicstring){
        
        $logicstring = nyaasubstitutor($logicstring);
        
        
        $logicstring = $logicstring."@";
        
        $debugvar = true;
        
        $logicpointer = 0;
        
        $substitutestring = "";
        
        $argside = "left";
        
        $firstarg = "";
        $secondarg = "";
        
        
        $breakloop = false;
        
        $firstarg = "";
        $secondarg = "";
        
        $totalresult = "";
        
        while ($logicpointer < strlen($logicstring) and !$breakloop){
            
            $workingchar = $logicstring[$logicpointer];
            $canadd = true;
            $isoperator = false;
            
            //echo $workingchar." ";
            
            if ($workingchar == "="){
                $canadd = false;
                
                $operator = "=";
                $argside = "right";
                
                
            }
            
            
            if ($workingchar == "["){
                
                $canadd = false;
                
                //into the mines we go
                
                  
                $pointerposition = $logicpointer + 1;
                $depth = 0;
                
                $foundclose = false;
                 
                 while (!$foundclose and $pointerposition < strlen($logicstring)){
                     $checkchar = $logicstring[$logicpointer];
                     if ($checkchar =="["){
                         $depth = $depth + 1;
                         
                         
                         
                         
                     }
                     if ($checkchar =="]"){
                         $depth = $depth - 1;
                         
                         if ($depth < 0){
                             
                             $foundclose = true;
                             
                             
                         }
                         
                         
                     }
                     
                     $pointerposition = $pointerposition + 1;
                     
                     
                     
                 }
                 
                 
                 $logicpointer = $pointerposition - 1;
                 
                 
                   if ($debugvar){
                echo "<br>mathstringpointer will be ".$logicpointer;
                 }
                 
                 
                 
                 
                 
                 
                $substitute = nyaalogicparser($remainder);
                
                
                  if ($debugvar){
                echo "<br>remainder is ".$substitute;
                 }
                 
                
                
                $lastnumber = "$substitute";
                
                
                
                
                
                
                
                
                
                
                
                
                
            }
            
            
            
            
            if ($workingchar == "]"){
                
                $breakloop = true;
                
                
            }
            
            if ($workingchar == "A"){
                if ($logicstring[$logicpointer+1] == "N" and $logicstring[$logicpointer+2] == "D"){
                    //$substitutestring = $substitutestring.logiccheck($firstarg, $secondarg, $operator);
                    $canadd = false;
                    $logicpointer = $logicpointer + 2;
                    $argside = "left";
                    
                    
                    $currentoperator = "and";
                    $isoperator = true;
                    
                   
                    
                }
                
                
            }
            
             
            if ($workingchar == "N"){
                if ($logicstring[$logicpointer+1] == "O" and $logicstring[$logicpointer+2] == "T"){
                    //$substitutestring = $substitutestring.logiccheck($firstarg, $secondarg, $operator);
                    $canadd = false;
                    $logicpointer = $logicpointer + 2;
                    $argside = "left";
                    
                    if ($invertor){
                    $invertor = false;
                    }else{
                        $invertor = true;
                    }
                    
                    $currentoperator = "and";
                    $isoperator = true;
                    
                   
                    
                }
                
                
            }
            
            
            
            
            
            if ($workingchar == "O"){
                if ($logicstring[$logicpointer+1] == "R"){
                    //$substitutestring = $substitutestring.logiccheck($firstarg, $secondarg, $operator);
                    $canadd = false;
                    $logicpointer = $logicpointer + 1;
                    $argside = "left";
                    
                    
                    $currentoperator = "or";
                    $isoperator = true;
                    
                   
                    
                }
                
                
            }
            
            
            
            
            if ($workingchar == "@" or $workingchar == "]"){
                $canadd = false;
                
                $isoperator = true;
                $currentoperator = "";
                $breakloop = true;
                //echo "end of string";
                
                
            }
            
            
            
            
            if ($isoperator){
                
                    $lastnumber = logiccheck($firstarg, $secondarg, $operator);
                    
                    
                    if ($invertor){
                        $invertor = false;
                        if ($lastnumber == "true"){
                            $lastnumber = "false";
                        }else{
                            $lastnumber = "true";
                        }
                    }
                    
                    //echo "<br>last number after check: ".$lastnumber;
                    
                      
                    $argside = "left";
                    
                    $firstarg = "";
                    $secondarg = "";   
                    
                    
                if ($lastoperator == "and"){
                    
                    if ($lastnumber == "true" and $totalresult == "true"){
                        
                        $totalresult = "true";
                        
                    }else{
                        
                        $totalresult = "false";
                        
                        
                    }
                    
                    
                    
                }elseif($lastoperator == "or"){
                    
                    if ($lastnumber == "true" or $totalresult == "true"){
                        
                        $totalresult = "true";
                    
                    }else{
                        
                        $totalresult = "false";
                        
                    }
                    
                    
                }else{
                    
                    $totalresult = $lastnumber;
                    
                    
                    
                    
                }
                
                
                $lastoperator = $currentoperator;
                
                
                
            }
            
            
            
            if ($canadd){
                
                if ($argside == "left"){
                    
                    $firstarg = $firstarg.$workingchar;
                    
                    
                    
                }else{
                    $secondarg = $secondarg.$workingchar;
                    
                    
                    
                }
                
                
                
                
            }
            
            $logicpointer = $logicpointer + 1;
            
            
            
        }
        
        
        return $totalresult;
        
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    function parsemath($mathstring){
        
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
            
            //divider
            
             if ($workingchar == "/"){
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
            
            if ($workingchar == "."){
            
            if ($mathstring[$mathstringpointer + 1] == "."){
            $currentoperator = "..";
            $isoperator = true;
            
                $mathstringpointer = $mathstringpointer + 1;
                
            }
            
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
                 
                 
                
                if ($lastoperator == ".."){
                    
                    
                    $currentnumber = $currentnumber.$lastnumber;
                    
                
                }elseif($lastoperator == "+"){
                    
                    
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
    
  
    
    
    function processnyaatext($text){
        
        //fb("in processnyaa: ".$text);
        
        //$text = preg_replace_callback("/\{()\}/", "applechecker", $text);
        
        
        
        $textpointer = 0;
        $collector = "";
        $gate = false;
        $canrecord = true;
        $newtext = "";
        
        
        
        while ($textpointer < strlen($text)){
            
            $canrecord = true;
            $workingchar = $text[$textpointer];
            
            if ($workingchar == "{"){
                
                $gate = true;
                $collector = "";
                $canrecord = false;    
            }
            
            if ($workingchar == "}"){
                
                $gate = false;
                $processcollector = nyaavarchecker($collector);
                
                $newtext = $newtext.$processcollector;
                
                $canrecord = false;    
            }
            
            
            if ($canrecord){
            
            if ($gate){
                $collector = $collector.$workingchar;
                
                
            }else{
                $newtext = $newtext.$workingchar;
                
                
            }
            
            }
            
            $textpointer = $textpointer + 1;
            
        }
        
        $text = $newtext;
        
        $parsetext = explode(" ", $text);
        
        
        $newstext = [];
        
        $counter = 0;
        
        
        foreach ($parsetext as $thing){
            
            
            
            
            if ($thing[0] == "_"){
                
                $replacer = substr($thing, 1);
                //fb("replacer = ".$replacer);
                
                
                if (isset($_SESSION["nyaa"]["variables"][$replacer])){
                    
                    $newstext[] = $_SESSION["nyaa"]["variables"][$replacer];
                    
                }
                
                
                
            }else{
                
                $newstext[] = $thing;
                
                
                
            }
            
            
            
            
            
        }
        
        $returnstring = implode(" ", $newstext);
        return $returnstring;
        
        
        
        
    }
    
    
    
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
function nyaavarconvert($name){
    
    
    
    if (isset($_SESSION["nyaa"]["variables"][$name])){
    
    if (is_numeric($_SESSION["nyaa"]["variables"][$name])){
        
        return floatval($_SESSION["nyaa"]["variables"][$name]);
        
        
        
        
    }else{
        
        return $_SESSION["nyaa"]["variables"][$name];
        
        
        
    }
    
    }else{
        
        
    if (is_numeric($name)){
        
        return floatval($name);
        
        
        
        
    }else{
        
        return $name;
        
        
        
    }
        
        
        
    }
    
    
    
}




function nyaastatementanalyser($statement){
    
    
    $statementstring = explode(" ", $statement);
    
    $pointer = 0;
    $tokenlist = [];
    
    $tokenpointer = 0;
    $tokencounter = 0;
    $sidebuffer = "";
    $tokenlayer = [];
    $tokenlayerpointer = 0;
    
            $tokenside = "firstarg";
            
    
    
    while ($pointer < count($statementstring)){
        
        $addlock = true;
            
        $workingcommand = $statementstring[$pointer];
        
        if ($workingcommand == "="){
            
            $operatorbuffer = "equal";
            
            
            $firstargument = processnyaatext($sidebuffer);
            
            $sidebuffer = "";
            
            $tokenside = "secondarg";
            $addlock = false;
            
            
        }
        
        
        if ($workingcommand[strlen($workingcommand) - 1] == ")"){
            
            
               
            
            //fb($firstargument." ".$operatorbuffer." ".$secondargument);
            
            
            
        }        
        
        if ($addlock){
            
            $sidebuffer = $sidebuffer." ".$workingcommand;
            
            
            
            
            
        }
        
        
        
        
        $pointer = $pointer + 1;
        
    }
    
    
    
    
            $sidebuffer = $sidebuffer." ".substr($workingcommand, 0, -1);
            
            
            $secondargument = processnyaatext($sidebuffer);
            
            $tokenside = "firstarg";
            
            $addlock = false;
            
            $tokenlist[$tokenpointer] = [];
            $tokenlist[$tokenpointer]["firstargument"] = $firstargument;
            $tokenlist[$tokenpointer]["operator"] = $operatorbuffer;
            $tokenlist[$tokenpointer]["secondargument"] = $secondargument;
            $tokenpointer = $tokenpointer + 1;
            
         
         
         
        foreach ($tokenlist as $thing){
            
            $result = false;
            
            $firstval = eval("return ".$thing["firstargument"].";");
            $secondval = eval("return ".$thing["secondargument"].";");
            
            fb($firstval." vs ".$secondval);
            
            if ($thing["operator"] == "equal"){
                
                if ($firstval==$secondval){
                    //fb("in true");
                    
                    $result = true;
                    
                    
                }
                
                
            }

            
            if ($thing["operator"] == "smaller"){
                
                if ($firstval <$secondval){
                    
                    $result = "true";
                    
                    
                }
                
                
            }
            
            
            if ($thing["operator"] == "not"){
                
                if ($firstval >$secondval){
                    
                    $result = true;
                    
                    
                }
                
                
            }
            
            
            if ($thing["operator"] == "greater"){
                
                if ($firstval >$secondval){
                    
                    $result = true;
                    
                    
                }
                
                
            }
            
            
            
            
            
            
        }
        
    return $result;
    
    
}

    function runnyaavascript($data){
        
        $_SESSION["runningnyaavascriptprogram"] = explode(":", $data);
        
        
        if ($_SESSION["nyaavascripthalted"] == false){
        $_SESSION["nyaavascriptpointer"] = 0;
        
        }
        $protectionreaper = 0;
        
        
        
    
        if ($_SESSION["nyaavascripthalted"] == false){
            initnyaavascript();
            $_SESSION["nyaarunning"] = true;
            
        }
    
    
    $_SESSION["nyaa"]["waittimer"] = $_SESSION["nyaa"]["waittimer"] - 1;
    
    
    
    while ($_SESSION["nyaavascriptpointer"] < count($_SESSION["runningnyaavascriptprogram"]) and $protectionreaper < 10000 and $_SESSION["nyaa"]["inputlock"] == false and $_SESSION["nyaa"]["waittimer"] <= 0){
    
    
    
    $currentcommand = $_SESSION["runningnyaavascriptprogram"][$_SESSION["nyaavascriptpointer"]];
    
    //fb("commmand: ".$currentcommand);
    
    
    $codestring = explode(" ", $currentcommand);
    
    $codestring = wavesplode($codestring);
    
    
    
    //if logics
    
    
    if ($codestring[0] == "stringcompare"){
        
        $firstpart = nyaasubstitutor($codestring[1]);
        $secondpart = nyaasubstitutor($codestring[2]);
        
        fb($firstpart." compared to ".$secondpart);
        
        
        
        if ($firstpart == $secondpart){
            
            $result = true;
            
        }else{
            $result = false;
            
        }
        
               
    if ($_SESSION["nyaa"]["ifdepth"] == $_SESSION["nyaa"]["ifdepthghost"] and $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] == $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]]){
           //fb("inside compare"); 
       
        //fb($firstvar." - ".$secondvar);
        
        
        if ($result == true){
            fb("trueblock of if");
            $_SESSION["nyaa"]["ifdepth"] = $_SESSION["nyaa"]["ifdepth"] + 1;
            $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] = true;
            $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]] = true;
            
            
            
        }else{
            
            fb("falseblock of if");
            
            $_SESSION["nyaa"]["ifdepth"] = $_SESSION["nyaa"]["ifdepth"] + 1;
            $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] = false;
            $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]] = true;
            
            
        }
        
        
        
    }
        
        $_SESSION["nyaa"]["ifdepthghost"] = $_SESSION["nyaa"]["ifdepthghost"] + 1;
        
        
        
        
    }
    
    
    
    if ($codestring[0] == "if"){
        
        $workarray = $codestring;
        array_shift($workarray);
        
        $statement = implode(" ",$workarray);
        
        $result = nyaalogicparser($statement);
        
            
        //    fb("result came back true ".$result);
       
       if ($result === "true"){
           $result = true;
       }
       if ($result === "false"){
           $result = false;
       }
        
          
    if ($_SESSION["nyaa"]["ifdepth"] == $_SESSION["nyaa"]["ifdepthghost"] and $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] == $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]]){
           //fb("inside compare"); 
       
        //fb($firstvar." - ".$secondvar);
        
        
        if ($result == true){
            fb("trueblock of if");
            $_SESSION["nyaa"]["ifdepth"] = $_SESSION["nyaa"]["ifdepth"] + 1;
            $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] = true;
            $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]] = true;
            
            
            
        }else{
            
            fb("falseblock of if");
            
            $_SESSION["nyaa"]["ifdepth"] = $_SESSION["nyaa"]["ifdepth"] + 1;
            $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] = false;
            $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]] = true;
            
            
        }
        
        
        
    }
        
        $_SESSION["nyaa"]["ifdepthghost"] = $_SESSION["nyaa"]["ifdepthghost"] + 1;
        
      
        
        
    }
    
    
    if ($codestring[0] == "compare"){
        
        
    if ($_SESSION["nyaa"]["ifdepth"] == $_SESSION["nyaa"]["ifdepthghost"] and $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] == $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]]){
           //fb("inside compare"); 
        
        if (is_numeric($codestring[1])){
            
            
            $firstvar = intval($codestring[1]);
    
        
            
        }else{
            
            $codestring[1] = processnyaatext($codestring[1]);
            
            $firstvar = intval($_SESSION["nyaa"]["variables"][$codestring[1]]);
            
            
        }
        
        
        if (is_numeric($codestring[2])){
            
            
            $secondvar = intval($codestring[2]);
    
        
            
        }else{
            
            $codestring[2] = processnyaatext($codestring[2]);
            
            $secondvar = intval($_SESSION["nyaa"]["variables"][$codestring[2]]);
            
            
        }
        
        //fb($firstvar." - ".$secondvar);
        
        
        if ($firstvar == $secondvar){
            
            $_SESSION["nyaa"]["ifdepth"] = $_SESSION["nyaa"]["ifdepth"] + 1;
            $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] = true;
            $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]] = true;
            
            
            
        }else{
            $_SESSION["nyaa"]["ifdepth"] = $_SESSION["nyaa"]["ifdepth"] + 1;
            $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] = false;
            $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]] = true;
            
            
        }
        
        
        
    }
        
        $_SESSION["nyaa"]["ifdepthghost"] = $_SESSION["nyaa"]["ifdepthghost"] + 1;
        
        
        
    }
    
    
    
    if ($codestring[0] == "endif"){
        
        //fb("inside endif");
        
        if ($_SESSION["nyaa"]["ifdepth"] == $_SESSION["nyaa"]["ifdepthghost"]){
            
            
        $_SESSION["nyaa"]["ifdepth"] = $_SESSION["nyaa"]["ifdepth"] - 1;
        
        
        }
        
        $_SESSION["nyaa"]["ifdepthghost"] = $_SESSION["nyaa"]["ifdepthghost"] - 1;
    
    }
    
    if ($codestring[0] == "else"){
        
        //fb("inside endif");
        
        if ($_SESSION["nyaa"]["ifdepth"] == $_SESSION["nyaa"]["ifdepthghost"]){
            
            
        $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]] = false;
        
        
        }
        
        
    }
    
    
    
    
    
    
    
    if ($_SESSION["nyaa"]["ifdepth"] == $_SESSION["nyaa"]["ifdepthghost"] and $_SESSION["nyaa"]["ifpile"][$_SESSION["nyaa"]["ifdepth"]] == $_SESSION["nyaa"]["ifside"][$_SESSION["nyaa"]["ifdepth"]]){ ///assuming correct depth
        
        
        
        
        
        
        if ($codestring[0] == "input"){
            $_SESSION["nyaa"]["inputslot"] = $codestring[1];
            
            $_SESSION["nyaa"]["inputlock"] = true;
            $workarray = $codestring;
        
            array_shift($workarray);
            array_shift($workarray);
            
            
             $displaystring = implode(" ", $workarray);
        
            $displaystring = processnyaatext($displaystring);
        
        
        
            $_SESSION["nyaa"]["displaybuffer"][] = $displaystring;
            
        
        
            
            
        }
        
        
         
        if ($codestring[0]=="for"){
            
            $_SESSION["nyaa"]["fordepth"] = $_SESSION["nyaa"]["fordepth"] + 1;
            $max = varconvert($codestring[2]);
            
            $min = varconvert($codestring[1]);
            
            $step = varconvert($codestring[3]);
            
            
            
             $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["line"] = $_SESSION["nyaavascriptpointer"];
             
             
             
      $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["iterator"] = $min;
      $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["reach"] = $max;
      $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["count"] = $step;
      
            
            
            
        }
        
            
        if ($codestring[0]=="next"){
            
            $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["iterator"] = $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["iterator"] + $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["count"];
            
            if ($_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["iterator"] < $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["reach"]){
                
                $_SESSION["nyaavascriptpointer"] = $_SESSION["nyaa"]["forpile"][$_SESSION["nyaa"]["fordepth"]]["line"];
                
            }else{
                
                $_SESSION["nyaa"]["fordepth"] = $_SESSION["nyaa"]["fordepth"] - 1;
                
                
                
                
            }
            
            
            
            
        }
        
        
        
        
    if ($codestring[0] == "gosub"){
        
         
    $temppointer = 0;
    $foundone = false;
    $jumppoint = $_SESSION["nyaavascriptpointer"];
    $foundone = false;
    
    while (!$foundone and $temppointer < count($_SESSION["runningnyaavascriptprogram"])){
        $check = $_SESSION["runningnyaavascriptprogram"][$temppointer];
        $checksplit = explode(" ", $check);
        
        
        //$_SESSION["nyaa"]["displaybuffer"][] = "processing ".$check;
        
        if ($checksplit[0] == "function"){
            
            if ($checksplit[1] == $codestring[1]){
                
                $_SESSION["nyaa"]["displaybuffer"][] = "next command in function: ".$_SESSION["runningnyaavascriptprogram"][$temppointer + 1]." prepointer ".$_SESSION["nyaavascriptpointer"];
                $foundone = true;
                $jumppoint = $temppointer;
                
                
            }
            
        }
        
        $temppointer = $temppointer + 1;
        
    }
    
    
    if ($foundone){
        $_SESSION["nyaa"]["displaybuffer"][] = "in function $jumppoint";
        
        $_SESSION["nyaa"]["functiondepth"] = $_SESSION["nyaa"]["functiondepth"] + 1;
        
        
        $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]] = [];
        $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["ifdepth"] = $_SESSION["nyaa"]["ifdepth"];
        $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["ifdepthghost"] = $_SESSION["nyaa"]["ifdepthghost"];
        $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["whiledepth"] = $_SESSION["nyaa"]["whiledepth"];
        $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["fordepth"] = $_SESSION["nyaa"]["fordepth"];
        $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["positionpointer"] = $_SESSION["nyaavascriptpointer"];
        $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["localvariables"] = [];
        
        
        
        
        $_SESSION["nyaavascriptpointer"] = $jumppoint;
        $_SESSION["nyaa"]["displaybuffer"][] = "current pointer: ".$_SESSION["nyaavascriptpointer"]." pointing to ".$_SESSION["runningnyaavascriptprogram"][$_SESSION["nyaavascriptpointer"]];
        
        
    }else{
        
        $_SESSION["nyaa"]["displaybuffer"][] = "function not found";
        
        
        
        
    }
    
        
        
        
        
    }    
        
    if ($codestring[0] == "endfunction"){
        
        $_SESSION["nyaa"]["ifdepth"] = $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["ifdepth"];
        $_SESSION["nyaa"]["ifdepthghost"] = $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["ifdepthghost"];
        $_SESSION["nyaa"]["whiledepth"] = $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["whiledepth"];
        $_SESSION["nyaa"]["fordepth"] = $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["fordepth"];
        $_SESSION["nyaavascriptpointer"] = $_SESSION["nyaa"]["functionlayer"][$_SESSION["nyaa"]["functiondepth"]]["positionpointer"];
        
        
        $_SESSION["nyaa"]["functiondepth"] = $_SESSION["nyaa"]["functiondepth"] - 1;
        
        
        
        
    }    
        
        
        
        
    if ($codestring[0] == "function"){
    
    $temppointer = $_SESSION["nyaavascriptpointer"];
    $foundone = false;
    $jumppoint = $_SESSION["nyaavascriptpointer"];
    $foundone = false;
    
    while (!$foundone and $temppointer < count($_SESSION["runningnyaavascriptprogram"])){
        $check = $_SESSION["runningnyaavascriptprogram"][$temppointer];
        $checksplit = explode(" ", $check);
        
        if ($checksplit[0] == "endfunction"){
            
            $foundone = true;
            
            $jumppoint = $temppointer;
            
        }
        
        $temppointer = $temppointer + 1;
        
    }
    
    $_SESSION["nyaavascriptpointer"] = $jumppoint;
    
    
    //$_SESSION["nyaa"]["displaybuffer"][] = "jumped to ".$_SESSION["runningnyaavascriptprogram"][$_SESSION["nyaavascriptpointer"]];
    
    }
            
        
        
        
        
      
        
    if ($codestring[0] == "goto"){
    
    $temppointer = 0;
    $foundone = false;
    
    while ($temppointer < count($_SESSION["runningnyaavascriptprogram"])){
        $check = $_SESSION["runningnyaavascriptprogram"][$temppointer];
        $checksplit = explode(" ", $check);
        
        if ($checksplit[0] == "lbl"){
            if ($checksplit[1]== $codestring[1]){
                $foundone = true;
                $_SESSION["nyaavascriptpointer"] = $temppointer;
                nyaajump();
                
            }
        }
        
        $temppointer = $temppointer + 1;
        
    }
    
    if (!$foundone){
        $_SESSION["nyaa"]["displaybuffer"][] = "error-label not found";
        
        
    }
         
    
    }
        
    if ($codestring[0] == "wait"){
        
        
    $_SESSION["nyaa"]["waittimer"] = intval($codestring[1]);
    
    
    }
        
    if ($codestring[1] == "changecontents"){
        
        
        
        
        
    }
    
    if ($codestring[0] == "append"){
     
        $arrayname = $codestring[1];
        
        $workarray = $codestring;
        
        array_shift($workarray);
        array_shift($workarray);
        $codestring[2] = implode(" ", $workarray);
        
        
        $varname = $codestring[2];
        
        
        
        
        if (isset($_SESSION["nyaa"]["variables"][$codestring[2]])){
            
            if (isset($_SESSION["nyaa"]["variables"][$codestring[1]]["length"])){
                
                $_SESSION["nyaa"]["variables"][$codestring[1]]["length"] = $_SESSION["nyaa"]["variables"][$codestring[1]]["length"] + 1;
                
                
                $_SESSION["nyaa"]["variables"][$codestring[1]."[".$_SESSION["nyaa"]["variables"][$codestring[1]]["length"]."]"] = $_SESSION["nyaa"]["variables"][$codestring[2]];
                
                
                
            }
            
            
        }else{
            
           
            
            
             if (isset($_SESSION["nyaa"]["variables"][$codestring[1]]["length"])){
                
                 //fb("in appenddddddder".$_SESSION["nyaa"]["variables"][$codestring[1]]["length"]);
                
                
                $_SESSION["nyaa"]["variables"][$codestring[1]."[".$_SESSION["nyaa"]["variables"][$codestring[1]]["length"]."]"] = $codestring[2];
                $_SESSION["nyaa"]["variables"][$codestring[1]]["length"] = intval($_SESSION["nyaa"]["variables"][$codestring[1]]["length"]) + 1;
                
                
                
                //fb("appended ".$codestring[1]."[".$_SESSION["nyaa"]["variables"][$codestring[1]]["length"]."]");
                
                
            }
            
            
            
        }   
           
        
    }
    
    if ($codestring[0] == "array"){
        
        $arrayname = $codestring[1];
        
        $workarray = $codestring;
        array_shift($workarray);
        array_shift($workarray);
        
        $counter = 0;
        
        
        foreach ($workarray as $thing){
            
            
            $_SESSION["nyaa"]["variables"][$arrayname."[".$counter."]"] = $thing;
            
            $counter = $counter + 1;
            
            
            
            
        }
        
        $_SESSION["nyaa"]["variables"][$arrayname] = [];
        
        $_SESSION["nyaa"]["variables"][$arrayname]["length"] = $counter;
        
        
        
        
    }
    
    if ($codestring[0] == "var"){
        
        $codestring[2] = processnyaatext($codestring[2]);
        $codestring[1] = processnyaatext($codestring[1]);
        
        
        
        if (isset($_SESSION["nyaa"]["variables"][$codestring[2]])){
            
            $_SESSION["nyaa"]["variables"][$codestring[1]] = $_SESSION["nyaa"]["variables"][$codestring[2]];
            
            
            
        }else{
            
            $workarray = $codestring;
            array_shift($workarray);
            array_shift($workarray);
            $finalstring = implode(" ", $workarray);
            
            $_SESSION["nyaa"]["variables"][$codestring[1]] = $finalstring;
            
            
            
            
        }
        
        
    }
    
    
    if ($codestring[0] == "math"){
    
    $storer = $codestring[1];
    
    $workarray = $codestring;
    array_shift($workarray);
    array_shift($workarray);
    
    $mathstring = implode(" ",$workarray);
    
    //$_SESSION["nyaa"]["displaybuffer"][] = "$mathstring";
    
    $mathstring = processnyaatext($mathstring);
    
    
    $mathstring = preg_replace('/[^A-Za-z0-9\-] +-\*\//', "", $mathstring);
    
    
    $result = eval("return $mathstring;");
    
     $_SESSION["nyaa"]["variables"][$storer] = $result;
     
    
    //$_SESSION["nyaa"]["displaybuffer"][] = "$mathstring";
    
    
    
    
    
    }
    
    
    if ($codestring[0] == "add"){
        
        $valid = true;
        
        
        
        if (isset($codestring[3])){
            
        $firstval = $codestring[2];
        $secondval = $codestring[3];
        
            
        }else{
        
        $firstval = $codestring[1];
        $secondval = $codestring[2];
        
        }
        
        
        if (isset($_SESSION["nyaa"]["variables"][$firstval])){
            
            if (is_numeric($_SESSION["nyaa"]["variables"][$firstval])){
                
                $firstval = intval($_SESSION["nyaa"]["variables"][$firstval]);
                
                
            }else{
                
                $valid = false;    
                
                
            }
            
            
        }else{
            
            if (is_numeric($firstval)){
                
                $firstval = intval($firstval);
                
                
                
                
            }else{
                
                $valid = false;
                
                
            }
            
            
            
            
        }
        
        
        if (isset($_SESSION["nyaa"]["variables"][$secondval])){
            
            if (is_numeric($_SESSION["nyaa"]["variables"][$secondval])){
                
                $secondval = intval($_SESSION["nyaa"]["variables"][$secondval]);
                
                
            }else{
                
                $valid = false;    
                
                
            }
            
            
        }else{
            
            if (is_numeric($secondval)){
                
                $secondval = intval($secondval);
                
                
                
                
            }else{
                
                $valid = false;
                
                
            }
            
            
            
            
        }
        
        
        if ($valid){
            
            $result = $firstval + $secondval;
            
        
        if (isset($codestring[3])){
            
            $_SESSION["nyaa"]["variables"][$codestring[1]] = $result;
            
            
            
        }else{
        
        
        $_SESSION["nyaa"]["variables"][$codestring[1]] = $result;
        
        
        }
            
            
            
            
            
            
        }
        
        
        
        
        
    }
    
    if ($codestring[0] == "testcommand"){
        
        $testval = "testvar";
        $dollar = "$";
        
        
        
        
    }
    
    
    
    if ($codestring[0] == "showvar"){
       
        if (isset($_SESSION["nyaa"]["variables"][$codestring[1]])){
            
            
        $_SESSION["nyaa"]["displaybuffer"][] = $_SESSION["nyaa"]["variables"][$codestring[1]];
        
            
            
        }else{
            
            $_SESSION["nyaa"]["displaybuffer"][] = "variable not found";
            
            
        }
    
    }
    
    if ($codestring[0] == "disp" or $codestring[0] == "display"){
        
        
        $workarray = $codestring;
        
        array_shift($workarray);
        $displaystring = implode(" ", $workarray);
        
        $displaystring = processnyaatext($displaystring);
        
        
        
        $_SESSION["nyaa"]["displaybuffer"][] = $displaystring;
        
        
        
        
        
    }
    
    
    
    
    }//end of valid if level
    
        
        
        $protectionreaper = $protectionreaper + 1;
        $_SESSION["nyaavascriptpointer"] = $_SESSION["nyaavascriptpointer"] + 1;
        
        
        
        
        
    }
    
    
    
    if ($_SESSION["nyaa"]["inputlock"] == false and $_SESSION["nyaa"]["waittimer"] <= 0){
        $_SESSION["nyaavascripthalted"] = false;
        
        
    }else{
        $_SESSION["nyaavascripthalted"] = true;
    }
    
    
        
        
    }
    



?>
