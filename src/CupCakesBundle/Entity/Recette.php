<?php
/**
 * Created by PhpStorm.
 * User: SouhaiKr
 * Date: 13/02/2018
 * Time: 20:25
 */

namespace CupCakesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="CupCakesBundle\Repository\RecetteRepository")
 */
class Recette
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nom;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string",length=255)
     */
     private $categorie;


    /**
     * @ORM\Column(type="integer")
     */
    private $temps_preparation;
    /**
     * @ORM\Column(type="integer")
     */
    private $temps_cuisson;
    /**
     * @ORM\Column(type="integer")
     */
    private $nb_personnes;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $difficulte;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="CupCakesBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTempsPreparation()
    {
        return $this->temps_preparation;
    }

    /**
     * @param mixed $temps_preparation
     */
    public function setTempsPreparation($temps_preparation)
    {
        $this->temps_preparation = $temps_preparation;
    }

    /**
     * @return mixed
     */
    public function getTempsCuisson()
    {
        return $this->temps_cuisson;
    }

    /**
     * @param mixed $temps_cuisson
     */
    public function setTempsCuisson($temps_cuisson)
    {
        $this->temps_cuisson = $temps_cuisson;
    }

    /**
     * @return mixed
     */
    public function getNbPersonnes()
    {
        return $this->nb_personnes;
    }

    /**
     * @param mixed $nb_personnes
     */
    public function setNbPersonnes($nb_personnes)
    {
        $this->nb_personnes = $nb_personnes;
    }



    /**
     * @return mixed
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * @param mixed $difficulte
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


    /**
     * @ORM\OneToMany(targetEntity="CupCakesBundle\Entity\Etape", cascade={"persist"},mappedBy="recette")
     */
    protected $etapes ;


    public function __construct()
    {
        $this->etapes = new ArrayCollection();
        $this->ingredients = new ArrayCollection();

    }





    /**
     * Add etape
     *
     * @param \CupCakesBundle\Entity\Etape $etape
     *
     * @return Recette
     */
    public function addEtape(\CupCakesBundle\Entity\Etape $etape)
    {
        $this->etapes[] = $etape;

        return $this;
    }

    /**
     * Remove etape
     *
     * @param \CupCakesBundle\Entity\Etape $etape
     */
    public function removeEtape(\CupCakesBundle\Entity\Etape $etape)
    {
        $this->etapes->removeElement($etape);
    }

    /**
     * Get etapes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtapes()
    {
        return $this->etapes;
    }

    /**
     * @param mixed $etapes
     */
    public function setEtapes($etapes)
    {
        $this->etapes = $etapes;
    }

    /**
     * @ORM\OneToMany(targetEntity="CupCakesBundle\Entity\Ingredient", cascade={"persist"},mappedBy="recette")
     */
    protected $ingredients ;





    /**
     * Add ingredient
     *
     * @param \CupCakesBundle\Entity\Ingredient $ingredient
     *
     * @return Recette
     */
    public function addIngredient(\CupCakesBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \CupCakesBundle\Entity\Ingredient $ingredient
     */
    public function removeIngredient(\CupCakesBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }



    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Recette
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
