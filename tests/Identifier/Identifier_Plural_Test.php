<?php


	require_once(__DIR__ . '/../bootstrap.php');
	require_once(__DIR__ . '/Identifier_TestCase.php');
	
	
	use LiftKit\Identifier\Plural as PluralIdentifier;
	
	
	class Identifier_Plural_Test extends Identifier_TestCase
	{
		
		
		public function testPlural ()
		{
			$identifier = new PluralIdentifier('thing', 'things');
			
			$this->assertEquals($identifier, 'thing');
			$this->assertEquals($identifier->plural(), 'things');
			$this->assertEquals($identifier->plural()->uppercase(), 'THINGS');
		}
		
		
		/**
		  * @expectedException \LiftKit\Identifier\Exception\Identifier
		  */
		public function testFailsWithNoPlural ()
		{
			$identifier = new PluralIdentifier('test', null);
		}
		
		
		protected function createIdentifier ($string)
		{
			return new PluralIdentifier($string, 'plural');
		}
	}