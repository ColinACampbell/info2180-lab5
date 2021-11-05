<?php

$country = "";
$isCitiesContextOn = false;
if (isset($_GET['country'])) {
  $country = $_GET['country']; // sanatize this input
}

$host = '127.0.0.1:8889';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if (isset($_GET['context']) && $_GET['context'] == 'cities') {
  $isCitiesContextOn = true;
  $stmt = $conn->query("SELECT cities.name as name, cities.district, cities.population FROM cities inner join countries on countries.code = cities.country_code WHERE countries.name LIKE '$country'");
} else {
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if (!$isCitiesContextOn) : ?>
  <table>
    <tr>
      <th> Name </th>
      <th> Continent </th>
      <th> Independence </th>
      <th> Head of State</th>
    </tr>
    <?php foreach ($results as $row) : ?>
      <tr>
        <td> <?= $row['name'] ?> </td>
        <td> <?= $row['continent'] ?> </td>
        <td> <?= $row['independence_year'] ?> </td>
        <td> <?= $row['head_of_state'] ?></td>

      </tr>
    <?php endforeach; ?>
  </table>
<?php endif ?>
<?php if ($isCitiesContextOn) : ?>
  <table>
    <tr>
      <th> Name </th>
      <th> District </th>
      <th> Population </th>
    </tr>
    <?php foreach ($results as $row) : ?>
      <tr>
        <td> <?= $row['name'] ?> </td>
        <td> <?= $row['district'] ?> </td>
        <td> <?= $row['population'] ?> </td>

      </tr>
    <?php endforeach; ?>
  </table>
<?php endif ?>