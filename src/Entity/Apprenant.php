<?php

namespace App\Entity;

use App\Repository\ApprenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApprenantRepository::class)]
class Apprenant extends Utilisateur
{


    #[ORM\ManyToMany(targetEntity: Formation::class, mappedBy: 'apprenants')]
    private Collection $formations;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }

    public function getApprenant(): ?self
    {
        return $this->apprenant;
    }

    public function setApprenant(?self $apprenant): static
    {
        $this->apprenant = $apprenant;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(self $formation): static
    {
        if (!$this->formations->contains($formation)) {
            $this->formations->add($formation);
            $formation->setApprenant($this);
        }

        return $this;
    }

    public function removeFormation(self $formation): static
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getApprenant() === $this) {
                $formation->setApprenant(null);
            }
        }

        return $this;
    }
}
