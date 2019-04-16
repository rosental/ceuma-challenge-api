<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo; // Doctrine Extension
use Symfony\Component\Validator\Constraints as Assert; // Adicionando classes para validacao;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CursoRepository")
 * @ORM\Table(name="cursos")
 */
class Curso
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $workload;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create") // adiciono a hora automaticamente ao realizar a insercao
     * @Assert\NotBlank()
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable() // adiciono a hora automaticamente ao realizar a insercao
     * @Assert\NotBlank()
     */
    private $updated_at;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Aluno", mappedBy="courseCollection")
     */
    private $studentCollection;

    public function __construct()
    {
        $this->studentCollection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWorkload(): ?int
    {
        return $this->workload;
    }

    public function setWorkload(int $workload): self
    {
        $this->workload = $workload;

        return $this;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Curso
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Curso
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getStudentCollection()
    {
        return $this->studentCollection;
    }

    /**
     * @param mixed $studentCollection
     */
    public function setStudentCollection($studentCollection): void
    {
        $this->studentCollection = $studentCollection;
    }
}
