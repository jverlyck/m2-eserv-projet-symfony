<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Episode
 *
 * @ORM\Table(name="episode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EpisodeRepository")
 */
class Episode
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Assert\Length(min=2)
     * @Assert\Regex("/^[A-Za-z0-9 ()]+/")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="episodeNumber", type="integer")
     * @Assert\Range(min=1, max=999)
     */
    private $episodeNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePublished", type="datetime", nullable=true)
     * @Assert\DateTime()
     */
    private $datePublished;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=16777215, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var UploadedFile
     * @Assert\File(maxSize = "3072k", mimeTypes = {"image/jpeg", "image/png"})
     */
    private $file;

    /**
     * @var TVSeries
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TVSeries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tvseries;


    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Episode
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
     * Set episodeNumber
     *
     * @param integer $episodeNumber
     * @return Episode
     */
    public function setEpisodeNumber($episodeNumber)
    {
        $this->episodeNumber = $episodeNumber;

        return $this;
    }

    /**
     * Get episodeNumber
     *
     * @return integer 
     */
    public function getEpisodeNumber()
    {
        return $this->episodeNumber;
    }

    /**
     * Set datePublished
     *
     * @param \DateTime $datePublished
     * @return Episode
     */
    public function setDatePublished($datePublished)
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    /**
     * Get datePublished
     *
     * @return \DateTime 
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Episode
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

    /**
     * Set image
     *
     * @param string $image
     * @return Episode
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set tvseries
     *
     * @param TVSeries $tvseries
     * @return Episode
     */
    public function setTVSeries(TVSeries $tvseries)
    {
        $this->tvseries = $tvseries;

        return $this;
    }

    /**
     * Get tvseries
     *
     * @return string
     */
    public function getTVSeries()
    {
        return $this->tvseries;
    }

    /**
     * Set file
     *
     * @param UploadedFile|null $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function upload()
    {
        if (null === $this->file)
            return;

        $name = md5(uniqid()).'.'.$this->file->guessExtension();

        var_dump($this->getUploadRootDir());

        $this->file->move($this->getUploadRootDir(), $name);

        $this->image = $name;
    }

    public function removeUpload()
    {
        unlink($this->getUploadRootDir().'/'.$this->image);
    }

    public function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
}
