<?php

$string = file_get_contents("cv.json");
$json_a = json_decode($string, true);

foreach ($json_a as $title => $tabNames) 
{    
	$i = 0;
	foreach ($tabNames as $tabName => $tabTitle)
	{
		$tabNameList[$i] = $tabName;		
		$j = 0;

		foreach ($tabTitle as $detail => $detailValue)
		{
			$label[$i][$j] = $detail;
			$value[$i][$j] = $detailValue;			
			$j++;
		}
		$i++;
	}
}
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
				for ($i=0;$i<count($tabNameList);$i++)
				{
					$tabNameId = $tabNameList[$i];
					
					if (strpos($tabNameId, " ") > 0)
					{
						$tabNameId = str_replace(" ", "_", $tabNameId);
					}
					if ($i==0)
						echo "<li class=\"active\">";
					else
						echo "<li>";
					
					echo "<a data-toggle=\"pill\" href=\"#" . $tabNameId . "\">" . $tabNameList[$i] . "</a></li>";
				}
			?>            
        </ul>

        <div class="tab-content">
			
			<?php
				for ($i=0;$i<count($tabNameList);$i++)
				{					
					$tabNameId = $tabNameList[$i];
					
					if (strpos($tabNameId, " ") > 0)
					{
						$tabNameId = str_replace(" ", "_", $tabNameId);
					}

					if ($i==0)
						echo "<div id=\"" . $tabNameId . "\" class=\"tab-pane fade in active\">";
					else
						echo "<div id=\"" . $tabNameId . "\" class=\"tab-pane fade in\">";
					
					echo "<h3>" . $tabNameList[$i] . "</h3>";

					echo "<table width=\"100%\" style=\"font-size:small;border-spacing:10px;border-collapse:separate;\">";
					for ($j=0;$j<count($label);$j++)
					{						
						echo "<tr>";						
						if (!is_int($label[$i][$j]))
						{
							echo "<td width=10%><b>" . $label[$i][$j] . "</td>";
						}
						echo "<td width=90%>" . $value[$i][$j] . "</td></tr>";
					}
					echo "</table>";
					
					echo "</div>";
				}
			?>
        </div>
    </div>

</body>
</html>
