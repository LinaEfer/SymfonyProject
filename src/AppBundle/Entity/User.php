<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraint as Assert;

    /**
    * @ORM\Entity
    * @ORM\Table(name="user")
    */
    class User implements UserInterface
    {
        /**
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @ORM\Column(type="string", unique=true)
         */
        private $email;

        /**
         * The encoded password
         * @ORM\Column(type="string")
         */
        private $password;

        /**
         * @var string
         */
        private $plainPassword;

        /**
         * @ORM\Column(type="json_array")
         */
        private $roles = [];

        public function getUsername()
        {
            return $this->email;
        }

        public function getRoles()
        {
            $roles = $this->roles;

            if (!in_array('ROLE_USER', $roles)) {
                $roles[] = 'ROLE_USER';
            }
            return $roles;
        }

        public function setRoles(array $roles)
        {
            $this->roles = $roles;
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


    }
