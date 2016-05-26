<?php

$string = file_get_contents("cv.json");
$json_a = json_decode($string, true);

foreach ($json_a as $title => $tabNames) 
{    
	$i = 0;
	foreach ($tabNames as $tabName => $tabTitle)
	{
		echo $tabName . "<br>";
		$tabNameList[$i] = $tabName;		

		foreach ($tabTitle as $detail => $detailValue)
		{
			if (is_int($detail))
			{
				$levelOne = 
			}
			echo "> " . $detail . " : " . $detailValue . "<br>";
		}
		$i++;
	}
}

echo count($tabNameList);
/*
foreach ($json_a as $file_contents => $element) 
{
    $skills = $element['Skills'];
}

foreach ($skills as $skillElement => $skillDetails)
{	
	echo $skillElement . " : <br>";
	
	foreach ($skillDetails as $skillDetail)
	{
		echo " > " . $skillDetail . "<br>";
	}
}
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Case</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>CV</h2>
        <ul class="nav nav-pills">
			<?php
				foreach ($tabNameList as $tabName)
				{
					$tabNameId = $tabName;
					if (strpos($tabName, " ") > 0)
					{						
						$tabNameId = str_replace(" ", "_", $tabName);
					}
					echo "<li><a data-toggle=\"pill\" href=\"#" . $tabNameId . "\">" . $tabName . "</a></li>";
				}
			?>            
        </ul>

        <div class="tab-content">
			
			<?php
				foreach ($tabNameList as $tabName)
				{					
					$tabNameId = $tabName;
					if (strpos($tabName, " ") > 0)
					{
						$tabNameId = str_replace(" ", "_", $tabName);
					}
					echo "<div id=\"" . $tabNameId . "\" class=\"tab-pane fade in\">";
					echo "<h3>" . $tabName . "</h3>";
					echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
							incididunt ut labore et dolore magna aliqua.</p>";
					echo "</div>";
				}
			?>
        </div>
    </div>

</body>
</html>
