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

<head>
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}				
	</style>
</head>
<body>

    <div class="container">
        <h2><u><?=$title?></u></h2>
		<br>
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
					

					echo "<br><table><tr valign=top><td width=20%><ul class=\"nav nav-pills\">";

					for ($j=0;$j<count($label);$j++)
					{																
						if (!is_int($label[$i][$j]))
						{
							if (is_array($value[$i][$j]))
							{							
								$tabNameId = $label[$i][$j];
								if (strpos($label[$i][$j], " ") > 0)
								{
									$tabNameId = str_replace(" ", "_", $label[$i][$j]);
								}
								if ($j==0)
									echo "<li class=\"active\">";
								else
									echo "<li>";
					
								echo "<a data-toggle=\"pill\" href=\"#" . $tabNameId . "\">" . $label[$i][$j] . "</a></li>";															
							}
							
							else
							{
								echo "<b>" . $label[$i][$j] . "</b><br><br>";								
							}								
						}										
					}
					echo "</ul></td>";

					echo "<td width=90%>";
					echo "<div class=\"tab-content\">";

					for ($j=0;$j<count($value);$j++)
					{
						if (is_array($value[$i][$j]))
						{												
							$tabNameId = $label[$i][$j];
							if (strpos($label[$i][$j], " ") > 0)
							{
								$tabNameId = str_replace(" ", "_", $label[$i][$j]);
							}	
							if ($j==0)
								echo "<div id=\"" . $tabNameId . "\" class=\"tab-pane fade in active\">";
							else
								echo "<div id=\"" . $tabNameId . "\" class=\"tab-pane fade in\">";

							echo "<table>";
							foreach ($value[$i][$j] as $eachValueLabel => $eachValue)
							{								
								if (!is_int($eachValueLabel))
								{
									echo "<tr valign=top><td width=10%><b>" . $eachValueLabel . "</b></td><td align=left width=90%>";
									if (is_array($eachValue))
									{
										echo "<ul>";
										foreach ($eachValue as $eachValueInArray)
										{
											echo "<li>" . $eachValueInArray . "</li>";
										}
										echo "</ul>";
									}

									else
									{
										 echo $eachValue;
									}
									echo  "</td></tr>";
								}
								else
								{
									echo "<tr><td>" . $eachValue . "</td></tr>";																		
								}								
							}							
							echo "</table></div>";
						}

						else
						{
							echo $value[$i][$j] . "<br><br>";
						}						
					}

					echo "</div></td></tr></table>";
					
					echo "</div>";
				}
			?>
        </div>
    </div>

</body>
</html>
