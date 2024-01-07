<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WP .htaccess Modifier</title>    

    <link rel='stylesheet' href='./wp-content/plugins/wp-htacces-modifier/assets/css/style.css'>

</head>
<body>

<h2 class="center-items">Welcome to .htaccess editor plugin</h2>
<p class="center-items">You can use this page to modify the content of the .htacces file</p>

<?php if(!$fileExistance): ?>
    <h3>No .htaccess file found on the root folder</h3>
<?php else: ?>
    <h3>
    Your .access file content listed below
    </h3>

    <div class="htaccess-content"  id="htaccessDiv">
        
        <?php if(empty($content)): ?>
            <?= 'No Custom Rules Set' ?>
           
        <?php else: ?>
       <?=  $content ?>
       <?php endif ?>

    </div>
    <br>

<?php endif ?>
<div class="update-buttons">
        <button id='clearButton'>Delete File</button>
        <button id='replaceWithDefault'>Replace with default</button>
        <button id='updateCustomRule'>Update Custom Rule</button>
    </div>
    
</body>
</html>