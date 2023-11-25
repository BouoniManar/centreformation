<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin extends Utilisateur
{
    #[ORM\OneToMany(mappedBy: 'admin', targetEntity: Formation::class)]
    private Collection $formations;

    #[ORM\OneToMany(mappedBy: 'admin', targetEntity: Formateur::class)]
    private Collection $affecter;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->affecter = new ArrayCollection();
    }

    /**
     * @return Collection<int, Formation>
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): static
    {
        if (!$this->formations->contains($formation)) {
            $this->formations->add($formation);
            $formation->setAdmin($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): static
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getAdmin() === $this) {
                $formation->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Formateur>
     */
    public function getAffecter(): Collection
    {
        return $this->affecter;
    }

    public function addAffecter(Formateur $affecter): static
    {
        if (!$this->affecter->contains($affecter)) {
            $this->affecter->add($affecter);
            $affecter->setAdmin($this);
        }

        return $this;
    }

    public function removeAffecter(Formateur $affecter): static
    {
        if ($this->affecter->removeElement($affecter)) {
            // set the owning side to null (unless already changed)
            if ($affecter->getAdmin() === $this) {
                $affecter->setAdmin(null);
            }
        }

        return $this;
    }
}
