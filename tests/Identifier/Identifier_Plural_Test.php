<?php


	require_once(__DIR__ . '/../bootstrap.php');
	
	
	use LiftKit\Identifier\Plural as PluralIdentifier;
	
	
	class Identifier_Plural_Test extends PHPUnit_Framework_TestCase
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
	}