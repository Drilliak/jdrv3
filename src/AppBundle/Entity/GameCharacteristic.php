<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 27/06/2017
 * Time: 19:59
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class GameCharacteristic
 *
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="game_characteristics")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameCharacteristicRepository")
 */
class GameCharacteristic
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Game
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game", inversedBy="gameCharacteristics")
     */
    private $game;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Characteristic", mappedBy="gameCharacteristic", cascade={"remove"})
     */
    private $characteristics;


    public function __construct($name){
        $this->characteristics = new ArrayCollection();
        $this->name = $name;
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return GameCharacteristic
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return GameCharacteristic
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Add characteristic
     *
     * @param \AppBundle\Entity\Characteristic $characteristic
     *
     * @return GameCharacteristic
     */
    public function addCharacteristic(\AppBundle\Entity\Characteristic $characteristic)
    {
        $this->characteristics[] = $characteristic;
        $characteristic->setGameCharacteristic($this);
        return $this;
    }

    /**
     * Remove characteristic
     *
     * @param \AppBundle\Entity\Characteristic $characteristic
     */
    public function removeCharacteristic(\AppBundle\Entity\Characteristic $characteristic)
    {
        $this->characteristics->removeElement($characteristic);
    }

    /**
     * Get characteristics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCharacteristics()
    {
        return $this->characteristics;
    }
}
