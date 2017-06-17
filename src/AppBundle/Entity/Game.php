<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Game
 *
 * @ORM\Table(name="games")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Characteristic", mappedBy="game", cascade={"persist"})
     */
    private $allowedCharacteristics;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gameMaster;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Player", mappedBy="game")
     */
    private $players;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->allowedCharacteristics = new ArrayCollection();
        $this->players = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getGameMaster(): User
    {
        return $this->gameMaster;
    }

    public function setGameMaster(User $gameMaster)
    {
        $this->gameMaster = $gameMaster;
    }

    /**
     * Set allowedCharacteristics
     *
     * @param array $allowedCharacteristics
     *
     * @return Game
     */
    public function setAllowedCharacteristics($allowedCharacteristics)
    {
        $this->allowedCharacteristics = $allowedCharacteristics;

        return $this;
    }

    /**
     * Get allowedCharacteristics
     *
     * @return array
     */
    public function getAllowedCharacteristics()
    {
        return $this->allowedCharacteristics;
    }


    /**
     * Add allowedCharacteristic
     *
     * @param \AppBundle\Entity\Characteristic $allowedCharacteristic
     *
     * @return Game
     */
    public function addAllowedCharacteristic(Characteristic $allowedCharacteristic)
    {
        $this->allowedCharacteristics[] = $allowedCharacteristic;

        $allowedCharacteristic->setGame($this);

        return $this;
    }

    /**
     * Remove allowedCharacteristic
     *
     * @param \AppBundle\Entity\Characteristic $allowedCharacteristic
     */
    public function removeAllowedCharacteristic(Characteristic $allowedCharacteristic)
    {
        $this->allowedCharacteristics->removeElement($allowedCharacteristic);
    }



    /**
     * Add player
     *
     * @param \AppBundle\Entity\Player $player
     *
     * @return Game
     */
    public function addPlayer(\AppBundle\Entity\Player $player)
    {
        $this->players[] = $player;
        $player->setGame($this);

        return $this;
    }

    /**
     * Remove player
     *
     * @param \AppBundle\Entity\Player $player
     */
    public function removePlayer(\AppBundle\Entity\Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Game
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
