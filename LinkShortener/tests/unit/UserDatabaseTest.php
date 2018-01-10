<?php

require '../../app/dao/UserDatabase.php';

use PHPUnit\Framework\TestCase;


//Installation of PHPUnit 6.5.5 is needed to run the unit tests

class UserDatabaseTest extends TestCase {
    
    
    /** @test */
    public function validateInputTest(){
        
        $actual = UserDatabase::validateInput("<script>location.href('http://www.hacked.com')</script>");
        
        $expected = "&lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt;";
        
        $this->assertEquals($expected, $actual);
        
    }
    
    
    /** @test */
    public function addUserTest(){
        
        $this->assertTrue(true); //include logic for unit test here
    }
    
    
    /** @test */
    public function checkValidUserTest(){
        
        $this->assertTrue(true); //include logic for unit test here
        
    }
    
    
    /** @test */
    public function deleteUserTest(){
        
        $this->assertTrue(true); //include logic for unit test here
        
    }
    
}

?>