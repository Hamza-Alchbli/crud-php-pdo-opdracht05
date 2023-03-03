<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASIC-FIT Utrecht</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <?php
    
    $id = $_GET['id'];
    require_once 'connect.php';

    // Define homeclub options
    $homeclub_options_query = "SELECT id, name FROM homeclub_options";
    $homeclub_options = $pdo->query($homeclub_options_query)->fetchAll(PDO::FETCH_ASSOC);

        // Get the ID of the record to update
        $id = $_GET['id'];

        // Prepare the SQL statement to get the data
        $stmt = $pdo->prepare("SELECT * FROM form_data WHERE id = :id");
    
        // Bind the parameter
        $stmt->bindValue(':id', $id);
    
        // Execute the statement
        $stmt->execute();
    
        // Fetch the result as an object
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $extras = explode(',', $result->extras);
        // Display the form with the current values
    ?>

    <form method="POST">
        <label for="homeclub">Kies je homeclub:</label>
        <select id="homeclub" name="homeclub" required>
            <option value="">Selecteer een homeclub</option>
            <?php foreach ($homeclub_options as $option) : ?>
                <option value="<?php echo $option['id']; ?>"<?php if ($result->homeclub_id == $option["id"]) echo 'selected';  ?>><?php echo $option["name"];?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="membership_type">Selecteer een lidmaatschap:</label>
        <br>

        <label for="membership_type_basic">Basic
            <input type="radio" id="membership_type_basic" name="membership_type" value="basic" <?php if ($result->membership_type == 'basic') echo 'checked'; ?> required>
        </label>
        <br>
        <label for="membership_type_premium">Premium
            <input type="radio" id="membership_type_premium" name="membership_type" value="premium" <?php if ($result->membership_type == 'premium') echo 'checked'; ?> required>

        </label>
        <br>

        <label for="duration">Looptijd:</label>
        <br>
        <label for="duration_monthly">Maandelijks
            <input type="radio" id="duration_monthly" name="duration" value="monthly" <?php if ($result->duration == 'monthly') echo 'checked'; ?> required>

        </label>
        <br>
        <label for="duration_yearly">Jaarlijks
            <input type="radio" id="duration_yearly" name="duration" value="yearly" <?php if ($result->duration == 'yearly') echo 'checked'; ?> selected required>

        </label>
        <br>

        <label for="extras[]">Selecteer je extra's:</label>
        <br>
        <label for="extra_gym">
            <input type="checkbox" id="extra_gym" name="extras[]" value="gym" <?php if (in_array("gym",$extras)) echo 'checked';  ?>>
            Toegang tot de sportschool</label>
        <br>
        <label for="extra_swimming_pool">
            <input type="checkbox" id="extra_swimming_pool" name="extras[]" value="swimming_pool" <?php if (in_array("swimming_pool",$extras)) echo 'checked';  ?>>
            Toegang tot het zwembad</label>
        <br>
        <label for="extra_sauna">
            <input type="checkbox" id="extra_sauna" name="extras[]" value="sauna" <?php if (in_array("sauna",$extras)) echo 'checked';  ?>>
            Toegang tot de sauna</label>
        <br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= $result->email?>" required>
        <br>

        <input type="hidden" id="submission_datetime" name="submission_datetime" value="<?php echo date("Y-m-d H:i:s"); ?>">

        <input type="submit" value="Versturen">
        <input type="reset" value="Reset">
    </form>

</body>

</html>