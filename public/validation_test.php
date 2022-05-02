<?php

class Validation_test extends \Enhance\TestFixture
{
    public function setUp()
    {
        $this->val = new Validation();
    }

    public function validates_a_good_email_address()
    {
        $result = $this->val->validate_email("john@doe.com");
        \Enhance\Assert::isTrue($result);
    }
    public function reject_bad_email_addresses()
    {
        $val_wrapper = \Enhance\Core::getCodeCoverageWrapper('Validation');
        $val_email = $this->get_scenario('validate_email');
        $addresses = array("john", "jo!hn@doe.com", "john@doe.", "jo*hn@doe.com");

        foreach ($addresses as $addr) {
            $val_email->with($addr)->expect(false);
        }
        $val_email->verifyExpectations();
    }
}
