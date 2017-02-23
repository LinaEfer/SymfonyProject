<?php

namespace AppBundle\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

    /**
    * @ORM\Entity
    * @ORM\Table(name="user")
    * @UniqueEntity(fields={"email"}, message="It looks like your already have an account!")
    */
    class User implements UserInterface
    {
        /**
         * @var string
         * 
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="UUID")
         * @ORM\Column(type="guid")
         */
        private $id;

        /**
         * @Assert\NotBlank()
         * @Assert\Email()
         * @ORM\Column(type="string", unique=true)
         */
        private $email;

        /**
         * The encoded password
         * @ORM\Column(type="string")
         */
        private $password;

        /**
         * @Assert\NotBlank(groups={"Registration"})
         * @var string
         */
        private $plainPassword;

        /**
         * @ORM\OneToMany(targetEntity="UserEpisode", mappedBy="user_id")
         */
        private $userEpisode;

        public function __construct()
        {
            $this->userEpisode = new ArrayCollection();
        }

        /**
         * @return mixed
         */
        public function getUserEpisode()
        {
            return $this->userEpisode;
        }

        /**
         * @param mixed $userEpisode
         */
        public function setUserEpisode($userEpisode)
        {
            $this->userEpisode = $userEpisode;
        }
        
        public function getUsername()
        {
            return $this->email;
        }

        public function getRoles()
        {
            return ['ROLE_USER'];
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getSalt()
        {
        }

        public function eraseCredentials()
        {
            $this->plainPassword = null;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }


        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return string
         */
        public function getPlainPassword()
        {
            return $this->plainPassword;
        }

        /**
         * @param string $plainPassword
         */
        public function setPlainPassword($plainPassword)
        {
            $this->plainPassword = $plainPassword;
            $this->password = null;
        }

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
        
    }
