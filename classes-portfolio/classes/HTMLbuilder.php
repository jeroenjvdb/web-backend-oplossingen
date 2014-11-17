<?php
	class HTMLbuilder
	{
		protected $header, $body, $footer;
		function __construct($header, $body, $footer)
		{
			$this->header = $header;
			$this->body = $body;
			$this->footer = $footer;

			$this->pageBuilder();
		}
		private function pageBuilder(){
			$this->headerBuilder();
			$this->bodyBuilder();
			$this->footerBuilder();
		}

		private function headerBuilder(){
			include 'html/' . $this->header;	
		}

		private function bodyBuilder(){
			include 'html/' . $this->body;
		}

		private function footerBuilder(){
			include 'html/' . $this->footer;
		}
	}

	
?>