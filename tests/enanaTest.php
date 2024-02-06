<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        #Se probará la creación de enanas vivas, muertas y en limbo y se comprobará tanto la vida como el estado
        $enana1 = new Enana("Eanana1",10);
        $enana2 = new Enana("Eanana2",0);
        $enana3 = new Enana("Eanana3",-5);
        $this->assertEquals("viva", $enana1->getSituacion());
        $this->assertEquals("limbo", $enana2->getSituacion());
        $this->assertEquals("muerta", $enana3->getSituacion());
    }
    public function testHeridaLeveVive() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $enana1 = new Enana("Eanana1",11);
        $enana1->heridaLeve();
        $this->assertEquals("viva", $enana1->getSituacion());
    }

    public function testHeridaLeveMuere() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $enana1 = new Enana("Eanana1",9);
        $enana1->heridaLeve();
        $this->assertEquals(-1, $enana1->getPuntosVida());
        $this->assertEquals("muerta", $enana1->getSituacion());
    }

    public function testHeridaGrave() {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        $enana1 = new Enana("Eanana1",9);
        $enana1->heridaGrave();
        $this->assertEquals(0, $enana1->getPuntosVida());
        $this->assertEquals("limbo", $enana1->getSituacion());
    }
    
    public function testPocimaRevive() {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva

    }

    public function testPocimaNoRevive() {
        #Se probará el efecto de administrar una pócima a una Enana en el libo
        #Se tendrá que probar que la vida y situación no ha cambiado

    }

    public function testPocimaExtraLimbo() {
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

    }
}
?>