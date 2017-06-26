<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 25/06/2017
 * Time: 20:01
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Statistic
 *
 * @package AppBundle\Entity
 * @ORM\Table(name="statistics")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatisticRepository")
 */
class Statistic
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var PlayerCharacter
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PlayerCharacter", inversedBy="statistics")
     * @ORM\JoinColumn(nullable=true)
     */
    private $playerCharacter;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_max", type="boolean")
     */
    private $hasMax;

    /**
     * @var float
     *
     * @ORM\Column(name="max_value", type="float", nullable=true)
     */
    private $maxValue;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game", inversedBy="statistics")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    private $game;

    public function __construct($name, bool $hasMax = false)
    {
        $this->name = $name;
        $this->hasMax = $hasMax;
        $this->value = 0;
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
     * @return Statistic
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
     * Set value
     *
     * @param float $value
     *
     * @return Statistic
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set hasMax
     *
     * @param boolean $hasMax
     *
     * @return Statistic
     */
    public function setHasMax($hasMax)
    {
        $this->hasMax = $hasMax;

        return $this;
    }

    /**
     * Get hasMax
     *
     * @return boolean
     */
    public function getHasMax()
    {
        return $this->hasMax;
    }

    /**
     * Set maxValue
     *
     * @param float $maxValue
     *
     * @return Statistic
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;

        return $this;
    }

    /**
     * Get maxValue
     *
     * @return float
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * Set playerCharacter
     *
     * @param \AppBundle\Entity\PlayerCharacter $playerCharacter
     *
     * @return Statistic
     */
    public function setPlayerCharacter(\AppBundle\Entity\PlayerCharacter $playerCharacter = null)
    {
        $this->playerCharacter = $playerCharacter;

        return $this;
    }

    /**
     * Get playerCharacter
     *
     * @return \AppBundle\Entity\PlayerCharacter
     */
    public function getPlayerCharacter()
    {
        return $this->playerCharacter;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Statistic
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
}
