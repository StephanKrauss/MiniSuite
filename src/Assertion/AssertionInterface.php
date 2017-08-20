<?php

namespace MiniSuite\Assertion;

/**
 * Assertion
 */
interface AssertionInterface
{
    /**
     * Assert that both values are the same
     *
     * @param mixed $expected
     * @return MiniSuite\Assertion\Assertion
     */
    public function isTheSameAs($expected) : Assertion;

    /**
     * Assert that both values are not the same
     *
     * @param mixed $expected
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotTheSameAs($expected): Assertion;

    /**
     * Assert that both values are equal
     *
     * @param mixed $expected
     * @return MiniSuite\Assertion\Assertion
     */
    public function equals(int $expected): Assertion;

    /**
     * Assert that both values are not equal
     *
     * @param mixed $expected
     * @return MiniSuite\Assertion\Assertion
     */
    public function doesNotEqual(int $expected): Assertion;

    /**
     * Assert that value is less than the expected one
     *
     * @param int $expected
     * @return MiniSuite\Assertion\Assertion
     */
    public function isLessThan(int $expected): Assertion;

    /**
     * Assert that value is less than or equal the expected one
     *
     * @param int $expected
     * @return MiniSuite\Assertion\Assertion
     */
    public function isLessThanOrEqual(int $expected): Assertion;

    /**
     * Assert that value is greather than the expected one
     *
     * @param int $expected
     * @return MiniSuite\Assertion\Assertion
     */
    public function isGreaterThan(int $expected): Assertion;

    /**
     * Assert that value is greater than or equal the expected one
     *
     * @param int $expected
     * @return MiniSuite\Assertion\Assertion
     */
    public function isGreaterThanOrEqual(int $expected): Assertion;

    /**
     * Assert that value is between two numbers
     *
     * @param int $min
     * @param int $max
     * @param boolean $included
     * @return MiniSuite\Assertion\Assertion
     */
    public function isBetween(int $min, int $max, bool $included = false): Assertion;

    /**
     * Assert that value is not between two numbers
     *
     * @param int $min
     * @param int $max
     * @param boolean $included
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotBetween(int $min, int $max, bool $included = false): Assertion;

    /**
     * Assert that value is null
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNull(): Assertion;

    /**
     * Assert that value is not null
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotNull(): Assertion;

    /**
     * Assert that value is a boolean
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isBoolean(): Assertion;

    /**
     * Assert that value is not a boolean
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotBoolean(): Assertion;

    /**
     * Assert that value is an integer
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isInteger(): Assertion;

    /**
     * Assert that value is not an integer
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotInteger(): Assertion;

    /**
     * Assert that value is a float number
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isFloat(): Assertion;

    /**
     * Assert that value is not a float number
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotFloat(): Assertion;

    /**
     * Assert that value is a string
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isString(): Assertion;

    /**
     * Assert that value is not a string
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotString(): Assertion;

    /**
     * Assert that value is an array
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isArray(): Assertion;

    /**
     * Assert that value is not an array
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotArray(): Assertion;

    /**
     * Assert that value is an object
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isObject(): Assertion;

    /**
     * Assert that value is not an object
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotObject(): Assertion;

    /**
     * Assert that value is a resource
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isResource(): Assertion;

    /**
     * Assert that value is not a resource
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotResource(): Assertion;

    /**
     * Assert that value is a callable
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isCallable(): Assertion;

    /**
     * Assert that value is not a callable
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotCallable(): Assertion;

    /**
     * Assert that value is iterable
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isIterable(): Assertion;

    /**
     * Assert that value is not iterable
     *
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotIterable(): Assertion;

    /**
     * Assert that value is an instance of the given class
     *
     * @param string $class
     * @return MiniSuite\Assertion\Assertion
     */
    public function isInstanceOf(string $class): Assertion;

    /**
     * Assert that value is not an instance of the given class
     *
     * @param string $class
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotInstanceOf(string $class): Assertion;

    /**
     * Assert that value extends the given class
     *
     * @param string $class
     * @return MiniSuite\Assertion\Assertion
     */
    public function extends(string $class): Assertion;

    /**
     * Assert that value does not extend the given class
     *
     * @param string $class
     * @return MiniSuite\Assertion\Assertion
     */
    public function doesNotExtend(string $class): Assertion;

    /**
     * Assert that an exception has been thrown
     *
     * @param string|null $name
     * @return MiniSuite\Assertion\Assertion
     */
    public function throws(?string $name = null): Assertion;

    /**
     * Assert that no exception has been thrown
     *
     * @param string|null $name
     * @return MiniSuite\Assertion\Assertion
     */
    public function doesNotThrow(?string $name = null): Assertion;

    /**
     * Assert that an array element is defined
     *
     * @param array $array
     * @param string $index
     * @return MiniSuite\Assertion\Assertion
     */
    public function isDefined(array $array, string $index): Assertion;

    /**
     * Assert that an array element is not defined
     *
     * @param array $array
     * @param string $index
     * @return MiniSuite\Assertion\Assertion
     */
    public function isNotDefined(array $array, string $index): Assertion;
}
