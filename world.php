<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];
$arraylist = array();
$context = $_GET['context'];
$count = 0;
$error  = 'Enrty not valid';

if(isset($country)){
  $count = 1;
}else{
  $count = 2;
}

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table >

<?php if($context=="countries"){ 
  
  if(count($results)<1){
    echo($error);
  }else{ ?>
   <thead> 
    <tr>
      <th><?= 'Name'; ?></th>
      <th><?= 'Continent'; ?></th>
      <th><?= 'Independence'; ?></th>
      <th><?= 'Head of State'; ?></th>
    </tr>
  </thead>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['continent']; ?></td>
      <td><?php echo $row['independence_year']; ?></td>
      <td><?php echo $row['head_of_state']; ?></td>
    </tr>
  <?php endforeach;}  

}else{

  if(count($results)<1){
    echo($error);
  }else{

    foreach($results as $data){
      array_push($arraylist,$data['code']);
    }
  
    ?>
  
  <thead> 
    <tr>
      <th><?= 'Name'; ?></th>
      <th><?= 'Distrcit'; ?></th>
      <th><?= 'Population'; ?></th>
      
    </tr>
  </thead>


      <?php
      foreach($arraylist as $var){

      $stmt2 = $conn->query("SELECT * FROM cities WHERE country_code LIKE '%$var%'"); 
      $Results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <?php foreach ($Results2 as $row): ?>
        <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['district']; ?></td>
        <td><?php echo $row['population']; ?></td>
        </tr>
      <?php endforeach; 
    }
  }
}?>
  
</table>