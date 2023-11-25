<?php

namespace App\Entity;

use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormateurRepository::class)]
class Formateur extends Utilisateur
{
    #[ORM\ManyToOne(inversedBy: 'affecter')]
    private ?Admin $admin = null;

    #[ORM\OneToMany(mappedBy: 'formateur', targetEntity: Cours::class)]
    private Collection $Affecter;

    public function __construct()
    {
        $this->Affecter = new ArrayCollection();
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(?Admin $admin): static
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getAffecter(): Collection
    {
        return $this->Affecter;
    }

    public function addAffecter(Cours $affecter): static
    {
        if (!$this->Affecter->contains($affecter)) {
            $this->Affecter->add($affecter);
            $affecter->setFormateur($this);
        }

        return $this;
    }

    public function removeAffecter(Cours $affecter): static
    {
        if ($this->Affecter->removeElement($affecter)) {
            // set the owning side to null (unless already changed)
            if ($affecter->getFormateur() === $this) {
                $affecter->setFormateur(null);
            }
        }

        return $this;
    }
}
