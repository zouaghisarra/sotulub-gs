<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransactionRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=Bien::class, inversedBy="transactions",cascade={"remove"})
     */
    private $bien;

    /**
     * @ORM\ManyToOne(targetEntity=Operation::class, inversedBy="transactions",cascade={"remove"})
     */
    private $operation;

    /**
     * @ORM\Column(type="float")
     */
    private $qte;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     * @Assert\NotEqualTo(propertyPath="magasin_distination")
     */
    private $magasin_source;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     * @Assert\NotEqualTo(propertyPath="magasin_source")
     */
    private $magasin_distination;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_unitaire;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_totale;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getBien(): ?Bien
    {
        return $this->bien;
    }

    public function setBien(?Bien $bien): self
    {
        $this->bien = $bien;

        return $this;
    }

    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    public function setOperation(?Operation $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getQte(): ?float
    {
        return $this->qte;
    }

    public function setQte(float $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getMagasinSource(): ?string
    {
        return $this->magasin_source;
    }

    public function setMagasinSource(string $magasin_source): self
    {
        $this->magasin_source = $magasin_source;

        return $this;
    }

    public function getMagasinDistination(): ?string
    {
        return $this->magasin_distination;
    }

    public function setMagasinDistination(string $magasin_distination): self
    {
        $this->magasin_distination = $magasin_distination;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(float $prix_unitaire): self
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }

    public function getPrixTotale(): ?float
    {
        return $this->prix_totale;
    }

    public function setPrixTotale(float $prix_totale): self
    {
        $this->prix_totale = $prix_totale;

        return $this;
    }
    public function calcul(): ?float
    {
        $pt=$this->getPrixUnitaire()*$this->getQte();
        return $pt;
        
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

  

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

}
