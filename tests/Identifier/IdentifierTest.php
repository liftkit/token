<?php
	
	namespace LiftKit\Tests\Identifier;
	
	use LiftKit\Identifier\Identifier;
	use PHPUnit_Framework_TestCase;
	
	
	class IdentifierTest extends PHPUnit_Framework_TestCase
	{
		
		
		/**
		  * @expectedException \LiftKit\Identifier\Exception\Identifier
		  */
		public function testFailsWithIncorrectSeparator ()
		{
			$identifier = new Identifier('test', '');
		}
		
		
		public function testToString ()
		{
			$identifier = $this->createIdentifier('string');
			
			$this->assertEquals($identifier->toString(), 'string');
			$this->assertEquals((string) $identifier, 'string');
		}
		
		
		public function testCapitalized ()
		{
			$identifier = $this->createIdentifier('two words');
			
			$this->assertEquals($identifier->capitalized(), 'Two Words');
		}
		
		
		public function testUppercase ()
		{
			$identifier = $this->createIdentifier('two words');
			
			$this->assertEquals($identifier->uppercase(), 'TWO WORDS');
		}
		
		
		public function testLowercase ()
		{
			$identifier = $this->createIdentifier('TWO WORDS');
			
			$this->assertEquals($identifier->lowercase(), 'two words');
		}
		
		
		public function testCamelcase ()
		{
			$identifier = $this->createIdentifier('two words');
			
			$this->assertEquals($identifier->camelcase(), 'twoWords');
		}
		
		
		public function testJoin ()
		{
			$identifier = $this->createIdentifier('two words');
			
			$this->assertEquals($identifier->join('#'), 'two#words');
		}
		
		
		public function testDashed ()
		{
			$identifier = $this->createIdentifier('Two Words');
			
			$this->assertEquals($identifier->dashed(), 'Two-Words');
		}
		
		
		public function testUnderscored ()
		{
			$identifier = $this->createIdentifier('Two Words');
			
			$this->assertEquals($identifier->underscored(), 'Two_Words');
		}
		
		
		public function testUppercaseUnderscored ()
		{
			$identifier = $this->createIdentifier('Two Words');
			
			$this->assertEquals($identifier->uppercase()->underscored(), 'TWO_WORDS');
		}
		
		
		public function testConvertFromDashesToUnderscored ()
		{
			$identifier = $this->createIdentifier('two words');
			
			$this->assertEquals($identifier->dashed()->underscored(), 'two_words');
		}
		
		
		public function testCapitalizedCamelcase ()
		{
			$identifier = $this->createIdentifier('two words');
			
			$this->assertEquals($identifier->capitalizedCamelcase(), 'TwoWords');
		}
		
		
		protected function createIdentifier ($string)
		{
			return new Identifier($string);
		}
	}