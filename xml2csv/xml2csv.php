<?
/**
 * @author codestips
 * @copyright 2009 codestips.com
 * @authorurl http://twitter.com/codestips
 * @articleurl http://codestips.com/php-xml-to-csv/
 
 */
 
 
/*
Copyright (C) 2009 codestips.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.


You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

This file is to demonstrate some PHP functionality. Use it at your own risks.
*/

$filexml='20110705.xml';
if (file_exists($filexml)) {
	
	echo $filexml." exist !";
    $xml = simplexml_load_file($filexml);
	$f = fopen('20110705.csv', 'w');
	
	foreach ($xml->orders as $car) {
    	fputcsv($f, get_object_vars($car),',','"');
	}
	
	fclose($f);
	
}
?>