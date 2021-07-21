<?php

namespace App\Tests;

use App\Entity\Actualite;
use DateTime;
use PHPUnit\Framework\TestCase;

class ActualiteUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $actualite = new Actualite();
        $datetime = new DateTime();

        $actualite->setTitre('titre')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setFile('file');
    

        $this->assertTrue($actualite->getTitre() === 'titre');
        $this->assertTrue($actualite->getCreatedAt() === $datetime);
        $this->assertTrue($actualite->getContenu() === 'contenu');
        $this->assertTrue($actualite->getSlug() === 'slug');
        $this->assertTrue($actualite->getFile() === 'file');

        
    }

    public function testIsFalse()
    {
        $actualite = new Actualite();
        $datetime = new DateTime();

        $actualite->setTitre('titre')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setFile('file');
    

        $this->assertFalse($actualite->getTitre() === 'false');
        $this->assertFalse($actualite->getCreatedAt() === new Datetime());
        $this->assertFalse($actualite->getContenu() === 'false');
        $this->assertFalse($actualite->getSlug() === 'false');
        $this->assertFalse($actualite->getFile() === 'false');

        
    }

    public function testIsEmpty()
    {
        $actualite = new Actualite();

        $this->assertEmpty($actualite->getTitre());
        $this->assertEmpty($actualite->getCreatedAt());
        $this->assertEmpty($actualite->getContenu());
        $this->assertEmpty($actualite->getSlug());
        $this->assertEmpty($actualite->getFile());

        
    }
}
