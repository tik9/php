<?php
namespace Example;

include_once('EnhanceTestFramework.php');
// Include your classes and test fixtures - they can be in separate files, just use include() statements for them!

class ExampleClass
{
    public function addTwoNumbers($a, $b)
    {
        return $a + $b;
    }
}
// Naming: By using "extends \Enhance\TestFixture" you signal that the public methods in // your class are tests.

class ExampleClassTests extends \Enhance\TestFixture
{
    private $target;

    public function setUp()
    {
        $this->target = \Enhance\Core::getCodeCoverageWrapper('Example\ExampleClass');
    }
    public function addTwoNumbersWith3and2Expect5()
    {
        $result = $this->target->addTwoNumbers(3, 2);
        \Enhance\Assert::areIdentical(5, $result);
    }
}

\codespy\Analyzer::addFileToSpy('enhance_test.php');

Enhance\Core::runTests();
