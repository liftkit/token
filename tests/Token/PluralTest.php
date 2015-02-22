<?php

	namespace LiftKit\Tests\Token;
	
	
	use LiftKit\Token\Plural as PluralIdentifier;
	use PHPUnit_Framework_TestCase;
	
	
	class PluralTest extends PHPUnit_Framework_TestCase
	{
		
		
		public function testPlural ()
		{
			$identifier = new PluralIdentifier('thing', 'things');
			
			$this->assertEquals($identifier, 'thing');
			$this->assertEquals($identifier->plural(), 'things');
			$this->assertEquals($identifier->plural()->uppercase(), 'THINGS');
		}
		
		
		/**
		  * @expectedException \LiftKit\Token\Exception\Token
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