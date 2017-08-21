<?php

namespace MiniSuite\Assertion;

use AssertionError;
use Exception;
use MiniSuite\Message\FailMessage;
use MiniSuite\Value\FormattedValue;

/**
 * Assertion
 */
final class Assertion implements AssertionInterface
{
    /**
     * The value to assert
     *
     * @var mixed
     */
    protected $value;

    /**
     * Constructor
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Throw an assertion error
     *
     * @param string $message
     * @param array $dump
     * @return void
     */
    protected function _throwAssertionError(string $message, array $dump = []) : void
    {
        throw new AssertionError(
            (string) new FailMessage(
                $message,
                array_map(function ($value) {
                    return new FormattedValue($value);
                }, $dump)
            )
        );
    }

    /**
     * Assert that both values are the same
     *
     * @param mixed $expected
     * @return Assertion
     */
    public function isTheSameAs($expected) : Assertion
    {
        if ($this->value !== $expected) {
            $this->_throwAssertionError('Both values should be the same', [
                'current' => $this->value,
                'expected' => $expected,
            ]);
        }
        return $this;
    }

    /**
     * Assert that both values are not the same
     *
     * @param mixed $expected
     * @return Assertion
     */
    public function isNotTheSameAs($expected) : Assertion
    {
        if ($this->value === $expected) {
            $this->_throwAssertionError('Both values should not be the same', [
                'current' => $this->value,
                'expected' => $expected,
            ]);
        }
        return $this;
    }

    /**
     * Assert that both values are equal
     *
     * @param mixed $expected
     * @return Assertion
     */
    public function equals(int $expected) : Assertion
    {
        if ($this->value !== $expected) {
            $this->_throwAssertionError('Should be equal', [
                'current' => $this->value,
                'expected' => $expected,
            ]);
        }
        return $this;
    }

    /**
     * Assert that both values are not equal
     *
     * @param mixed $expected
     * @return Assertion
     */
    public function doesNotEqual(int $expected) : Assertion
    {
        if ($this->value === $expected) {
            $this->_throwAssertionError('Should not be equal', [
                'current' => $this->value,
                'expected' => $expected,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is less than the expected one
     *
     * @param int $expected
     * @return Assertion
     */
    public function isLessThan(int $expected) : Assertion
    {
        if ($this->value >= $expected) {
            $this->_throwAssertionError('Should be less', [
                'current' => $this->value,
                'expected' => $expected,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is less than or equal the expected one
     *
     * @param int $expected
     * @return Assertion
     */
    public function isLessThanOrEqual(int $expected) : Assertion
    {
        if ($this->value > $expected) {
            $this->_throwAssertionError('Should be less or equal', [
                'current' => $this->value,
                'expected' => $expected,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is greather than the expected one
     *
     * @param int $expected
     * @return Assertion
     */
    public function isGreaterThan(int $expected) : Assertion
    {
        if ($this->value <= $expected) {
            $this->_throwAssertionError('Should be greater', [
                'current' => $this->value,
                'expected' => $expected,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is greater than or equal the expected one
     *
     * @param int $expected
     * @return Assertion
     */
    public function isGreaterThanOrEqual(int $expected) : Assertion
    {
        if ($this->value < $expected) {
            $this->_throwAssertionError('Should be greater or equal', [
                'current' => $this->value,
                'expected' => $expected,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is between two numbers
     *
     * @param int $min
     * @param int $max
     * @param boolean $included
     * @return Assertion
     */
    public function isBetween(int $min, int $max, bool $included = false) : Assertion
    {
        if (
            (!$included && ($this->value < $min || $this->value > $max)) ||
            ($included && ($this->value <= $min || $this->value >= $max))
         ) {
            $this->_throwAssertionError('Should be between', [
                'current' => $this->value,
                'min' => $min,
                'max' => $max,
                'included' => $included,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not between two numbers
     *
     * @param int $min
     * @param int $max
     * @param boolean $included
     * @return Assertion
     */
    public function isNotBetween(int $min, int $max, bool $included = false) : Assertion
    {
        if (
            (!$included && ($this->value > $min || $this->value < $max)) ||
            ($included && ($this->value >= $min || $this->value <= $max))
         ) {
            $this->_throwAssertionError('Should not be between', [
                'current' => $this->value,
                'min' => $min,
                'max' => $max,
                'included' => $included,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is null
     *
     * @return Assertion
     */
    public function isNull() : Assertion
    {
        if ($this->value !== null) {
            $this->_throwAssertionError('Should be null', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not null
     *
     * @return Assertion
     */
    public function isNotNull() : Assertion
    {
        if ($this->value === null) {
            $this->_throwAssertionError('Should not be null', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is a boolean
     *
     * @return Assertion
     */
    public function isBoolean() : Assertion
    {
        if (!is_bool($this->value)) {
            $this->_throwAssertionError('Should be a boolean', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not a boolean
     *
     * @return Assertion
     */
    public function isNotBoolean() : Assertion
    {
        if (is_bool($this->value)) {
            $this->_throwAssertionError('Should not be a boolean', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is an integer
     *
     * @return Assertion
     */
    public function isInteger() : Assertion
    {
        if (!is_int($this->value)) {
            $this->_throwAssertionError('Should be an integer', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not an integer
     *
     * @return Assertion
     */
    public function isNotInteger() : Assertion
    {
        if (is_int($this->value)) {
            $this->_throwAssertionError('Should not be an integer', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is a float number
     *
     * @return Assertion
     */
    public function isFloat() : Assertion
    {
        if (!is_float($this->value)) {
            $this->_throwAssertionError('Should be a float number', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not a float number
     *
     * @return Assertion
     */
    public function isNotFloat() : Assertion
    {
        if (is_float($this->value)) {
            $this->_throwAssertionError('Should not be a float number', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is a string
     *
     * @return Assertion
     */
    public function isString() : Assertion
    {
        if (!is_string($value)) {
            $this->_throwAssertionError('Should be a string', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not a string
     *
     * @return Assertion
     */
    public function isNotString() : Assertion
    {
        if (is_string($value)) {
            $this->_throwAssertionError('Should not be a string', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is an array
     *
     * @return Assertion
     */
    public function isArray() : Assertion
    {
        if (!is_array($this->value)) {
            $this->_throwAssertionError('Should be an array', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not an array
     *
     * @return Assertion
     */
    public function isNotArray() : Assertion
    {
        if (is_array($this->value)) {
            $this->_throwAssertionError('Should not be an array', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is an object
     *
     * @return Assertion
     */
    public function isObject() : Assertion
    {
        if (!is_object($this->value)) {
            $this->_throwAssertionError('Should be an object', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not an object
     *
     * @return Assertion
     */
    public function isNotObject() : Assertion
    {
        if (is_object($this->value)) {
            $this->_throwAssertionError('Should not be an object', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is a resource
     *
     * @return Assertion
     */
    public function isResource() : Assertion
    {
        if (!is_resource($this->value)) {
            $this->_throwAssertionError('Should be a resource', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not a resource
     *
     * @return Assertion
     */
    public function isNotResource() : Assertion
    {
        if (is_resource($this->value)) {
            $this->_throwAssertionError('Should not be a resource', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is a callable
     *
     * @return Assertion
     */
    public function isCallable() : Assertion
    {
        if (!is_callable($this->value)) {
            $this->_throwAssertionError('Should be a callable', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not a callable
     *
     * @return Assertion
     */
    public function isNotCallable() : Assertion
    {
        if (is_callable($this->value)) {
            $this->_throwAssertionError('Should not be a callable', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is iterable
     *
     * @return Assertion
     */
    public function isIterable() : Assertion
    {
        if (!is_iterable($this->value)) {
            $this->_throwAssertionError('Should be iterable', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not iterable
     *
     * @return Assertion
     */
    public function isNotIterable() : Assertion
    {
        if (is_iterable($this->value)) {
            $this->_throwAssertionError('Should not be iterable', [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is an instance of the given class
     *
     * @param string $class
     * @return Assertion
     */
    public function isInstanceOf(string $class) : Assertion
    {
        $this->isObject();
        if (!($this->value instanceof $class)) {
            $this->_throwAssertionError("Should be an instance of '$class'", [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not an instance of the given class
     *
     * @param string $class
     * @return Assertion
     */
    public function isNotInstanceOf(string $class) : Assertion
    {
        $this->isObject();
        if ($this->value instanceof $class) {
            $this->_throwAssertionError("Should not be an instance of '$class'", [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value extends the given class
     *
     * @param string $class
     * @return Assertion
     */
    public function extends(string $class) : Assertion
    {
        $this->isObject();
        if (!is_subclass_of($value, $class)) {
            $this->_throwAssertionError("Should extend '$class'", [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value does not extend the given class
     *
     * @param string $class
     * @return Assertion
     */
    public function doesNotExtend(string $class) : Assertion
    {
        $this->isObject();
        if (is_subclass_of($value, $class)) {
            $this->_throwAssertionError("Should not extend '$class'", [
                'current' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that an exception has been thrown
     *
     * @param string|null $name
     * @return Assertion
     */
    public function throws(?string $name = null) : Assertion
    {
        $this->isCallable();
        try {
            call_user_func($this->value);
        } catch (Exception $e) {
            if ($name !== null && $e instanceof $name === false) {
                $this->_throwAssertionError("Should have thrown a '$name' exception", [
                    'exception' => $e,
                ]);
            }
        }
        $this->_throwAssertionError('Should have thrown an exception');
        return $this;
    }

    /**
     * Assert that no exception has been thrown
     *
     * @param string|null $name
     * @return Assertion
     */
    public function doesNotThrow(?string $name = null) : Assertion
    {
        $this->isCallable();
        try {
            call_user_func($this->value);
        } catch (Exception $e) {
            if ($name === null) {
                $this->_throwAssertionError('Should not have thrown an exception', [
                    'exception' => $e,
                ]);
            } elseif ($e instanceof $name) {
                $this->_throwAssertionError("Should not have thrown a '$name' exception", [
                    'exception' => $e,
                ]);
            }
        }
        return $this;
    }

    /**
     * Assert that an array element is defined
     *
     * @param array $array
     * @param string $index
     * @return Assertion
     */
    public function isDefined(array $array, string $index) : Assertion
    {
        if (!isset($array[$index])) {
            $this->_throwAssertionError('The array element should be defined', [
                'current' => $this->value,
                'array' => $array,
                'index' => $index,
            ]);
        }
        return $this;
    }

    /**
     * Assert that an array element is not defined
     *
     * @param array $array
     * @param string $index
     * @return Assertion
     */
    public function isNotDefined(array $array, string $index) : Assertion
    {
        if (isset($array[$index])) {
            $this->_throwAssertionError('The array element should not be defined', [
                'current' => $this->value,
                'array' => $array,
                'index' => $index,
            ]);
        }
        return $this;
    }
}
