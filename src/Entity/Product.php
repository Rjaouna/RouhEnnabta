<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\Column(nullable: true)]
    private ?int $stock = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isActive = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $margin = null;

    #[ORM\Column(nullable: true)]
    private ?float $salePrice = null;

    #[ORM\Column(nullable: true)]
    private ?float $purchasePrice = null;

    /**
     * @var Collection<int, ProductImage>
     */
    #[ORM\OneToMany(targetEntity: ProductImage::class, mappedBy: 'product')]
    private Collection $productImages;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Gammes $gamme = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $contenance = null;

    /**
     * @var Collection<int, Bienfaits>
     */
    #[ORM\ManyToMany(targetEntity: Bienfaits::class, mappedBy: 'product')]
    private Collection $bienfaits;

    /**
     * @var Collection<int, Recettes>
     */
    #[ORM\ManyToMany(targetEntity: Recettes::class, mappedBy: 'product')]
    private Collection $recettes;

    /**
     * @var Collection<int, Precaution>
     */
    #[ORM\ManyToMany(targetEntity: Precaution::class, mappedBy: 'product')]
    private Collection $precautions;

    public function __construct()
    {
        $this->productImages = new ArrayCollection();
        $this->bienfaits = new ArrayCollection();
        $this->recettes = new ArrayCollection();
        $this->precautions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getMargin(): ?string
    {
        return $this->margin;
    }

    public function setMargin(?string $margin): static
    {
        $this->margin = $margin;

        return $this;
    }

    public function getSalePrice(): ?float
    {
        return $this->salePrice;
    }

    public function setSalePrice(?float $salePrice): static
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    public function getPurchasePrice(): ?float
    {
        return $this->purchasePrice;
    }

    public function setPurchasePrice(?float $purchasePrice): static
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    /**
     * @return Collection<int, ProductImage>
     */
    public function getProductImages(): Collection
    {
        return $this->productImages;
    }

    public function addProductImage(ProductImage $productImage): static
    {
        if (!$this->productImages->contains($productImage)) {
            $this->productImages->add($productImage);
            $productImage->setProduct($this);
        }

        return $this;
    }

    public function removeProductImage(ProductImage $productImage): static
    {
        if ($this->productImages->removeElement($productImage)) {
            // set the owning side to null (unless already changed)
            if ($productImage->getProduct() === $this) {
                $productImage->setProduct(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getGamme(): ?Gammes
    {
        return $this->gamme;
    }

    public function setGamme(?Gammes $gamme): static
    {
        $this->gamme = $gamme;

        return $this;
    }

    public function getContenance(): ?string
    {
        return $this->contenance;
    }

    public function setContenance(?string $contenance): static
    {
        $this->contenance = $contenance;

        return $this;
    }

    public function getMainImage(): ?ProductImage
    {
        foreach ($this->productImages as $image) {
            if ($image->isMain()) {
                return $image;
            }
        }

        // si aucune image principale, on prend la première
        return $this->productImages->first() ?: null;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function generateSlug(): void
    {
        if (empty($this->name)) {
            return;
        }

        $slugger = new AsciiSlugger();
        $this->slug = strtolower($slugger->slug($this->name)->toString());
    }

    /**
     * @return Collection<int, Bienfaits>
     */
    public function getBienfaits(): Collection
    {
        return $this->bienfaits;
    }

    public function addBienfait(Bienfaits $bienfait): static
    {
        if (!$this->bienfaits->contains($bienfait)) {
            $this->bienfaits->add($bienfait);
            $bienfait->addProduct($this);
        }

        return $this;
    }

    public function removeBienfait(Bienfaits $bienfait): static
    {
        if ($this->bienfaits->removeElement($bienfait)) {
            $bienfait->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Recettes>
     */
    public function getRecettes(): Collection
    {
        return $this->recettes;
    }

    public function addRecette(Recettes $recette): static
    {
        if (!$this->recettes->contains($recette)) {
            $this->recettes->add($recette);
            $recette->addProduct($this);
        }

        return $this;
    }

    public function removeRecette(Recettes $recette): static
    {
        if ($this->recettes->removeElement($recette)) {
            $recette->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Precaution>
     */
    public function getPrecautions(): Collection
    {
        return $this->precautions;
    }

    public function addPrecaution(Precaution $precaution): static
    {
        if (!$this->precautions->contains($precaution)) {
            $this->precautions->add($precaution);
            $precaution->addProduct($this);
        }

        return $this;
    }

    public function removePrecaution(Precaution $precaution): static
    {
        if ($this->precautions->removeElement($precaution)) {
            $precaution->removeProduct($this);
        }

        return $this;
    }
}
