<?php
namespace GdproTool\Hasher;

class PasswordHasher
{
    protected $cost = 10;

    protected $salt = 'This is my Long Default Salt Key';

    public function hash($password)
    {
        $passwordOptions = [
            'salt' => $this->salt,
            'cost' => $this->cost
        ];

        $hash = password_hash($password, PASSWORD_BCRYPT, $passwordOptions);

        return $hash;
    }

    /**
     * @param int $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }
}