<head>
    <style>
        table {
  border-collapse: collapse;
  width: 100%;
}

th,
td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}

th {
  background-color: #333;
  color: white;
}

td button {
  border: none;
  background-color: #f44336;
  color: white;
  padding: 8px;
  text-align: center;
  cursor: pointer;
}

td button:hover {
  background-color: #f44336;
  opacity: 0.8;
}

    </style>
</head>
<?php
require_once 'connect.php';

// Define the query to get form data
$form_data_query = "SELECT * FROM form_data";

// Execute the query and fetch the results as objects
$form_data = $pdo->query($form_data_query)->fetchAll(PDO::FETCH_OBJ);

// Display the results in a table
?>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Homeclub ID</th>
      <th>Membership Type</th>
      <th>Duration</th>
      <th>Extras</th>
      <th>Email</th>
      <th>Submission Datetime</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($form_data as $data): ?>
      <tr>
        <td><?php echo $data->id; ?></td>
        <td><?php echo $data->homeclub_id; ?></td>
        <td><?php echo $data->membership_type; ?></td>
        <td><?php echo $data->duration; ?></td>
        <td><?php echo $data->extras; ?></td>
        <td><?php echo $data->email; ?></td>
        <td><?php echo $data->submission_datetime; ?></td>
        <td>
          <a href="delete.php?id=<?php echo $data->id; ?>" class="delete">Delete</a>
          <a href="update.php?id=<?php echo $data->id; ?>" class="update">Update</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
