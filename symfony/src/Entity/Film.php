<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer", name="episode_id")
     */
    private $episodeId;

    /**
     * @ORM\Column(type="text", name="opening_crawl")
     */
    private $openingCrawl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $director;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $producer;

    /**
     * @ORM\Column(type="string", length=255, name="release_date")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="json")
     */
    private $characters = [];

    /**
     * @ORM\Column(type="json")
     */
    private $planets = [];

    /**
     * @ORM\Column(type="json")
     */
    private $starships = [];

    /**
     * @ORM\Column(type="json")
     */
    private $vehicles = [];

    /**
     * @ORM\Column(type="json")
     */
    private $species = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $createdAt = [];

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    private $updatedAt = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getEpisodeId(): ?int
    {
        return $this->episodeId;
    }

    public function setEpisodeId(int $episodeId): self
    {
        $this->episodeId = $episodeId;

        return $this;
    }

    public function getOpeningCrawl(): ?string
    {
        return $this->openingCrawl;
    }

    public function setOpeningCrawl(string $openingCrawl): self
    {
        $this->openingCrawl = $openingCrawl;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(string $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getCharacters(): ?array
    {
        return $this->characters;
    }

    public function setCharacters(array $characters): self
    {
        $this->characters = $characters;

        return $this;
    }

    public function getPlanets(): ?array
    {
        return $this->planets;
    }

    public function setPlanets(array $planets): self
    {
        $this->planets = $planets;

        return $this;
    }

    public function getStarships(): ?array
    {
        return $this->starships;
    }

    public function setStarships(array $starships): self
    {
        $this->starships = $starships;

        return $this;
    }

    public function getVehicles(): ?array
    {
        return $this->vehicles;
    }

    public function setVehicles(array $vehicles): self
    {
        $this->vehicles = $vehicles;

        return $this;
    }

    public function getSpecies(): ?array
    {
        return $this->species;
    }

    public function setSpecies(array $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
