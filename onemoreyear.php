<?php
					$currentDate = date("Y-m-d");
					$dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " +1 year");
					$year = date("Y-m-d", $dateOneYearAdded);
					echo $year;
?>