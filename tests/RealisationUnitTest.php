<?php

namespace App\Tests;

use App\Entity\Realisation;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class RealisationUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $realisation = new Realisation();
        $datetime = new DateTime();
        $user = new User();

        $realisation->setNom('nom')
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setSlug('slug')
            ->setFile('file')
            ->setUser($user);
            
            $this->assertTrue($realisation->getNom() === 'nom');
            $this->assertTrue($realisation->getDateRealisation() === $datetime);
            $this->assertTrue($realisation->getCreatedAt() === $datetime);
            $this->assertTrue($realisation->getDescription() === 'description');
            $this->assertTrue($realisation->getSlug() === 'slug');
            $this->assertTrue($realisation->getFile() === 'file');
            $this->assertTrue($realisation->getUser() === $user);
    }

    public function testIsFalse()
    {
        $realisation = new Realisation();
        $datetime = new DateTime();
        $user = new User();

        $realisation->setNom('nom')
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setSlug('slug')
            ->setFile('file')
            ->setUser($user);
            
            $this->assertFalse($realisation->getNom() === 'false');
            $this->assertFalse($realisation->getDateRealisation() === new DateTime());
            $this->assertFalse($realisation->getCreatedAt() === new DateTime());
            $this->assertFalse($realisation->getDescription() === 'false');
            $this->assertFalse($realisation->getSlug() === 'false');
            $this->assertFalse($realisation->getFile() === 'false');
            $this->assertFalse($realisation->getUser() === new User());
    }

    public function testIsEmpty()
    {
        $realisation = new realisation();          

            $this->assertEmpty($realisation->getNom());
            $this->assertEmpty($realisation->getDateRealisation());
            $this->assertEmpty($realisation->getCreatedAt());
            $this->assertEmpty($realisation->getDescription());
            $this->assertEmpty($realisation->getSlug());
            $this->assertEmpty($realisation->getFile());
            $this->assertEmpty($realisation->getUser());
    }
    
}
