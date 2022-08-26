<?php
session_start();

include($_SERVER['DOCUMENT_ROOT']."/catssentials/miewscript.php");
function plug(){
//colour stuff


    
    
    
    //program descriptions
    
    $GLOBALS["programdescriptions"] = [];
    $GLOBALS["programdescriptions"]["notepad"] = "Not-A-Pad, A basic text editor";
    $GLOBALS["programdescriptions"]["iexplode"] = "Internet Exploder, the standard internet browser of MeowOS";
    $GLOBALS["programdescriptions"]["proton"] = "Standalone nyaavascript parser";
    
    //permnames
    


    $GLOBALS["permnames"] = [];
    $GLOBALS["permnames"]["type"] = 0;
    $GLOBALS["permnames"]["read"] = 1;
    $GLOBALS["permnames"]["write"] = 2;
    $GLOBALS["permnames"]["sight"] = 3;
    $GLOBALS["permnames"]["lock"] = 4;
    $GLOBALS["permnames"]["unlock"] = 5;
    $GLOBALS["permnames"]["run"] = 6;
    $GLOBALS["permnames"]["password"] = 7;
    
    //kernel stuff

$_SESSION["meowlist"] = [];
$_SESSION["meowlist"]["name"] = "meow0";
$_SESSION["meowlist"]["credits"] = "meow1";
$_SESSION["meowlist"]["connections"] = "meow2";
$_SESSION["meowlist"]["entertext"] = "meow3";
$_SESSION["meowlist"]["info"] = "meow4";
$_SESSION["meowlist"]["filestructure"] = "meow5";
$_SESSION["meowlist"]["type"] = "meow6";
$_SESSION["meowlist"]["parent"] = "meow7";
$_SESSION["meowlist"]["children"] = "meow8";
$_SESSION["meowlist"]["root"] = "meow9";
$_SESSION["meowlist"]["bibleverse"] = "meow10";
$_SESSION["meowlist"]["primitive"] = "meow11";
$_SESSION["meowlist"]["standardheader"] = "meow12";
$_SESSION["meowlist"]["perms"] = "meow13";
$_SESSION["meowlist"]["cooldowns"] = "meow14";
$_SESSION["meowlist"]["username"] = "meow15";
$_SESSION["meowlist"]["password"] = "meow16";
$_SESSION["meowlist"]["memory"] = "meow17";
$_SESSION["meowlist"]["maxmemory"] = "meow18";
$_SESSION["meowlist"]["defaultfiles"] = "meow19";
$_SESSION["meowlist"]["globalevents"] = "meow20";
$_SESSION["meowlist"]["localcommands"] = "meow21";

$_SESSION["meowlist"]["localprograms"] = "meow22";

$_SESSION["meowlist"]["localregisters"] = "meow23";

$_SESSION["meowlist"]["owner"] = "meow30";

$_SESSION["meowlist"]["errorflag"] = "meow40";
$_SESSION["meowlist"]["interruptflag"] = "meow41";
$_SESSION["meowlist"]["lockflag"] = "meow42";
$_SESSION["meowlist"]["successflag"] = "meow43";

$_SESSION["meowlist"]["webaddress"] = "meow50";



//kernel locks

$_SESSION["kernellock"]["memory"] = true;
$_SESSION["kernellock"]["owner"] = true;
$_SESSION["kernellock"]["maxmemory"] = true;
$_SESSION["kernellock"]["cooldowns"] = true;
$_SESSION["kernellock"]["type"] = true;
$_SESSION["kernellock"]["filestructure"] = true;
$_SESSION["kernellock"]["credits"] = true;
$_SESSION["kernellock"]["connections"] = true;
$_SESSION["kernellock"]["localprograms"] = true;
$_SESSION["kernellock"]["localcommands"] = true;


//uservars


$_SESSION["usermeows"]["name"] = "meow0";
$_SESSION["usermeows"]["password"] = "meow16";
$_SESSION["usermeows"]["username"] = "meow17";
$_SESSION["usermeows"]["userinput"] = "meow3";
$_SESSION["usermeows"]["lastcommandtime"] = "meow4";
$_SESSION["usermeows"]["logged"] = "meow5";
$_SESSION["usermeows"]["credits"] = "meow2";
$_SESSION["usermeows"]["uwucoins"] = "meow3";
$_SESSION["usermeows"]["cards"] = "meow6";
$_SESSION["usermeows"]["deck"] = "meow7";
$_SESSION["usermeows"]["mail"] = "meow8";
$_SESSION["usermeows"]["attack"] = "meow21";
$_SESSION["usermeows"]["defense"] = "meow22";
$_SESSION["usermeows"]["writecooldown"] = "meow31";
$_SESSION["usermeows"]["connectcooldown"] = "meow32";
$_SESSION["usermeows"]["inventory"] = "meow9";
$_SESSION["usermeows"]["inventory"] = "meow9";
$_SESSION["usermeows"]["email"] = "meow18";
$_SESSION["usermeows"]["verified"] = "meow19";
$_SESSION["usermeows"]["verification"] = "meow20";





$_SESSION["usermeows"]["readperms"] = "meow41";
$_SESSION["usermeows"]["writeperms"] = "meow42";
$_SESSION["usermeows"]["sightperms"] = "meow43";
$_SESSION["usermeows"]["lockperms"] = "meow44";
$_SESSION["usermeows"]["unlockperms"] = "meow45";
$_SESSION["usermeows"]["runperms"] = "meow46";


$_SESSION["globalmeows"]["globalticks"] = "meow1";
$_SESSION["globalmeows"]["globaltick"] = "meow1";
$_SESSION["globalmeows"]["resettime"] = "meow2";
$_SESSION["globalmeows"]["playercount"] = "meow3";

$_SESSION["cardmeows"]["name"] = "meow0";
$_SESSION["cardmeows"]["image"] = "meow1";
$_SESSION["cardmeows"]["attack"] = "meow11";
$_SESSION["cardmeows"]["defense"] = "meow12";
$_SESSION["cardmeows"]["health"] = "meow13";
$_SESSION["cardmeows"]["shield"] = "meow14";
$_SESSION["cardmeows"]["speed"] = "meow15";
$_SESSION["cardmeows"]["mana"] = "meow16";
$_SESSION["cardmeows"]["attacks"] = "meow17";
$_SESSION["cardmeows"]["abilities"] = "meow18";
$_SESSION["cardmeows"]["element"] = "meow19";
$_SESSION["cardmeows"]["traits"] = "meow20";
$_SESSION["cardmeows"]["type"] = "meow21";
$_SESSION["cardmeows"]["background"] = "meow22";



$servername = "";
$username = "";
$password = "";
$db = "";

$_SESSION["conn"] = new mysqli($servername, $username, $password, $db);

  
$servername = "";
$username = "";
$password = "";
$db = "";

$_SESSION["usercon"] = new mysqli($servername, $username, $password, $db);
  
    
    
}



function stripstring($string, $strippers){
    
    $stringpointer = 0;
    $newstring = "";
    
    while ($stringpointer < strlen($string)){
        
        $stripperpointer = 0;
        $workingchar = $string[$stringpointer];
        $addchar = true;
        while ($stripperpointer < strlen($strippers)){
            if ($workingchar == $strippers[$stripperpointer]){
                $addchar = false;
            }
            $stripperpointer = $stripperpointer + 1;
            
        }
        if ($addchar){
            $newstring = $newstring.$workingchar;
        }
        
        $stringpointer = $stringpointer + 1;
    }
    //echo "returning from stripstring with $newstring";
    
    return $newstring;
    
    
}

function makegui(){
    
    
$_SESSION["showpage"] = true;



foreach($_SESSION["elements"] as $value){
    //echo "f".$value;
    
    eval($value.";");
    
    
    
}


foreach($_SESSION["pagecode"] as $value){
    //echo "f".$value;
    
    eval($value.";");
    
    
    
}

  updatecall(5000);  
    
    
    
}




function setprogram($machine, $program){
    
    $programs = kernelget($machine, "localprograms");
    
    
    
    
    if ($programs == ""){
        
        $programs = $program;
        
    fb("Program successfully installed");
        
        
    }else{
        
    $programlist = explode("|", $programs);
    
    
    if (in_array($program, $programlist)){
        
     fb("This program is already installed");
     
        
        
    }else{
    
    
    $programlist[] = $program;
    $programs = implode("|", $programlist);
    
    fb("Program successfully installed");
        
        
    }
        
        
        
    }
    
    kernelset($machine, "localprograms", $programs);
    
    
    
    
}


function removeprogram($machine, $program){
    
    $programs = kernelget($machine, "localprograms");
    
    
    
    $programlist = explode("|", $programs);
    
    
    if (in_array($program, $programlist)){
    
    $newarray = [];
    
    foreach ($programlist as $value){
        
        if ($value == $program){}else{
            
            $newarray[] = $value;
            
            
            
        }
        
        
        
    }
    
    $programlist = $newarray;
    
    
    $programs = implode("|", $programlist);
    
        
     fb("Program succesfully uninstalled");
     
     
        
        
    }else{
    
    
    fb("No such program found");
    
    
    
    
        
    }
        
        
    
    kernelset($machine, "localprograms", $programs);
    
    
    
    
}


function stringinsert($string, $character, $position){
    $finalstring = "";
    $stringpointer = 0;
    $inserted = false;
    if ($position < 0){
        $position = 0;
    }
    while($stringpointer < strlen($string)){
        if ($stringpointer == $position){
            $finalstring = $finalstring.$character;
            $inserted = true;
        }
        $finalstring = $finalstring.$string[$stringpointer];
        $stringpointer = $stringpointer + 1;
    }
    if (!$inserted){
        $finalstring = $finalstring.$character;
    }
    
    return $finalstring;
}


function showprograms($machine){
    
    
$programs = kernelget($machine, "localprograms");

$programlist = explode("|",$programs);

$num = 0;
//fb($programs);


foreach ($programlist as $value){
    
    if ($num == 0){
        
                    
                $spacelength = 20 - strlen($value);
                
                $spacestring = drawspaces($spacelength);
                
                
                if ($GLOBALS["programdescriptions"][$value]){
                    
                    $descriptionstring = $GLOBALS["programdescriptions"][$value];
                    
                    
                    
                }else{
                    
                    $descriptionstring = "no description found";
                    
                    
                }
    
    
                fb("--+cyan+".$value."+white+".$spacestring.$descriptionstring);
                
        
        
        
        
    }
    
    
    
}


    
    
    
    
}


function listfind($value, $array){
    
    
foreach ($array as $thingy){
        //wl("mainscreen", var_dump($_SESSION["pagelinks"]));
        echo $value." - ".$thingy;
        
        //echo "<br>global link ".$value;
        
        if ($value == $thingy){
            
            return true;
            
            
            
        }
        
        
        }
        
        
    
return false;


    
}





function startpage(){
  
  
vvv("uiscale", 1);  
vvv("id", "{$_SERVER['REMOTE_ADDR']}");
vvv("elements", array());
vvv("pagecode", array());
vvv("pagelinks", array());

 echo $_SESSION["pagemarker"];
        
if (listfind($_SESSION["pagemarker"], $_SESSION["pagelinks"]) or $GLOBALS["entrypoint"]){}else{
    

   
    echo "link not found";
    
    


    //echo var_dump($_SESSION["pagelinks"]);
    
    $_SESSION["pagelinks"][] = "void";
    
    echo "<script>window.location.href = 'https://www.floofuwu.com/void';</script>";
    
    
    //header("Location: https://floofuwu.com/void/index.php");
    
    
    
    
die();

    
    
}


    $_SESSION["elements"] = [];
    $_SESSION["pagecode"] = [];
    $_SESSION["pagelinks"] = [];



$_SESSION["ticklist"] = "";

    
    $_SESSION["showpage"] = false;
    
    
}




function responder(){
    
    
    
//starting vars
$GLOBALS["redraw"] = false;



//fb("testing update");

$_SESSION["showrecent"] = true;

$_POST["command"] = ballsnatch($_POST["command"]);

userset($_SESSION["id"], "logged", "yes");

//userset($_SESSION["id"], "lastloggedtime" );
userset($_SESSION["id"], "lastcommandtime", getglobal("globaltick"));


if ($_POST["command"] === "update"){}else{

$inputcommandthingy = $_POST["command"];


$lastlog = userget($_SESSION["id"], "userinput");


userset($_SESSION["id"], "userinput", $lastlog.date('d-m-y h:i:s')."|did command: {$inputcommandthingy}|");





}


if ($_POST["command"] === $_SESSION['markerspray']."update"){
    $_SESSION["showrecent"] = false;
    
    //ping("update ran!");
    $_SESSION["tick"] = $_SESSION["tick"] + 1;
    
    
    $ticklist = explode("|", $_SESSION["ticklist"]);
    
    
    //fb( $_SESSION["ticklist"]);
    
    
    $numberpointer = true;
    $runnext = false;
    
    $newticklist = "";
    
    for($i = 0;$i < count($ticklist);$i++){
        
        if ($numberpointer){
            
            if ($_SESSION["tick"] == intval($ticklist[$i])){
                
                $runnext = true;
                
                
            }else{
                $newticklist = $newticklist.$ticklist[$i]."|";
                
                
            }
            
            $numberpointer = false;
            
        }else{
            
            if($runnext){
                
                
                eval($ticklist[$i]);
                
            }else{
                $newticklist = $newticklist.$ticklist[$i]."|";
                
                
            }
            
            $runnext = false;
            $numberpointer = true;
            
            
        }
        
        
    }
   
   $newticklist = substr_replace($newticklist, "", -1);
   
   $_SESSION["ticklist"] = $newticklist;
   
   
   
   ///global tick
    $globaleventlist = kernelget($_SESSION["location"],"globalevents");
    $globaltick = getglobal("globalticks");
   
    $ticklist = explode("|",$globaleventlist);
    
    
    $numberpointer = true;
    $runnext = false;
    
    $newticklist = "";
    
    for($i = 0;$i < count($ticklist);$i++){
        
        if ($numberpointer){
            
            if ($globaltick == intval($ticklist[$i])){
                
                $runnext = true;
                
                
            }else{
                $newticklist = $newticklist.$ticklist[$i]."|";
                
                
            }
            
            $numberpointer = false;
            
        }else{
            
            if($runnext){
                
                
                eval($ticklist[$i]);
                
            }else{
                $newticklist = $newticklist.$ticklist[$i]."|";
                
                
            }
            
            $runnext = false;
            $numberpointer = true;
            
            
        }
        
        
    }
   
   $newticklist = substr_replace($newticklist, "", -1);
   
   
   
   ///end of global tick
   
   
   //autocommands
   
   $GLOBALS["updaterun"] = true;
   
   
   foreach ($_SESSION["updatecommands"] as $thing){
       $GLOBALS["commandlock"] = true;
       
       
       //fb("updater: ".$thing);
       
       $_SESSION["commandbuffer"] = $thing;
       checkmode();
       
       
   }
   
   
   
   $_POST["command"] = "";
   
   
    
}


if (strpos($_POST["command"], $_SESSION['markerspray']) === FALSE) {}else{
    $allowed = true;
    $_SESSION["commandbuffer"] = $_POST["command"];
    $_SESSION["commandbuffer"] = substr($_SESSION["commandbuffer"] , 8);
    
    
    $_POST["command"] = "Enter";
};


if ($allowed){}else{
    
    $_POST["command"] = "";
    
}

$GLOBALS["commandlock"] = true;


if (isset($_SESSION["showbuffer"])){} else {$_SESSION["showbuffer"] = "";}

if (isset($_SESSION["commandbuffer"])){} else {$_SESSION["commandbuffer"] = "";}

//cl("mainscreen");


if ($_POST["command"] == "Enter"){
    $_POST["command"] = "<br>-";
    
    //testinclude();
    
    $validcommand = false;
    
    $commandstring = explode(" ", $_SESSION["commandbuffer"]);
    
    if ($_SESSION["commandbuffer"] == "override"){
        
        $_SESSION["mode"] = "console";
        
        
    }
    
    //we in console land now boyz
    
    $tvar = $_SESSION['mode'];
    
    //echo "alert(\"$tvar\")";
    
    checkmode();
    
    
    
    
    
    
    //we in console land now boyz
    
    
    
}elseif($_POST["command"] === "Backspace"){
    
    if (strlen($_SESSION["commandbuffer"])>0){
    
    removechar();
    }
    
    
}else{
    
    
   
    $_SESSION["commandbuffer"] = $_SESSION["commandbuffer"].$_POST["command"];
    
}









//wl("mainscreen",$_SESSION["showbuffer"]);
//ping($_SESSION["commandbuffer"]);





updategui();


loadresponse();

    
    
}

function cls(){
    $_SESSION["showbuffer"] = "";
    $_SESSION["mainscreenbuffer"] = [];
    
    
}



function clearinputprogram(){
    
    $_SESSION["inputprogram"] = "";
    $_SESSION["postinputprogram"] = "no";
    
    
}

function makeinputprogram($data, $post){
    
    $_SESSION["inputprogram"] = $_SESSION["inputprogram"].$data."|";
    
    
    
    
}


function getstats(){
    
    
$query = "SELECT *  FROM accounts WHERE username = '".$_POST["username"]."'";


$result = $conn->query($query);



$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    
    
    
    
    
    
    
}

function vvv($name, $value){
    
    if (isset($_SESSION[$name])){}else{
        $_SESSION[$name] = $value;
        
    }
    
    
}

function changedir($name){
    
    $meowselection = $_SESSION["meowlist"]["parent"];
    
    
$query = "SELECT * FROM {$_SESSION['location']} WHERE {$meowselection} = '".$_SESSION["directory"]."' AND meow0 = '{$name}'";


$result = $_SESSION["conn"]->query($query);



$rows = array();


    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

if (mysqli_num_rows($result) == 0){

fb("folder not found");

return false;

} else {
    
    fb("changed directory");
    $_SESSION["directory"] = $name;
    
    
    
}



    
}






function finddirs($table = "servers"){
    
    $meowselection = $_SESSION["meowlist"]["parent"];
    
    
$query = "SELECT * FROM {$table} WHERE {$meowselection} = '".$_SESSION["directory"]."'";


$result = $_SESSION["conn"]->query($query);



$rows = array();


    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

if (mysqli_num_rows($result) == 0){

return false;

}

fb(count($rows));

$souls = 0;

    for ($i=0; $i < count($rows); $i++){
        
     fb("--".$rows[$i]["meow0"]);   
        
        $souls = $souls + 1;
        
        if($souls > 100){
            
          echo "broken loop";
           exit();
            
            
      }
        
        
    }
    return true;
    
    
    
    
}



function find($id, $table = "servers"){
    
         
$query = "SELECT * FROM {$table} WHERE meow0 = '".$id."'";

//echo "alert(".$query.");";

$result = $_SESSION["conn"]->query($query);



$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

if (mysqli_num_rows($result) == 0){

return false;

}
    
    return true;
    
    
}





function checkmemory($machine, $location = 'root'){
    
    
    $mem = get($machine, "memory", "servers");
    $maxmem = get($machine, "maxmemory", "servers");
    
    
    fb("This machine has {$mem} out of {$maxmem} of memory slots used");
    
    
    
    
    
    
}




function makemachine($id, $complex = true){
    
    if ($complex){
    
    if (find($id)){
        
        fb("machine already exists");
        
        
    }else{
        
    makething($id, "sv");
    
    
    set($id, "primitive", "complex");    
    newtable($id);
    
    
    defaultmachine($id);
    createroot($id);
    
    set("root", "filestructure", "", $id);
    set($id, "standardheader", "text,0,0,0,0,0,0,0,0,0");
    
    makefile($id, "systemdata", "I exist. I suffer greatly. Please end me", "text,0,0,0,0,0,0,0,0,0", 'root');
    

    fb("machine created");
    
    }
    
    
    }else{
        
        
    makething($id, "sv");
    set($id, "primitive", "primitive");
    
    }
    
    
    
}







function makepersonalmachine($id, $username, $complex = true){
    
    
    $id = $username."smachine";
    
    
    if ($complex){
    
    if (find($id)){
        
        fb("machine already exists");
        
        
    }else{
        
    makething($id, "sv");
    
    
    set($id, "primitive", "complex");    
    newtable($id);
    
    
    defaultmachine($id);
    
    
    createroot($id);
    
    set("root", "filestructure", "", $id);
    
    
    set($id, "standardheader", "text,999,999,999,999,999,999,999,999,999");
    
    set($id, "owner", $username);
    kernelset($id, "localprograms","notepad|iexplode");
    
    
    
    makefile($id, "welcome", "Welcome to your own personal machine!+p+This is your own personal piece of the server you can use for whatever you please, so feel free to try out any of the features MeowOS has to offer without any of the usual restrictions on other machines. To start out, there is notepad preinstalled, aswell as the browser internet exploder if you want to explore the rest of the network. More features will be added in the future, so stay tuned!", "text,999,999,999,999,999,999,999,999,999", 'root');
    
    

    fb("machine created for ".$username);
    
    
    }
    
    
    }else{
        
        
    makething($id, "sv");
    set($id, "primitive", "primitive");
    
    }
    
    
    
}

function createroot($id){
    
    $parent = $_SESSION["meowlist"]["parent"];
    
    
    $query = "insert into {$id} (meow0, {$parent}) VALUES ('root','{$id}')";
    
    $result = $_SESSION["conn"]->query($query);
    
    
}




function killmachine($id){
    
    
    
    if (find($id)){
        
            thrashthing($id);
    
    $query = "DROP TABLE {$id}";

    $result = $_SESSION["conn"]->query($query);
    
    fb("machine destroyed");
    
    
        
    }else{
    
    
    fb("No such machine found");

    }
    
    
    
}



function makething($id, $tail, $table = "servers"){
    $truename = $id;

       
$query = "SELECT * FROM {$table} WHERE meow0 = '".$truename."'";


$result = $_SESSION["conn"]->query($query);



$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

if (mysqli_num_rows($result) == 0){

  
      
$query = "insert into {$table} (meow0, meow6) VALUES ('{$truename}','{$tail}')";


$result = $_SESSION["conn"]->query($query);



}
//echo "got here";



    
}

function newtable($id){
    
    $querystring = "create table {$id} (id int NOT NULL AUTO_INCREMENT";
    for ($i = 0;$i < 100;$i++){
        
        
    $querystring = $querystring = $querystring.",meow{$i} TEXT";
    
        
        //$querystring = $querystring.",meow{$i} TEXT";
        
        
        
      //echo "ohai".$querystring;
      
        
    }
    $querystring;
    
    $querystring = $querystring.",PRIMARY KEY (id))";
    //echo $querystring;
    
    
    $result = $_SESSION["conn"]->query($querystring);

    
}


function thrashthing($id, $table = "servers"){
    $truename = $id;

       
$query = "SELECT * FROM {$table} WHERE meow0 = '".$truename."'";


$result = $_SESSION["conn"]->query($query);



$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

if (mysqli_num_rows($result) == 0){

   
} else {
    
    
$query = "DELETE FROM {$table} WHERE meow0 = '".$truename."'";


$result = $_SESSION["conn"]->query($query);


    
}
//echo "got here";



    
}





function set($id, $item, $value, $table = "servers"){
    
    $meowselection = $_SESSION["meowlist"][$item];
    
    
    //if ($table == "servers"){
          
    $query = "UPDATE {$table} SET {$meowselection} = '{$value}' WHERE meow0 = '{$id}'";
    //echo $query;
    


    $result = $_SESSION["conn"]->query($query);

    
    
}



function cardset($id, $item, $value, $table = "cards"){
    
    $meowselection = $_SESSION["cardmeows"][$item];
    
    
    //if ($table == "servers"){
          
    $query = "UPDATE {$table} SET {$meowselection} = '{$value}' WHERE meow0 = '{$id}'";
    //echo $query;
    


    $result = $_SESSION["conn"]->query($query);

    
    
}



function loadcard($id, $table = "cards"){
    
    $meowselection = $_SESSION["cardmeows"][$item];
    
    
$query = "SELECT * FROM {$table} WHERE meow0 = '".$id."'";

    //echo "<br>".$meowselection;
    
$result = $_SESSION["conn"]->query($query);

       //echo "got here too";


$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    
    //var_dump($rows[0]);
      
      
      //echo var_dump($rows);
      $resultarray = [];
      //debuglog(var_dump($rows[0]));
      
      foreach ($_SESSION["cardmeows"] as $key=>$value){
          
          $resultarray[$key] = $rows[0][$value];
          debuglog($key." ".$rows[0][$value]);
          
          
          
      }
      
      
      return $resultarray;
      
      

    
}

function cardget($id, $item, $table = "cards"){
    
    $meowselection = $_SESSION["cardmeows"][$item];
    
    
$query = "SELECT * FROM {$table} WHERE meow0 = '".$id."'";

    //echo "<br>".$meowselection;
    
$result = $_SESSION["conn"]->query($query);

       //echo "got here too";


$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    
    //var_dump($rows[0]);
      
      
      //echo var_dump($rows);
      
      return $rows[0][$meowselection];
      

    
}





function userset($id, $item, $value, $table = "userdata"){
    
    $meowselection = $_SESSION["usermeows"][$item];
    
    
    //if ($table == "servers"){
          
    $query = "UPDATE {$table} SET {$meowselection} = '{$value}' WHERE meow0 = '{$id}'";
    //echo $query;
    


    $result = $_SESSION["conn"]->query($query);

    
    
}



function get($id, $item, $table = "servers"){
    
    $meowselection = $_SESSION["meowlist"][$item];
    
    
$query = "SELECT * FROM {$table} WHERE meow0 = '".$id."'";

    //echo "<br>".$meowselection;
    
$result = $_SESSION["conn"]->query($query);

       //echo "got here too";


$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    
    //var_dump($rows[0]);
      
      
      //echo var_dump($rows);
      
      return $rows[0][$meowselection];
      

    
}

function getuser($id, $item, $table = "userdata"){
    
    return userget($id, $item, $table);
    
    
    
}
function userget($id, $item, $table = "userdata"){
    
    $meowselection = $_SESSION["usermeows"][$item];
    
    
$query = "SELECT * FROM {$table} WHERE meow0 = '".$id."'";

    //echo "<br>".$meowselection;
    
$result = $_SESSION["conn"]->query($query);

       //echo "got here too";


$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    
    //var_dump($rows[0]);
      
      
      //echo var_dump($rows);
      
      return $rows[0][$meowselection];
      

    
}


function getglobals($item){
    
    return globalget($item);
    
    
}

function globalsget($item){
    
    
    return globalget($item);
    
}



function getglobal($item){
    
    return globalget($item);
    
    
}


function getkernel($machine, $item){
    
    return kernelget($machine, $item);
    
    
    
}



function globalget($item){
    
    $meowselection = $_SESSION["globalmeows"][$item];
    
      
    
$query = "SELECT * FROM servers WHERE meow0 = 'world.var'";

    //echo "<br>".$meowselection;
    
$result = $_SESSION["conn"]->query($query);

       //echo "got here too";


$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    

return $rows[0][$meowselection];
    
  
    
    
    
    
}

function setglobals($item, $value){
    
    
    globalset($item, $value);
    
    
}


function globalsset($item, $value){
    
    globalset($item, $value);
    
    
    
}


function setglobal($item, $value){
    
    globalset($item, $value);
    
    
}

function globalset($item, $value){
    
    
     $meowselection = $_SESSION["globalmeows"][$item];
    
    
    //if ($table == "servers"){
          
    $query = "UPDATE servers SET {$meowselection} = '{$value}' WHERE meow0 = 'world.var'";
    //echo $query;
    


    $result = $_SESSION["conn"]->query($query);

    
    
    
    
}


function kernelget($machine, $item){
    
    $meowselection = $_SESSION["meowlist"][$item];
    
      
    
$query = "SELECT * FROM servers WHERE meow0 = '".$machine."'";

    //echo "<br>".$meowselection;
    
$result = $_SESSION["conn"]->query($query);

       //echo "got here too";


$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    

return $rows[0][$meowselection];
    
    
    
}



function setkernel($machine, $item, $value){
    
    kernelset($machine, $item, $value);
    
    
}


function checkerror($type="all", $error=""){
    
    
        if ($_SESSION["debugmode"] == "yes"){
          
          fb("+green+DEBUGECHECK: ".$type."-".$error);  
            
        }
        
    
    if ($type == "write"){
        $type = "user";
        $error = "USER_WRITE_INSUFFICIENT";
        
        
    }
    
    if ($type == "read"){
        $type = "user";
        $error = "USER_READ_INSUFFICIENT";
        
        
    }
    
    if ($type == "run"){
        $type = "user";
        $error = "USER_RUN_INSUFFICIENT";
        
        
    }
    
    
    if ($type == "user"){
        //fb("+green+DEBUGECHECK: in user ".$error); 
        
        
        if (isset($_SESSION["usererrors"])){
        
          //fb("+green+DEBUGECHECK: in user isset");  
            
        
        if ($_SESSION["usererrors"][$error]){
            
            return $_SESSION["usererrors"][$error];
            
        }else{
            
            return false;
            
            
        }
        
        
        
        }else{
            
        return false;
        
            
            
        }
        
    }
    
    if ($type == "machine"){
        
        
        return kernelget($_SESSION["location"], "errorflag");
    
    
    
        
    }
    
    
    if ($type == "success"){
        
        
        return kernelget($_SESSION["location"], "successflag");
    
    
    
        
    }
    
    
    
    
}
function clearerror($type="all", $error=""){
    
    
    
        if ($type == "all"){
            
            $_SESSION["usererrors"] = [];
             kernelset($_SESSION["location"], "errorflag", "");
            kernelset($_SESSION["location"], "successflag", "");
            
        }
    
        if ($_SESSION["debugmode"] == "yes"){
          
          fb("+green+DEBUGECLEAR: ".$type."-".$error);  
            
        }
    
    if ($type == "user"){
        
        $_SESSION["usererrors"][$error] = false;
        
    }
    
    if ($type == "machine"){
        
        
        
        kernelset($_SESSION["location"], "errorflag", "");
    
    
    
        
    }
    
    if ($type == "success"){
        
        
        
        kernelset($_SESSION["location"], "successflag", "");
    
    
    
        
    }
    
    
    
    
    
}

function raiseerror($type, $error){
    
            
        if ($_SESSION["debugmode"] == "yes"){
          
          fb("+green+DEBUGERAISE: ".$type."-".$error);  
            
        }
    
        //fb("properly raised error ".$type);
        
    if ($type == "user"){
        
        
    $_SESSION["usererrors"][$error] = true;
    
    
    
        
    }
    
    if ($type == "machine"){
        
        
        kernelset($_SESSION["location"], "errorflag", $error);
    
        
    }
    
    
    if ($type == "success"){
        kernelset($_SESSION["location"], "successflag", $error);
    
    }
    
}





function kernelset($machine, $item, $value){
    
    
    if (isset($_SESSION["meowlist"][$item])){
        
     
    $meowselection = $_SESSION["meowlist"][$item];
    
    //if ($table == "servers"){
          
    $query = "UPDATE servers SET {$meowselection} = '{$value}' WHERE meow0 = '{$machine}'";
    //echo $query;
    


    $result = $_SESSION["conn"]->query($query);

       //raiseerror("success", "KERNEL_SET");
       
        
    }else{
    
    
    
     //raiseerror("user", "KERNEL_ATTRIBUTE_INVALID");
     
    
    }
    
    
    
}



function litterbox($name, $paws, $collar){

$maketable = "CREATE TABLE {$name} (id INT NOT NULL AUTO_INCREMENT";


for ($i = 0; $i<$paws; $i++){


$maketable = $maketable.",meow".$i." TEXT";


}
$maketable = $maketable.", PRIMARY KEY(id))";

$result = $_SESSION[$collar]->query($maketable);
echo $maketable;

}

function defaultmachine($machine){
    
    
    set($machine, "maxmemory", "20", "servers");
    set($machine, "memory", 0, "servers");
    set($machine, "programpointer", 0, "servers");
    
    
    
    
    
    
}




function fakedemon(){
    
    $_SESSION["fakedemonbit"] = "no";
    
    fb("Actually no not really you're still just a chump behind a console.");
    
    
}


function guestlogin(){
    
    
    $_SESSION["id"] = "3000";
    userset($_SESSION["id"], "guestbit", "yes");
    fb("Welcome, guest");
    
    $_SESSION["mode"] = "console";
    
    
    
}


function loginsequence(){
    
    
    fb("Greetings, user");
    fb("How may i be of assistance?");
    fb("");
    fb("type +cyan+register+white+ to register an account");
    
    fb("Type +cyan+login+white+ to enter the login sequence");
    fb("Type +cyan+guest+white+ to log in as a guest");
    fb("Type +cyan+tos+white+ to read my terms of service");
    fb("Type +cyan+what+white+ to read an explanation of this game");
    
    
    $_SESSION["mode"] = "login";
    $_SESSION["loginput"] = "greeting";
    $_SESSION["showrecent"] = true;
    //userset($_SESSION["id"], "username", "guest");
    
    $_SESSION["logged"] = "";
    
    
    
}



function rlogin($username, $password){
    
    $query = "SELECT * FROM userdata WHERE ".$_SESSION["usermeows"]["username"]."='$username' AND ".$_SESSION["usermeows"]["password"]." = '$password'";
    $result = qsql($query);
    
    if ($result){
        
        fb("You are now logged in, welcome commander");
        
        
        $_SESSION["id"] = $_SESSION["qsqlresult"][$_SESSION["usermeows"]["name"]];
        $_SESSION["location"] = $username."smachine";
        $_SESSION["mode"] = "console";
        
        
        
    }else{
        
        fb("login failed, try again");
        
        
    }
    
    
}




function rregister($username, $password){
    
    
    
    $query = "SELECT * from userdata WHERE ".$_SESSION["usermeows"]["username"]."='$username'";
    
    
    if (qsql($query)){
        
        fb("Username already taken");
        
        
        
        
        
    }else{
        
        
        $timestring = time();
    
    makedir("{$timestring}", "root", "userdata");
        
        $_SESSION["id"] = "{$timestring}";
        fb($_SESSION["id"]);
        
        userset($_SESSION["id"], "username",$username, "userdata");
         
        userset($_SESSION["id"], "email", "none@gmail.com", "userdata");
        
        userset($_SESSION["id"], "credits", 5000);
        
        userset($_SESSION["id"], "password", $password, "userdata");
        userset($_SESSION["id"], "readperms", 1);
        userset($_SESSION["id"], "writeperms", 1);
        userset($_SESSION["id"], "sightperms", 1);
        userset($_SESSION["id"], "lockperms", 1);
        userset($_SESSION["id"], "unlockperms", 1);
        
        
        
        $codecode = 'secretmeows';
        userset($_SESSION["id"], "verification", $codecode);
        $_SESSION["location"] = $username."smachine";
        
        
        $_SESSION["mode"] = "console";
        
        $_SESSION["logged"] = $username;
        
        makepersonalmachine($username, $username);
        
        fb("registered as ".$username.", welcome user");
        
        
        
        
    }
    
    
}




function logincheck(){
    $_SESSION["id"] = "{$_SERVER['REMOTE_ADDR']}";
    
    userset($_SESSION["id"], "guestbit", "no");
    $username = userget($_SESSION["id"], "username", "userdata");
    $password = userget($_SESSION["id"], "password", "userdata");
    
    $usercheck = $_SESSION["usernameslot"];
    //fb("checking on id ".$_SESSION["id"]);
    
    
    
    
    if ($_SESSION["registerbit"] == "yes"){
        
        $oldusername = $username;
        
        
        userset($_SESSION["id"], "username", "");
        
        if (qsql("SELECT * FROM `userdata` WHERE meow17 = '$usercheck' ")){
            
            userset($_SESSION["id"], "username", $oldusername);
            
            fb("username already taken");
             
             fb("");
             
             loginsequence();
    
            
            
        }else{
        
        $_SESSION["id"] = "{$_SERVER['REMOTE_ADDR']}";
        
        
        //fb("uns ".$_SESSION["usernameslot"]." username ".$username);
        //fb("pws ".$_SESSION["passwordslot"]." pass ".$password);
        
        fb("writing ".$_SESSION["usernameslot"]);
        
        userset($_SESSION["id"], "username", $_SESSION["usernameslot"], "userdata");
         
        userset($_SESSION["id"], "email", $_SESSION["emailslot"], "userdata");
        
        
        userset($_SESSION["id"], "password", $_SESSION["passwordslot"], "userdata");
        userset($_SESSION["id"], "readperms", 1);
        userset($_SESSION["id"], "writeperms", 1);
        userset($_SESSION["id"], "sightperms", 1);
        userset($_SESSION["id"], "lockperms", 1);
        userset($_SESSION["id"], "unlockperms", 1);
        
        
        
        $codecode = 'meowmeowmurr';
        userset($_SESSION["id"], "verification", $codecode);
        
        
        mail($_SESSION["emailslot"], "Floofuwu verification", "Ohai!<br>This is your verification mail of floofuwu's meowOS. If you would like to activate your account, please login and use the command 'register $codecode' to generate your own personal machine. This will allow you to have your own personal machine on floofuwu to do with whatever you please.", "From:reeeeeeeeeeeeee@reeeeeeeeeeee.re");
        
        fb("User created. Welcome commander");
        
        $_SESSION["mode"] = "console";
        
        $_SESSION["logged"] = $username;
        
        
        
        
        }
        
        
    }else{
        
        //fb("uns ".$_SESSION["usernameslot"]." username ".$username);
        //fb("pws ".$_SESSION["passwordslot"]." pass ".$password);
        
        
        
        if ($username != '' and $username == $_SESSION["usernameslot"] and $password == $_SESSION["passwordslot"]){
            $_SESSION["id"] = "{$_SERVER['REMOTE_ADDR']}";
            fb("You are now logged in. welcome, user");
            
            $_SESSION["mode"] = "console";
            $_SESSION["logged"] = $username;
            
            
              
        
    
        if (find($username."smachine")){
    
            $_SESSION["location"] = $username."smachine";
            
    
    
        }

    
    
            
            
            
            
        } else{
            
            fb("Login failed, try again");
             
             fb("");
             
             loginsequence();
    
            
            
            
        }
        
        
        
        
        
        
    }
    
    $_SESSION["registerbit"] = "no";
    
    
    
}

function error($message){
    
    $_SESSION["errorlog"] += "{$message}<br>";
    
    
    
}




function delay($time, $code){
    
    $GLOBALS["textbuffer"] = "function spinspin(){".$code."}
    
    setTimeout(spinspin, ".$time.");";
    
    
    
    
    
}

function ballsnatch($string) {
    
    $filterlist = '/[^A-Za-z0-9\- ';
    
    $exceptionlist = '\*\[\]\{\}:\(\)_.,~+-@]/';
    
    
    $blockstring = $_SESSION["blockstring"];
    
    
    for ($i = 0; $i < strlen($blockstring); $i++){
        
     $exceptionlist = str_replace($blockstring[$i],"", $exceptionlist);
     
}
    
    $filterlist = $filterlist.$exceptionlist;
    
    
    
   return preg_replace($filterlist, '', $string); //Claw their balls out

    
    
    
}


function inputcleanse($string) {
    
    
    
    
   return preg_replace('/[^A-Za-z0-9\- :_.,+-]/', '', $string); //Claw their balls out
}



function startresponse(){
    
$GLOBALS["textbuffer"] = "";

    
    
}

function loadresponse(){
    
    
    
    echo $GLOBALS["textbuffer"];
    
    
    
}

function loadpage(){
    echo "<body style = \"height: {$_SESSION['penis']}px;width: 9001px;\"><spoon>there is a spoon</spoon></body><script>".$GLOBALS["textbuffer"]."</script>";
    
    
}

function pcmode(){
    
    
   return"   
            document.onkeydown = function(clickyclacky) {
    clickyclacky = clickyclacky || window.event;
    if (mobilemode){} else {
    clickyclacky.preventDefault()
    }
    
    var charCode = clickyclacky.key
    
    //alert(charCode);
    
    
    beam(charCode);
    return false;
};

";
    
    
    
    
}


function buffertype(){
    
    
    $GLOBALS["textbuffer"] = $GLOBALS["textbuffer"].";
    
           
            var beamdata;
            var thingy;
            function beam(data){
                        beamdata = new FormData();
                
                
                beamdata.append('command', data)
                
                
                fetch('".$GLOBALS["responder"]."', {method: 'POST', body: beamdata}).then((response)=>response.text()).then(response => eval(response));
                
                
            };
            
            ";
    
    
    
}


function removechar(){
    $_SESSION["commandbuffer"] = substr_replace($_SESSION["commandbuffer"] ,"",-1);
    //runscript("document.getElementById('mainscreen').innerHTML = document.getElementById('mainscreen').innerHTML.slice(0, -1)");
    //$_SESSION["showbuffer"] = substr_replace($_SESSION["showbuffer"] ,"",-1);
    
    
}

function scriptinit(){
   
 
   
$markervar = $_SESSION['markerspray'];

$GLOBALS["textbuffer"] = "";


    $GLOBALS["textbuffer"] = $GLOBALS["textbuffer"].";
    
            var textbuffer;
            var beamdata;
            var thingy;
            var mobilemode = false;
            var senddvar;
            var markerspray = '$markervar';
             var updateval = 'update';
            var timer = 5000;
            
            
            function beam(data){
                        beamdata = new FormData();
                
                
                beamdata.append('command', '$markervar'+data)
                
                
                fetch('".$GLOBALS["responder"]."', {method: 'POST', body: beamdata}).then((response)=>response.text()).then(response =>runresponse(response));
                
                
            };
          
function runresponse(data){
    
    eval(data);
    
    
}


function puffycatsend(){
    
    senddvar = document.getElementById('meowtext').value;
    beam(senddvar);
    
}

function re(){
    console.log('REEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE');
    
    
} 




            updater = setTimeout(beamupdate, timer)

            
            function beamupdate(){
                beam(updateval);
                updater = setTimeout(beamupdate, timer)
                
                
                
            }
            
            
window.addEventListener('load', (event) => {
  
  
  beam(\"startuprun\");
  
});
  

";
            
    
    
}

function t(){
    $_SESSION["tcall"] = true;
    return true;
    
    
}
function f(){
    if ($_SESSION["tcall"]){
        $_SESSION["tcall"] = false;
        return false;
        
    }else{}
    
    return true;
    
    
    
}


function ping($message){
    
    $GLOBALS["textbuffer"] = $GLOBALS["textbuffer"].";alert('".$message."');";
    
    
}

function drawline($linerchar, $length){
    
    $returnstring = str_repeat($linerchar, $length);
    return $returnstring;
    
    
    
}


function drawspaces($length){
    
    $returnstring = str_repeat("&nbsp;", $length);
    return $returnstring;
    
    
}



function fb($text, $formatted = true){
    
    $GLOBALS["screenupdater"] = true;
    
    if ($formatted){
    $text = textprocess($text);
    }else{
        
        
        
    }
    
    $GLOBALS["lastmessagelength"] = strlen($text);
    
    $_SESSION["mainscreenbuffer"][] = $text;
    
    
    
    $_SESSION["showbuffer"] = $_SESSION["showbuffer"].$text."<br>";
    
    
}





function col($color, $text){
    
    $returnstring = "<span style = \"color: ".$color."\">".$text."</span>";
    return $returnstring;
    
    
    
}


//timing stuff

function tempTimer($ticks, $code){
    
    $code = $code.'$_SESSION["showrecent"] = true;';
    
    $totalticks = $ticks + $_SESSION["tick"];
    
    
    $_SESSION["ticklist"] = $_SESSION["ticklist"].$totalticks.'|'.$code."|";
    
    
    
    
    
    
    
}

function machinetempTimer($machine, $ticks, $code){
    
    $totalticks = $ticks + getglobals("globaltick");
    
    $oldticklist = getkernel($machine, "globalevents");
    
    $oldticklist = $oldticklist.$totalticks.'|'.$code."|";
    
    setkernel($machine, "globalevents", $oldticklist);
    
    
    
    
    
    
}





//utility


function textprocess($text){
    
 $text = str_replace(" ", "&nbsp;", $text);
    
    //start colour
    
    
    $text = str_replace('+red+', '</span><span style = "color: red">', $text);
$text = str_replace('+red-red+', '</span><span style = "color: red;background-color:red">', $text);
$text = str_replace('+red-blue+', '</span><span style = "color: red;background-color:blue">', $text);
$text = str_replace('+red-cyan+', '</span><span style = "color: red;background-color:cyan">', $text);
$text = str_replace('+red-green+', '</span><span style = "color: red;background-color:green">', $text);
$text = str_replace('+red-white+', '</span><span style = "color: red;background-color:white">', $text);
$text = str_replace('+red-indigo+', '</span><span style = "color: red;background-color:indigo">', $text);
$text = str_replace('+red-yellow+', '</span><span style = "color: red;background-color:yellow">', $text);
$text = str_replace('+red-orange+', '</span><span style = "color: red;background-color:orange">', $text);
$text = str_replace('+red-gray+', '</span><span style = "color: red;background-color:gray">', $text);
$text = str_replace('+blue+', '</span><span style = "color: blue">', $text);
$text = str_replace('+blue-red+', '</span><span style = "color: blue;background-color:red">', $text);
$text = str_replace('+blue-blue+', '</span><span style = "color: blue;background-color:blue">', $text);
$text = str_replace('+blue-cyan+', '</span><span style = "color: blue;background-color:cyan">', $text);
$text = str_replace('+blue-green+', '</span><span style = "color: blue;background-color:green">', $text);
$text = str_replace('+blue-white+', '</span><span style = "color: blue;background-color:white">', $text);
$text = str_replace('+blue-indigo+', '</span><span style = "color: blue;background-color:indigo">', $text);
$text = str_replace('+blue-yellow+', '</span><span style = "color: blue;background-color:yellow">', $text);
$text = str_replace('+blue-orange+', '</span><span style = "color: blue;background-color:orange">', $text);
$text = str_replace('+blue-gray+', '</span><span style = "color: blue;background-color:gray">', $text);
$text = str_replace('+cyan+', '</span><span style = "color: cyan">', $text);
$text = str_replace('+cyan-red+', '</span><span style = "color: cyan;background-color:red">', $text);
$text = str_replace('+cyan-blue+', '</span><span style = "color: cyan;background-color:blue">', $text);
$text = str_replace('+cyan-cyan+', '</span><span style = "color: cyan;background-color:cyan">', $text);
$text = str_replace('+cyan-green+', '</span><span style = "color: cyan;background-color:green">', $text);
$text = str_replace('+cyan-white+', '</span><span style = "color: cyan;background-color:white">', $text);
$text = str_replace('+cyan-indigo+', '</span><span style = "color: cyan;background-color:indigo">', $text);
$text = str_replace('+cyan-yellow+', '</span><span style = "color: cyan;background-color:yellow">', $text);
$text = str_replace('+cyan-orange+', '</span><span style = "color: cyan;background-color:orange">', $text);
$text = str_replace('+cyan-gray+', '</span><span style = "color: cyan;background-color:gray">', $text);
$text = str_replace('+green+', '</span><span style = "color: green">', $text);
$text = str_replace('+green-red+', '</span><span style = "color: green;background-color:red">', $text);
$text = str_replace('+green-blue+', '</span><span style = "color: green;background-color:blue">', $text);
$text = str_replace('+green-cyan+', '</span><span style = "color: green;background-color:cyan">', $text);
$text = str_replace('+green-green+', '</span><span style = "color: green;background-color:green">', $text);
$text = str_replace('+green-white+', '</span><span style = "color: green;background-color:white">', $text);
$text = str_replace('+green-indigo+', '</span><span style = "color: green;background-color:indigo">', $text);
$text = str_replace('+green-yellow+', '</span><span style = "color: green;background-color:yellow">', $text);
$text = str_replace('+green-orange+', '</span><span style = "color: green;background-color:orange">', $text);
$text = str_replace('+green-gray+', '</span><span style = "color: green;background-color:gray">', $text);
$text = str_replace('+white+', '</span><span style = "color: white">', $text);
$text = str_replace('+white-red+', '</span><span style = "color: white;background-color:red">', $text);
$text = str_replace('+white-blue+', '</span><span style = "color: white;background-color:blue">', $text);
$text = str_replace('+white-cyan+', '</span><span style = "color: white;background-color:cyan">', $text);
$text = str_replace('+white-green+', '</span><span style = "color: white;background-color:green">', $text);
$text = str_replace('+white-white+', '</span><span style = "color: white;background-color:white">', $text);
$text = str_replace('+white-indigo+', '</span><span style = "color: white;background-color:indigo">', $text);
$text = str_replace('+white-yellow+', '</span><span style = "color: white;background-color:yellow">', $text);
$text = str_replace('+white-orange+', '</span><span style = "color: white;background-color:orange">', $text);
$text = str_replace('+white-gray+', '</span><span style = "color: white;background-color:gray">', $text);
$text = str_replace('+indigo+', '</span><span style = "color: indigo">', $text);
$text = str_replace('+indigo-red+', '</span><span style = "color: indigo;background-color:red">', $text);
$text = str_replace('+indigo-blue+', '</span><span style = "color: indigo;background-color:blue">', $text);
$text = str_replace('+indigo-cyan+', '</span><span style = "color: indigo;background-color:cyan">', $text);
$text = str_replace('+indigo-green+', '</span><span style = "color: indigo;background-color:green">', $text);
$text = str_replace('+indigo-white+', '</span><span style = "color: indigo;background-color:white">', $text);
$text = str_replace('+indigo-indigo+', '</span><span style = "color: indigo;background-color:indigo">', $text);
$text = str_replace('+indigo-yellow+', '</span><span style = "color: indigo;background-color:yellow">', $text);
$text = str_replace('+indigo-orange+', '</span><span style = "color: indigo;background-color:orange">', $text);
$text = str_replace('+indigo-gray+', '</span><span style = "color: indigo;background-color:gray">', $text);
$text = str_replace('+yellow+', '</span><span style = "color: yellow">', $text);
$text = str_replace('+yellow-red+', '</span><span style = "color: yellow;background-color:red">', $text);
$text = str_replace('+yellow-blue+', '</span><span style = "color: yellow;background-color:blue">', $text);
$text = str_replace('+yellow-cyan+', '</span><span style = "color: yellow;background-color:cyan">', $text);
$text = str_replace('+yellow-green+', '</span><span style = "color: yellow;background-color:green">', $text);
$text = str_replace('+yellow-white+', '</span><span style = "color: yellow;background-color:white">', $text);
$text = str_replace('+yellow-indigo+', '</span><span style = "color: yellow;background-color:indigo">', $text);
$text = str_replace('+yellow-yellow+', '</span><span style = "color: yellow;background-color:yellow">', $text);
$text = str_replace('+yellow-orange+', '</span><span style = "color: yellow;background-color:orange">', $text);
$text = str_replace('+yellow-gray+', '</span><span style = "color: yellow;background-color:gray">', $text);
$text = str_replace('+orange+', '</span><span style = "color: orange">', $text);
$text = str_replace('+orange-red+', '</span><span style = "color: orange;background-color:red">', $text);
$text = str_replace('+orange-blue+', '</span><span style = "color: orange;background-color:blue">', $text);
$text = str_replace('+orange-cyan+', '</span><span style = "color: orange;background-color:cyan">', $text);
$text = str_replace('+orange-green+', '</span><span style = "color: orange;background-color:green">', $text);
$text = str_replace('+orange-white+', '</span><span style = "color: orange;background-color:white">', $text);
$text = str_replace('+orange-indigo+', '</span><span style = "color: orange;background-color:indigo">', $text);
$text = str_replace('+orange-yellow+', '</span><span style = "color: orange;background-color:yellow">', $text);
$text = str_replace('+orange-orange+', '</span><span style = "color: orange;background-color:orange">', $text);
$text = str_replace('+orange-gray+', '</span><span style = "color: orange;background-color:gray">', $text);
$text = str_replace('+gray+', '</span><span style = "color: gray">', $text);
$text = str_replace('+gray-red+', '</span><span style = "color: gray;background-color:red">', $text);
$text = str_replace('+gray-blue+', '</span><span style = "color: gray;background-color:blue">', $text);
$text = str_replace('+gray-cyan+', '</span><span style = "color: gray;background-color:cyan">', $text);
$text = str_replace('+gray-green+', '</span><span style = "color: gray;background-color:green">', $text);
$text = str_replace('+gray-white+', '</span><span style = "color: gray;background-color:white">', $text);
$text = str_replace('+gray-indigo+', '</span><span style = "color: gray;background-color:indigo">', $text);
$text = str_replace('+gray-yellow+', '</span><span style = "color: gray;background-color:yellow">', $text);
$text = str_replace('+gray-orange+', '</span><span style = "color: gray;background-color:orange">', $text);
$text = str_replace('+gray-gray+', '</span><span style = "color: gray;background-color:gray">', $text);

    //end colour
    
    $text = "<span>".$text;
   
    
    $text = str_replace('+p+', '<br>', $text);
    $text = str_replace('+b+', '<br>', $text);
    
    
    
    
    
    
    
    
    $text = $text."</span>";

    return $text;

    
}


function stringsanitise($data){
    
    $output = str_replace("'", "&#39", $data);
    
    
    return $output;
    
    
}

//splashscreen stuff

function splashscreen(){
    
    
fb("booting up MeowOS");
fb("Current version: 225");
fb("Goodbye world, hello abuser.");
fb("----------------------------");
fb("<img src=\"https://img-9gag-fun.9cache.com/photo/axMGzdp_460s.jpg\">", false);

fb("Abandon all hope ye who venture onto these cursed machines,");
fb("As They have already abandoned all hope for you.");

    
    
}


/////CCCCCCCCCCCCHHHHHHHHHHHHHHHHHHEEEEEEEEEEEEEEEEEECCCCCCCCCCCCCCCCKKKKKKKKKKK


function listperms($filename ){
    
    if (getperm($_SESSION["location"], $filename, "type", $_SESSION["directory"])){
        
        fb("type of file: ".getperm($_SESSION["location"], $filename, "type", $_SESSION["directory"]));
        if (intval(getperm($_SESSION["location"], $filename, "read", $_SESSION["directory"])) > intval(userget($_SESSION["id"], "readperms"))){
            
        fb("Read: no");    
            
        }else{
            
        fb("Read: yes");    
            
            
        }
        
          if (intval(getperm($_SESSION["location"], $filename, "write", $_SESSION["directory"])) > intval(userget($_SESSION["id"], "writeperms"))){
            
        fb("Write: no");    
            
        }else{
            
        fb("Write: yes");    
            
            
        }
        
          if (intval(getperm($_SESSION["location"], $filename, "sight", $_SESSION["directory"])) > intval(userget($_SESSION["id"], "sightperms"))){
            
        fb("See: no");    
            
        }else{
            
        fb("See: yes");    
            
            
        }
        
          if (intval(getperm($_SESSION["location"], $filename, "run", $_SESSION["directory"])) > intval(userget($_SESSION["id"], "runperms"))){
            
        fb("Run: no");    
            
        }else{
            
        fb("Run: yes");    
            
            
        }
        
        
        
        
    }
    
    
    
    
}




function getperm($id, $filename, $perm, $location = 'root'){
    
    
    if (get($id, "primitive") == "primitive"){
    $original = get($id, "filestructure");
    }else{
        
        $original = get($location, "filestructure", $id);
        
    }
    
    $filelist = explode("|", $original);
    
    $foundone = false;
    $permstring = "";
   
    
    for($i = 0;$i < count($filelist);$i++){
        //$grabbing = false;
        
        if ($numberpointer== 0){
            
            $erasing = false;
            
            
            if ($filelist[$i] == $filename){$foundone = true;
                $grabbing = true;
                
                $foundone = true;
                
            }else{
              
                
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
             //fb("got here");
           
           if ($grabbing){
              
              
               $permstring = $filelist[$i];
               $grabbing = false;
               
               
           }
           
           
            $numberpointer = 2;
            
            
        }else{
            
            
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
      
    
    
    
    if ($foundone == true){
    //echo $truestring;
    
    $permheap = explode(",", $permstring);
    
    //fb($permstring);
    //fb("checking");
    
    //fb($permheap[$permnames[$perm]]);
    
    raiseerror("success", "PERM GOT");
    
    return $permheap[$GLOBALS["permnames"][$perm]];
    
    
    }else{
       
       raiseerror("machine", "ERROR_NO_FILE");

       
       return false;
        
    }
    
   
    
    
    
}


//SSSSSSSSSSSSSEEEEEEEEEEEEEEEEEETTTTTTTTTTTTTTTTTT



function setstandardperm($id, $perm, $value){
    
    
    
    
    if (get($id, "primitive") == "primitive"){
    $original = get($id, "filestructure");
    }else{
        
        $original = kernelget($id, "standardheader");
        
    }
    
    
    $permlist = explode(",", $original);
    
    $permlist[$GLOBALS["permnames"][$perm]] = $value;
    
    $permstring = implode(",", $permlist);
    
    
    kernelset($id, "standardheader", $permstring);
    fb("new header set");
    
    
    
    
    
    
}

function setperm($id = '', $filename = '', $perm = '', $value = '', $location = 'root'){
    
    
    
    if ($perm == ''){
        $perm = $id;
    $value = $filename;
    
    
    $id = $GLOBALS["lastfileid"];
    $filename = $GLOBALS["lastfilename"];
    
    
    
    $location = $GLOBALS["lastfilelocation"];
    
        fb("id: ".$id." filename: ".$filename." location: ".$location." permname: ".$perm." value: ".$value);
        
        
        
        
    }
    
    
    
    
    
    if (get($id, "primitive") == "primitive"){
    $original = get($id, "filestructure");
    }else{
        
        $original = get($location, "filestructure", $id);
        
    }
    
    $filelist = explode("|", $original);
    $modifying = false;
    $foundone = false;
    $permstring = "";
    $newlist = "";
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer== 0){
            
            $erasing = false;
            
            //fb($filelist[$i]);
            
            
            
            if ($filelist[$i] == $filename){
                
                $foundone = true;
                $newlist = $newlist.$filelist[$i]."|";
                $modifying = true;
                
            }else{
                $newlist = $newlist.$filelist[$i]."|";
                
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            if ($modifying){
                
                $permstring = explode(",", $filelist[$i]);
                $newnew = "";
                
                for($j=0;$j < count($permstring);$j++){
                    
                    //fb($permnames[$perm]."compared to ".$j);
                    
                    if ($j == $GLOBALS["permnames"][$perm]){
                        
                        //fb("got here");
                        
                        
                        $newnew = $newnew.$value.",";
                        
                    }else{
                        
                        $newnew = $newnew.$permstring[$j].",";
                        
                    }
                    
                    
                    
                    
                }
                
                
                
                $modifying = false;
                
                $newnew = substr_replace($newnew, "", -1);
                
                //fb($newnew);
                $newlist = $newlist.$newnew."|";
                
            }else{
                
                
                $newlist = $newlist.$filelist[$i]."|";
                
            }
            
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            
            
                $newlist = $newlist.$filelist[$i]."|";
                
            
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
          
      
    
    $newlist = substr_replace($newlist, "", -1);
    
    
    
    
    if ($foundone == true){
    //echo $truestring;
    
    //$permheap = explode(",", $permstring);
    
    //fb($permstring);
    
    //fb("perms modified! ".$newlist);
    
    
    set($location, "filestructure", $newlist, $id);
    return true;
    
    
    }else{
       
       fb("File not found");
       
       return false;
        
    }
    
   
    
    
    
}






//file management

function format($id, $location = 'root'){
    
     set($location, "filestructure", "", $id);
    
    
}




function kerneloverridefile($id, $filename, $data, $location = 'root'){
    
    
    
    if (strlen($id)>20){
        $id = substr($id, 0, 20);
        fb("error, name too long, shortened to ".$id);
    }
    
    
    
    if (strlen($type)>10){
        
        
        $type = substr($type, 0, 10);
        
        fb("error, type too long, shortened to ".$type);
        
        
        
    }
    
        
        
        
    
    $GLOBALS["lastfileid"] = $id;
    $GLOBALS["lastfilename"] = $filename;
    $GLOBALS["lastfilelocation"] = $location;
    
    $newfilestructure = "";
    
    
    if ($header == 'standard'){
        
        $header = get($id, "standardheader");
        
        
    }
    
    
     $tempperms = explode(",", $header);
    
    
    
    $truestring = $filename."|".$header."|".$data."|";
    
    
    if (get($id, "primitive") == "primitive"){
    $original = get($id, "filestructure");
    }else{
        
        $original = get($location, "filestructure", $id);
        
    }
    
    
    
    $filelist = explode("|", $original);
    $newfilelist = [];
    
    
    
    
    $foundone = false;
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer== 0){
            
            $dontreplace = false;
            
                $newfilelist[] = $filelist[$i];
            
            if ($filelist[$i] == $filename){$foundone = true;
                
                
                $dontreplace = true;
                
                
                
            }else{
                
                
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            
                $newfilelist[] = $filelist[$i];
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            if ($dontreplace){
                
                $newfilelist[] = $data;
                
            }else{
                
                $newfilelist[] = $filelist[$i];
                
            }
            
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
    $newfilestructure = implode("|", $newfilelist);
    
    
      fb($newfilestructure);
    
    
    
    
    
    if ($foundone === true){
    //echo $truestring;
    if (get($id, "primitive") == "primitive"){
    $original = set($id, "filestructure", $truestring);
    }else{
        
        $mem = get($id, "memory", "servers" );
        $maxmem = get($id, "maxmemory", "servers" );
        
        
        
        raiseerror("success", "FILE_ADDED");
        
        //set($id, "memory", $mem+1, "servers");
        
        
        $original = set($location, "filestructure", $newfilestructure, $id);
        
        
        
        
        
    }
    
    }else{
        
        raiseerror("machine", "ERROR_NO__FILE");
        
        
        
        
    }
    
}


function makefile($id, $filename, $data, $header, $location = 'root'){
    
    
    
    if (strlen($id)>20){
        $id = substr($id, 0, 20);
        fb("error, name too long, shortened to ".$id);
    }
    
    
    
    if (strlen($type)>10){
        
        
        $type = substr($type, 0, 10);
        
        fb("error, type too long, shortened to ".$type);
        
        
        
    }
    
        
        
        
    
    $GLOBALS["lastfileid"] = $id;
    $GLOBALS["lastfilename"] = $filename;
    $GLOBALS["lastfilelocation"] = $location;
    
    
    
    
    if ($header == 'standard'){
        
        $header = get($id, "standardheader");
        
        
    }
    
    
     $tempperms = explode(",", $header);
    
    
    
    $truestring = $filename."|".$header."|".$data."|";
    
    
    if (get($id, "primitive") == "primitive"){
    $original = get($id, "filestructure");
    }else{
        
        $original = get($location, "filestructure", $id);
        
    }
    
    
    
    $filelist = explode("|", $original);
    
    $foundone = false;
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer== 0){
            
            
            
            if ($filelist[$i] == $filename){$foundone = true;
                
                
            }else{
                
                
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
      
    
    
    
    $truestring = $original.$truestring;
    
    
    
    
    
    
    if ($foundone === false){
    //echo $truestring;
    if (get($id, "primitive") == "primitive"){
    $original = set($id, "filestructure", $truestring);
    }else{
        
        $mem = get($id, "memory", "servers" );
        $maxmem = get($id, "maxmemory", "servers" );
        
        
        
        if ($mem < $maxmem){
        
        
        
        
            if (intval(userget($_SESSION["id"], "writeperms")) < intval($tempperms[$GLOBALS["permnames"]["write"]]) and !(userget($_SESSION["id"], "username") == kernelget($_SESSION["location"], "owner"))){
                
                raiseerror("user", "USER_WRITE_INSUFFICIENT");
                
                
            }else{
                
        
        raiseerror("success", "FILE_ADDED");
        
        set($id, "memory", $mem+1, "servers");
        
        
        $original = set($location, "filestructure", $truestring, $id);
        
            }
        
        
        } else {
            
            raiseerror("machine", "ERROR_INSUFFICIENT_MEMORY");
            
            
            
            
        }
        
        
        
    }
    
    }else{
        
        raiseerror("machine", "ERROR_FILE_EXISTS");
        
        
        
        
    }
    
}




function stealthremovefile($id, $filename, $location = 'root'){
    
    
    
    if (get($id, "primitive") == "primitive"){
    $original = get($id, "filestructure");
    }else{
        
        $original = get($location, "filestructure", $id);
        
    }
    
    $newlist = "";
    
    $filelist = explode("|", $original);
    
    $foundone = false;
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer== 0){
            
            $erasing = false;
            
            
            if ($filelist[$i] == $filename){$foundone = true;
                $erasing = true;
                
                $fileheader = $filelist[$i + 1];
                
                
                
            }else{
                $newlist = $newlist.$filelist[$i]."|";
                
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            if ($erasing){}else{
                $newlist = $newlist.$filelist[$i]."|";
                
            }
            
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            
            if ($erasing){}else{
                $newlist = $newlist.$filelist[$i]."|";
                
            }
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
      
    
    $newlist = substr_replace($newlist, "", -1);
    
     $tempperms = explode(",",$fileheader);
    
    
    if ($foundone == true){
    //echo $truestring;
    if (get($id, "primitive") == "primitive"){
    $original = set($id, "filestructure", $newlist);
    
    
    fb("file removed");
    }else{
        //fb("file removed");
        
        
            if (intval(userget($_SESSION["id"], "writeperms")) < intval($tempperms[$GLOBALS["permnames"]["write"]]) and !(userget($_SESSION["id"], "username") == kernelget($_SESSION["location"], "owner"))){
                 
                raiseerror("user", "USER_WRITE_INSUFFICIENT");
                
                
            }else{
                
                
                raiseerror("success", "FILE_REMOVED");
                
        $mem = get($id, "memory", "servers" );
        
       set($id, "memory", $mem - 1, "servers");
        
        $original = set($location, "filestructure", $newlist, $id);
            
                
                
                
            }
            
            
    }
    
    }else{
        
        
        //fb("file not found");
        
        
    }
    
}




function removefile($id, $filename, $location = 'root'){
    
    
    
    if (get($id, "primitive") == "primitive"){
    $original = get($id, "filestructure");
    }else{
        
        $original = get($location, "filestructure", $id);
        
    }
    
    $newlist = "";
    
    $filelist = explode("|", $original);
    
    $foundone = false;
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer== 0){
            
            $erasing = false;
            
            
            if ($filelist[$i] == $filename){$foundone = true;
                $erasing = true;
                
                $fileheader = $filelist[$i+1];
                
            }else{
                $newlist = $newlist.$filelist[$i]."|";
                
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            if ($erasing){}else{
                $newlist = $newlist.$filelist[$i]."|";
                
            }
            
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            
            if ($erasing){}else{
                $newlist = $newlist.$filelist[$i]."|";
                
            }
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
      
    
    $newlist = substr_replace($newlist, "", -1);
    //fb("header: ".$fileheader);
    
     
    $tempperms = explode(",",$fileheader);
    
    if ($foundone == true){
    //echo $truestring;
    if (get($id, "primitive") == "primitive"){
    $original = set($id, "filestructure", $newlist);
    
    
    fb("file removed");
    }else{
        
        
        
            if (intval(userget($_SESSION["id"], "writeperms")) < intval($tempperms[$GLOBALS["permnames"]["write"]]) and !(userget($_SESSION["id"], "username") == kernelget($_SESSION["location"], "owner"))){
                 
                raiseerror("user", "USER_WRITE_INSUFFICIENT");
                
            }else{
        
        //fb("file removed");
        
        
        raiseerror("success", "FILE_REMOVED");
        
        $mem = get($id, "memory", "servers" );
        
       set($id, "memory", $mem - 1, "servers");
        
        $original = set($location, "filestructure", $newlist, $id);
        
            }
            
        
    }
    
    }else{
        
        
        raiseerror("machine", "ERROR_NO_FILE");
        
        
    }
    
}


function stealvar($machine, $slot, $directory = 'root'){
    
    $value = get($machine, $slot, $directory);
    
    fb("variable ".$slot. " is equal to ".$value);
    
    
    
    
    
    
    
    
}



function wrenchvar($machine, $slot, $value, $directory = 'root'){
    
    set($machine, $slot, $value, $directory);
    
    fb("variable set");
    
    
    
    
    
    
    
}




function makemenu($title, $option1 = "", $option2 = "", $option3 = "",$option4 = "",$option5 = "", $option6 = "", $option7 = ""){
    
    
    fb($title);
    $titlelength = strlen($title);
    fb(drawline("-", $titlelength));
    if ($option1 == ""){}else{
        fb("1) ".$option1);
        
        
        
    }
    if ($option2 == ""){}else{
        fb("2) ".$option2);
        
        
        
    }
    if ($option3 == ""){}else{
        fb("3) ".$option3);
        
        
        
    }
    if ($option4 == ""){}else{
        fb("4) ".$option4);
        
        
        
    }
    if ($option5 == ""){}else{
        fb("5) ".$option5);
        
        
        
    }
    if ($option6 == ""){}else{
        fb("6) ".$option6);
        
        
        
    }
    if ($option7 == ""){}else{
        fb("7) ".$option7);
        
        
        
    }
    
    
    
    
}







function qsql($lineline){
    
             
$query = $lineline;


$result = $_SESSION["conn"]->query($query);



$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }



if (mysqli_num_rows($result) == 0){

return false;

}

$_SESSION["qsqlresult"] = $rows[0];

    
    return true;//
    
    
    
    
}



function removedir($name){
    
    $dirholder = $_SESSION["directory"];
    $tableholder = $_SESSION["location"];
    $qstring = "SELECT * FROM {$tableholder} WHERE meow0 = '".$name."' AND meow7 = '{$dirholder}'";
    ;
    
    
    if (qsql($qstring)){
    
    
    thrashthing($name, $_SESSION["location"]);
    
    fb("directory destroyed");
    }else{
        
        fb("No such directory found");
        
        
        
    }
    
    
}

function filegrab($machine, $directory, $filename){
    
    
        if (get($_SESSION["location"], "primitive") == "primitive"){
        
        $dirstring = get($_SESSION["location"], "filestructure");
        } else{
            
            
        $dirstring = get($directory, "filestructure", $machine);
        
            
        }
        
        
        //fb("files on current system:");
    $filelist = explode("|", $dirstring);
    
    $numberpointer = 0;
    $runnext = false;
    
    $foundone = false;
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer == 0){
            
            
            if ($filelist[$i] == $filename){
                
                $foundone = true;
                
                $filetitle = $filelist[$i];
            $filedata = $filelist[$i + 2];
                
            }else{
                
            
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            if($runnext){
                
                
                
                
            }
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
        if ($foundone){
           
           return $filedata;
           
            
            
        }else{
            
            raiseerror("machine", "ERROR_NO_FILE");
            
            
            return false;
            
            
        }
        
        
        
        
        
       
        
    
    
    
    
}

function dirdir(){
    
    
    
        if (get($_SESSION["location"], "primitive") == "primitive"){
        
        $dirstring = get($_SESSION["location"], "filestructure");
        } else{
            
            
        $dirstring = get($_SESSION["directory"], "filestructure", $_SESSION["location"]);
        
            
        }
        
        
        fb("files on current system:");
    $filelist = explode("|", $dirstring);
    
    $numberpointer = 0;
    $runnext = false;
    
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer== 0){
            
            
            if ($filelist[$i] == ""){}else{
                
                $typetext = readheader("type", $filelist[$i + 1]);
                
                $sightperms = intval(readheader("sight",$filelist[$i + 1]));
                
                $myperm = intval(userget($_SESSION["id"], "sightperms"));
                //markmarmkarmkarmkark
                
                $strlength = strlen($filelist[$i]);
                $showuser = userget($_SESSION["id"], "username");
                
                //fb($myperm." - ".$sightperms);
                
                if ($sightperms > $myperm and !(userget($_SESSION["id"], "username") == kernelget($_SESSION["location"], "owner")) ){}else{
                
                $spacelength = 20 - strlen($filelist[$i]);
                
                $spacestring = drawspaces($spacelength);
                
                
            fb("--".$filelist[$i]." ".$spacestring.$typetext." - vis ".$sightperms);
            
                }
                
                
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
        
        
    
    
    
}


function not($var){
    
    if ($var){
        return $false;
    }else{
        return $true;
        
    }
}

function readread($machine, $directory, $filename){
    
    
        if (get($_SESSION["location"], "primitive") == "primitive"){
        
        $dirstring = get($_SESSION["location"], "filestructure");
        } else{
            
            
        $dirstring = get($directory, "filestructure", $machine);
        
            
        }
        
        
        //fb("files on current system:");
    $filelist = explode("|", $dirstring);
    
    $numberpointer = 0;
    $runnext = false;
    
    $foundone = false;
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer == 0){
            
            
            if ($filelist[$i] == $filename){
                
                $foundone = true;
                
                $filetitle = $filelist[$i];
                $fileheader = $filelist[$i + 1];
                
            $filedata = $filelist[$i + 2];
                
            }else{
                
            
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            if($runnext){
                
                
                
                
            }
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
        if ($foundone){
            
            $tempperms = explode(",",$fileheader);
            
            
            
           
            
            
            
            
           
            
            
            if (intval(userget($_SESSION["id"], "readperms")) < intval($tempperms[$GLOBALS["permnames"]["read"]]) and !(userget($_SESSION["id"], "username") == kernelget($_SESSION["location"], "owner"))){
                
                raiseerror("user", "USER_READ_INSUFFICIENT");
                
                
            }else{
                
                if ($_SESSION["debugmode"] == "yes"){
             fb($fileheader." - ".userget($_SESSION["id"], "readperms")."-".$tempperms[$GLOBALS["permnames"]["read"]]);
                }
                
                
              fb($filetitle);
            fb(drawline("-", strlen($filetitle)));
            
            fb("");
            
            
            
            
            fb($filedata);
            }
            
        }else{
            
            raiseerror("machine", "ERROR_NO_FILE");
            
        }
        
        
        
        
        
       
        
    
    
    
    
}




function fileexists($machine, $directory, $filename){
    
    
        if (get($_SESSION["location"], "primitive") == "primitive"){
        
        $dirstring = get($_SESSION["location"], "filestructure");
        } else{
            
            
        $dirstring = get($directory, "filestructure", $machine);
        
            
        }
        
        
        //fb("files on current system:");
    $filelist = explode("|", $dirstring);
    
    $numberpointer = 0;
    $runnext = false;
    
    $foundone = false;
    
    for($i = 0;$i < count($filelist);$i++){
        
        if ($numberpointer == 0){
            
            
            if ($filelist[$i] == $filename){
                
                $foundone = true;
                
                $filetitle = $filelist[$i];
                $fileheader = $filelist[$i + 1];
                
            $filedata = $filelist[$i + 2];
                
            }else{
                
            
                
            }
            
            $numberpointer = 1;
            
        }elseif($numberpointer == 1){
            
            if($runnext){
                
                
                
                
            }
            
            $runnext = false;
            $numberpointer = 2;
            
            
        }else{
            
            $numberpointer = 0;
            
        }
        
        
    }
   
   
        
        if ($foundone){
           
           return true;
           
            
        }else{
           
           return false;
           
           
        }
        
        
        
        
        
       
        
    
    
    
    
}






function destroycard($name){
    
    
    $dirholder = $_SESSION["directory"];
    $tableholder = "cards";
    $qstring = "SELECT * FROM {$tableholder} WHERE meow0 = '".$name."'";
    ;
    
    
    if (qsql($qstring)){
    
    
    thrashthing($name, "cards");
    
    
    debuglog("card destroyed");
    }else{
        
        debuglog("No such card found");
        
        
        
    }
    

    
    
    
    
    
    
}




function makecard($name ){
    
    $truename = $name;
    
    $table = "cards";
    
    if (find($name, "cards")){
        debuglog("card already exists");}else{
            
            
       
$query = "SELECT * FROM {$table} WHERE meow0 = '".$truename."'";


$result = $_SESSION["conn"]->query($query);



$rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

if (mysqli_num_rows($result) == 0){

  
      
$query = "insert into {$table} (meow0) VALUES ('{$truename}')";


$result = $_SESSION["conn"]->query($query);



}
    foreach ($_SESSION["cardstats"] as $key=>$value){
        
        cardset($name, $key, $value);
        debuglog("$name, $key, $value");
        
        
        
        
        
    }
    
    
    
    
    
    
    
        }
    
    
}




function makedir($name, $parent, $remote = false){
    
    
    if ($remote === false){    
    
    if (find($name, $_SESSION["location"])){
        fb("folder already exists");}else{
    
    
    makething($name, "folder", $_SESSION["location"]);
    //set($name, "root", $name, $name);
    set($name, "parent", $_SESSION["directory"], $_SESSION["location"]);
    
    
    }
       
    }else{
    
    
    if (find($name, $remote)){
        fb("folder already exists");}else{
    
    
    makething($name, "folder", $remote);
    //set($name, "root", $name, $name);
    set($name, "parent", 'root', $remote);
    
    
    
        }
        
    
    }
    
    
    
}




function readheader($slot, $header){
    
    $headerslots = [];
    $headerslots["type"] = 0;
    
    $headerlist = explode(",", $header);
    
    
    return $headerlist[$GLOBALS["permnames"][$slot]];
    
    
    
    
    
}


function makeconnection($name, $connection){
    
    if (find($name)){
    
    $rawdata = get($name, "connections");
    
    $rawdata = $rawdata.$connection."|";
    
    set($name, "connections", $rawdata);
    
    
    } else {
        
        
        
    }
    
    
}





function hasconnection($name, $connection){
    
    
    
    
    if (find($name)){
    
    $rawdata = get($name, "connections");
    
    if (strpos($rawdata, $connection."|") === false){
        
        return false;
        
        
    }else{
        
        return true;
        
    }
    ;
    
    
    
    
    } else {
        
        
        
    }
    
    
    
    
    
}


function killconnection($name, $connection){
    
    
    
    if (find($name)){
    
    $rawdata = get($name, "connections");
    
    $connectionlist = explode("|", $rawdata);
    
    str_replace($connection."|", "", $rawdata);
    
    
    set($name, "connections", $rawdata);
    
    
    } else {
        
        
        
    }
    
    
    
    
    
    
    
    
}


function wavesplode($codestring){
    
    
    
    $newcodestring = array();
    
    $knitstring = "";
    $open = false;
    
    
    foreach ($codestring as $thing){
        
        $blockadd = false;
        
        
        if ($thing == "~"){
            
            if ($open == false){
                $open = true;
                
                $blockadd = true;
                $knitstring = " ";
                
            }else{
                
                $open = false;
                
                $knitstring = $knitstring." ";
                
                $newcodestring[] = $knitstring;
                
                
            }
            
        
        
        
        }else{
        if ($open == false){
            
            
            
            if ($thing[0] == "~"){
                $blockadd = true;
                
                if ($thing[-1] == "~"){
                 
                    $newcodestring[] = substr($thing, 1, -1);
                    
                    
                    
                }else{
                    
                $open = true;
                $newthing = substr($thing, 1);
                
                $knitstring = $newthing." ";
                
                }
                
                
            }
            
            
        }else{
            
            if ($thing[-1] == "~"){
                
                $open = false;
                $knitstring = $knitstring.substr($thing, 0, -1);
                
                $blockadd = true;
                
                 $newcodestring[] = $knitstring;
                
            }
            
            
        }
        
        }
        
        
        if (!$blockadd){
        if ($open){
            
            
            $knitstring = $knitstring.$thing." ";
            
            
        }else{
            
            $newcodestring[] = $thing;
            
        }
        
        }
        
        
        
        
    }
    
    
    
    return $newcodestring;
    
    
    
    
}




function findchildren($name){
    
    
    
    
    
    
}

function filestructure($id){
    
    $filestring = get($id, "filestructure");
    
    
    
}


?>
