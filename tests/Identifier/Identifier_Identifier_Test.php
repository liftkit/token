<?php


	require_once(__DIR__ . '/../bootstrap.php');
	require_once(__DIR__ . '/Identifier_TestCase.php');
	
	
	use LiftKit\Identifier\Identifier;
	
	
	class Identifier_Identifier_Test extends Identifier_TestCase
	{
		
		
		/**
		  * @expectedException \LiftKit\Identifier\Exception\Identifier
		  */
		public function testFailsWithIncorrectSeparator ()
		{
			$identifier = new Identifier('test', '');
		}
		
		
		protected function createIdentifier ($string)
		{
			return new Identifier($string);
		}
	}