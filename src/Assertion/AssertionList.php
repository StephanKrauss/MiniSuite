<?php

namespace MiniSuite\Assertion;

use Exception;

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
    private $value;

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
     * Assert that both values are the same
     *
     * @param mixed $expected
     * @return Assertion
     */
    public function isTheSameAs($expected) : Assertion
    {
        if ($this->value !== $expected) {
            new FailedAssertion('Both values should be the same', [
                'value' => $this->value,
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
            new FailedAssertion('Both values should not be the same', [
                'value' => $this->value,
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
            new FailedAssertion('Should be equal', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be equal', [
                'value' => $this->value,
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
            new FailedAssertion('Should be less', [
                'value' => $this->value,
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
            new FailedAssertion('Should be less or equal', [
                'value' => $this->value,
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
            new FailedAssertion('Should be greater', [
                'value' => $this->value,
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
            new FailedAssertion('Should be greater or equal', [
                'value' => $this->value,
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
            new FailedAssertion('Should be between', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be between', [
                'value' => $this->value,
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
            new FailedAssertion('Should be null', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be null', [
                'value' => $this->value,
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
            new FailedAssertion('Should be a boolean', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be a boolean', [
                'value' => $this->value,
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
            new FailedAssertion('Should be an integer', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be an integer', [
                'value' => $this->value,
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
            new FailedAssertion('Should be a float number', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be a float number', [
                'value' => $this->value,
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
            new FailedAssertion('Should be a string', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be a string', [
                'value' => $this->value,
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
            new FailedAssertion('Should be an array', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be an array', [
                'value' => $this->value,
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
            new FailedAssertion('Should be an object', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be an object', [
                'value' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is a resource
     *
     * @param string|null $type
     * @return Assertion
     */
    public function isResource(?string $type) : Assertion
    {
        if (is_resource($this->value)) {
            if($type !== null && get_resource_type($resource) !== $type) {
                new FailedAssertion("Should be a resource of the given type", [
                    'current value' => $this->value,
                    'current type' => get_resource_type($resource),
                    'expected type' => $type,
                ]);
            }
        }
        else {
            new FailedAssertion('Should be a resource', [
                'value' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that value is not a resource
     *
     * @param string|null $type
     * @return Assertion
     */
    public function isNotResource(?string $type) : Assertion
    {
        if (is_resource($this->value)) {
            if ($type === null) {
                new FailedAssertion('Should not be a resource', [
                    'value' => $this->value,
                ]);
            }
            else if(get_resource_type($resource) !== $type) {
                new FailedAssertion("Should not be a resource of the given type", [
                    'value' => $this->value,
                    'type' => $type,
                ]);
            }
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
            new FailedAssertion('Should be a callable', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be a callable', [
                'value' => $this->value,
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
            new FailedAssertion('Should be iterable', [
                'value' => $this->value,
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
            new FailedAssertion('Should not be iterable', [
                'value' => $this->value,
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
            new FailedAssertion("Should be an instance of '$class'", [
                'value' => $this->value,
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
            new FailedAssertion("Should not be an instance of '$class'", [
                'value' => $this->value,
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
            new FailedAssertion("Should extend '$class'", [
                'value' => $this->value,
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
            new FailedAssertion("Should not extend '$class'", [
                'value' => $this->value,
            ]);
        }
        return $this;
    }

    /**
     * Assert that an exception has been thrown
     *
     * @param string|null $type
     * @return Assertion
     */
    public function throws(?string $type = null) : Assertion
    {
        $this->isCallable();
        try {
            call_user_func($this->value);
        } catch (Exception $e) {
            if ($type !== null && $e instanceof $type === false) {
                new FailedAssertion("Should have thrown a '$type' exception", [
                    'exception' => $e,
                ]);
            }
        }
        new FailedAssertion('Should have thrown an exception');
        return $this;
    }

    /**
     * Assert that no exception has been thrown
     *
     * @param string|null $type
     * @return Assertion
     */
    public function doesNotThrow(?string $type = null) : Assertion
    {
        $this->isCallable();
        try {
            call_user_func($this->value);
        } catch (Exception $e) {
            if ($type === null) {
                new FailedAssertion('Should not have thrown an exception', [
                    'exception' => $e,
                ]);
            } elseif ($e instanceof $type) {
                new FailedAssertion("Should not have thrown a '$type' exception", [
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
            new FailedAssertion('The array element should be defined', [
                'value' => $this->value,
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
            new FailedAssertion('The array element should not be defined', [
                'value' => $this->value,
                'array' => $array,
                'index' => $index,
            ]);
        }
        return $this;
    }
}
