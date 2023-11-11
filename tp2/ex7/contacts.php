<?php
  require __DIR__."/_header.php";
  $contactsFileJson=file_get_contents("contacts.json");
  $contacts=JSON_decode($contactsFileJson,true);

    // Deleting A Contact
    if(isset($_GET["delete"]))
    {
      $contactsFile=fopen("contacts.json","w");
        if($contactsFile === NULL)
          {
          }else {
            foreach($contacts as $key => $contact){
              if($contact["cuid"] === $_GET["delete"]){
                unset($contacts[$key]);
              }
            }
            fwrite($contactsFile,JSON_encode($contacts,JSON_PRETTY_PRINT));
            fclose($contactsFile);
            $contactsFileJson=file_get_contents("contacts.json");
            $contacts=JSON_decode($contactsFileJson,true);
          }
  }
  if(isset($_GET["edit"])){
    foreach($contacts as $key => $contact){
              if($contact["cuid"] === $_GET["edit"]){
                header("Location:./indexes.php?excuid=".$contact['cuid']."&exfname=".$contact['nom']."&exlname=".$contact['prenom']."&exphone=".$contact['telephone']."");
              }
            }
  }
?>
<section class="flx contacts">
  <div class="container flx">
      <h1>List Of Contacts | Total : <?php echo sizeof($contacts)?></h1>
    <div class="table flx">
    <table border="1" cellspacing="0" >
    <tr class="row">
      <td class="col">Index</td>
      <td class="col">Nom</td>
      <td class="col">Prénom</td>
      <td class="col">Téléphone</td>
      <td class="col">Réglage</td>
    </tr>
  <?php if(!empty($contacts))
  {
    $i=1;
    foreach($contacts as $contact)
    {
    ?>
    <tr class="row">
      <td class="col"><?php echo $i++?></td>
      <td class="col"><?php echo $contact["nom"];?></td>
      <td class="col"><?php echo $contact["prenom"];?></td>
      <td class="col"><?php echo $contact["telephone"];?></td>
      <td class="col">
        <form action="" method="get">
          <button type="submit" name="delete" value="<?php echo $contact['cuid'];?>">delete</button>
          <button type="submit" name="edit" value="<?php echo $contact['cuid'];?>">edit</button>
        </form>
      </td>
    </tr>
  <?php }}else{?>
    <tr class="row">
      <td class="col" colspan="5">no data found</td>
    </tr>
    <?php }?>
  </table>
  </div>
  </div>
</section>

<?php
  require __DIR__."/_footer.php";
?>