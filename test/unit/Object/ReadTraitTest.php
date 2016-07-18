<?php

namespace Dhii\Test\Data\Object;

use Dhii\Data\Object\ReadTrait as TestSubject;

/**
 * Test ReadTrait.
 *
 * @since [*next-version*]
 */
class ReadTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @since [*next-version*]
     *
     * @param array $data The data to populate the trait with.
     *
     * @return object The trait mock.
     */
    public function createSubject($data = [])
    {
        $subject = $this->getMockForTrait(TestSubject::class);
        $subject->method('_getData')->willReturn($data);

        return $subject;
    }

    /**
     * Tests that all data can be retrieved.
     *
     * @since [*next-version*]
     */
    public function testGetDataAll()
    {
        $token = 'SDiu09qd(u230Q(#';
        $key = 'my_key';
        $data = [$key => $token];
        $subject = $this->createSubject($data);
        $this->assertSame($data, $subject->getData(), 'All data must be returned in the form of an array.');
    }

    /**
     * Tests that data for a key can be retrieved.
     *
     * @since [*next-version*]
     */
    public function testGetDataOne()
    {
        $token = 'Oh!(#*D1dQF!';
        $key = 'my_key';
        $data = [$key => $token];
        $subject = $this->createSubject($data);
        $this->assertSame($token, $subject->getData($key), 'Correct data must be returned for key');
    }

    /**
     * Tests that the default value will be returned when key not found.
     *
     * @since [*next-version*]
     */
    public function testGetDataDefault()
    {
        $token = '*h&#10d)';
        $key = 'my_key';
        $data = [$key => 'This is not going to be retrieved'];
        $subject = $this->createSubject($data);
        $this->assertSame($token, $subject->getData('non_existent_key', $token), 'Default value must be returned');
    }

    /**
     * Tests that existing data is determined to exist.
     *
     * @since [*next-version*]
     */
    public function testHasDataExisting()
    {
        $token = 'Does not matter what this is';
        $key = 'my_key';
        $data = [$key => $token];
        $subject = $this->createSubject($data);
        $this->assertTrue($subject->hasData($key), 'Data must be determined to exist');
    }

    /**
     * Tests that non-existing data is determined to not exist.
     *
     * @since [*next-version*]
     */
    public function testHasDataNonExisting()
    {
        $token = 'Does not matter what this is';
        $key = 'my_key';
        $data = ['another_key' => $token];
        $subject = $this->createSubject($data);
        $this->assertFalse($subject->hasData($key), 'Data must be determined to not exist');
    }

    /**
     * Tests that data is determined to be non-empty.
     *
     * @since [*next-version*]
     */
    public function testHasDataAllExisting()
    {
        $token = 'Does not matter what this is';
        $key = 'my_key';
        $data = [$key => $token];
        $subject = $this->createSubject($data);
        $this->assertTrue($subject->hasData(), 'Data must be determined to be non-empty');
    }

    /**
     * Tests that data is determined to be empty.
     *
     * @since [*next-version*]
     */
    public function testHasDataAllNonExisting()
    {
        $data = [];
        $subject = $this->createSubject($data);
        $this->assertFalse($subject->hasData(), 'Data must be determined to be empty');
    }
}
