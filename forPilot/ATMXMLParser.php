<?php

	class ATMXMLParser{
		
		private $data; // array
		private $parser;
		
		function ATMXMLParser(){
			
			$this->parser = xml_parser_create(); 
			
		}
		
		function freeParser(){
			
			xml_parser_free($this->parser);
			
		}
		
		function parseData($xml){
			
			$data = xml_parse_into_struct($this->parser,$xml,$this->data);
			
		}
		
		function getData($index){
			
			if($index < count($this->data))
				return $this->data[$index];
			else 
				return null;
			
		}
		
		function getDataCount(){
			return count($this->data);
		}
		
		//function get
		
	}

?>