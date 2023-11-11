
<?php
  require __DIR__."/_header.php";

// Check If The Submit Button Is Clicked
if(isset($_GET['save'])){
  
  // The File Name
  $fileName="contacts.json";

  // Fetch Stored Data From The File And Convert It Into Assoc Array
  $savedData=json_decode(file_get_contents($fileName),true);

  // If No Data Fetched Then Create An Empty Array
  if($savedData === NULL){
    $savedData=[];
  }
  // Delete The Existing Contact To Update The New One
  if(!empty($_GET["cuid"])){
    foreach($savedData as $key => $contact){
              if($contact["cuid"] === $_GET["cuid"]){
                unset($savedData[$key]);
              }
            }
  }

  // Push The Data Into The  Coverted Array From The Json File
  array_push($savedData,[
    "nom" => trim($_GET["firstName"]),
    "prenom" => trim($_GET["lastName"]),
    "telephone" => trim($_GET["phone"]),
    "cuid" => trim(trim($_GET["firstName"]).trim($_GET["lastName"]).trim($_GET["phone"])),
  ]);
  
  // Sort Array By Alphabets
  array_multisort($savedData);
  // Encode/Convert The Data Into A JSON Format
  $jsonData=json_encode($savedData,JSON_PRETTY_PRINT);

  // Create A New JSON FILE To Store The Data
  $jsonFile=fopen($fileName,"w");
  if($jsonFile === NULL){
    exit("Failed To Create The File");
  }else{

    //Save JSON data Into The JSON File
    fwrite($jsonFile,$jsonData);
    fclose($jsonFile);
  }

}

?>

  <section class=" indexes flx">
    <div class="container flx">
    <!-- <h1>Save Your Contacts In A Better Way</h1> -->
  <form method=get action="" class="form  flx">
  <div class="field "><h2>Save Your Contacts In A Better Way</h2>
  </div>
  <div class="field ">
  <label class="label" for="firstName">Nom :</label>
  <input type="text" gen="name" class="input" name="firstName" id="firstName" value=<?php echo $_GET['exfname'] ?? "" ?>>
  </div>
  <div class="field ">
  <label class="label" for="lastName">Prénom :</label>
  <input type="text" class="input" gen="name" name="lastName" id="lastName" value=<?php echo $_GET['exlname'] ?? "" ?>>
  </div>
  <div class="field ">
  <label class="label" for="phone">Téléphone :</label>
  <input type="phone" gen="number" class="input" name="phone" id="phone" value=<?php echo $_GET['exphone'] ?? "" ?>>
  </div>
  <?php if (isset($_GET["excuid"])):?>
    <input type="hidden" name="cuid" value="<?php echo $_GET['excuid']?>">
  <?php endif;?>
  <div class="field ">
  <input type="submit" name="save" value="Enregister" id="submit">
  </div>
  </form>
  </div>
  </section>
  <script>  
    let fields=document.querySelectorAll("section.indexes .container .field input[gen='number']");
    
    fields.forEach((entry)=>{
      entry.addEventListener("keyup",(e)=>{
        console.log(e.which);
        if(+e.which ===8){
          return true;
        }
        if(+e.which < 96 || +e.which > 105){
          entry.value=entry.value.slice(0, -1);
          return true;
        }
        verification(entry);
      });
    })
    function verification(entry){
      if(+entry.value.length > 14){
          entry.value=entry.value.slice(0, -1);
        }
        if(+entry.value.length !== 0 && entry.value.length !== 14){
          if(+entry.value.match(/[0-9]/ig).length % 2 === 0){
            entry.value=entry.value+" ";
          }
        }
    }
</script>
<script src="./js/main.js"></script>
  <?php
  require __DIR__."/_footer.php";
?>
