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
			return $this->constructTransformed(
				function ($string)
				{
					return $this->transformCapitalized($string);
				}
			);
		}
		
		
		public function uppercase ()
		{
			return $this->constructTransformed(
				function ($string)
				{
					return $this->transformUppercase($string);
				}
			);
		}
		
		
		public function lowercase ()
		{
			return $this->constructTransformed(
				function ($string)
				{
					return $this->transformLowercase($string);
				}
			);
		}
		
		
		public function camelcase ()
		{
			return $this->constructTransformed(
				function ($string)
				{
					return $this->transformCamelcase($string);
				}
			);
		}
		
		
		public function join ($separator = '')
		{
			return $this->constructTransformed(
				function ($string) use ($separator) 
				{
					return $this->transformJoin($string, $separator);
				},
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
		
		
		protected function constructTransformed ($callback, $separator = null)
		{
			return new self(
				$callback($this->identifier),
				is_null($separator) ? $this->separator : $separator
			);
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