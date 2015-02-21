<?php


	namespace LiftKit\Identifier;
	
	use LiftKit\Identifier\Exception\Identifier as IdentifierException;
	
	
	class Identifier 
	{
		protected $identifier;
		protected $separator;
		
		
		public function __construct ($identifier, $separator = ' ')
		{
			$this->identifier = $identifier;
			
			if ($separator && is_string($separator)) {
				$this->separator = $separator;
			} else {
				throw new IdentifierException('Invalid separator error.');
			}
		}
		
		
		public function toString ()
		{
			return $this->identifier;
		}
		
		
		public function __toString ()
		{
			return $this->toString();
		}
		
		
		public function capitalized ()
		{
			return new self(
				$this->transformCapitalized($this->identifier),
				$this->separator
			);
		}
		
		
		public function uppercase ()
		{
			return new self(
				$this->transformUppercase($this->identifier),
				$this->separator
			);
		}
		
		
		public function lowercase ()
		{
			return new self(
				$this->transformLowercase($this->identifier),
				$this->separator
			);
		}
		
		
		public function camelcase ()
		{
			return new self($this->transformCamelcase($this->identifier));
		}
		
		
		public function join ($separator = '')
		{
			return new self(
				$this->transformJoin($this->identifier, $separator),
				$separator ?: ' '
			);
		}
		
		
		public function capitalizedCamelcase ()
		{
			return $this->camelcase()->capitalized();
		}
		
		
		public function dashed ()
		{
			return $this->join('-');
		}
		
		
		public function underscored ()
		{
			return $this->join('_');
		}
		
		
		protected function transformCapitalized ($string)
		{
			if (is_null($string)) {
				return null;
				
			} else {
				$string = str_replace($this->separator, ' ', $string);
				$string = ucwords($string);
				$string = str_replace(' ', $this->separator, $string);
				
				return $string;
			}
		}
		
		
		protected function transformUppercase ($string)
		{
			return strtoupper($string);
		}
		
		
		protected function transformLowercase ($string)
		{
			return strtolower($string);
		}
		
		
		protected function transformCamelcase ($string)
		{
			$string = $this->transformCapitalized($string);
			$string = $this->transformJoin($string, '');
			$string = lcfirst($string);
			
			return $string;
		}
		
		
		protected function transformJoin ($string, $separator)
		{
			$split = explode($this->separator, $string);
			
			return implode($separator, $split);
		}
	}