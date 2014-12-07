<?php
	class Database
	{
		private $db;

		public function __construct( $db )
		{
			$this->db	=	$db;
		}

		public function query($query, $tokens = false)
		{
			//var_dump($query);
			$statement = $this->db->prepare( $query );

			//de variabelen (in $variables) aan de query binden
			if (isset($tokens))
			{
				//var_dump($tokens);
				foreach ($tokens as $key => $value) {
					$statement->bindValue($key, $value);
				}
			}

			$statement->execute();

			$fieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
			{
				$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber )['name'];
			}

			/*De brouwer-data ophalen*/
			$data	=	array();

			while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$data[]	=	$row;
			}

			$returnArray['fieldnames']	=	$fieldnames;
			$returnArray['data']		=	$data;

			return $returnArray;

		}
	}


?>